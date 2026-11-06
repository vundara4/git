<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class CheckoutController extends Controller
{
        public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (count($cart) === 0) {
            return redirect()->route('cart.index')->with('cart_toast', 'Cart is empty!');
        }

        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:50',
            'address_line'   => 'required|string|max:255',
            'city'           => 'nullable|string|max:255',
            'note'           => 'nullable|string|max:255',

            'payment_method' => 'required|in:cod,qr',
            'payment_ref'    => 'nullable|string|max:255',
            'receipt_image'  => 'nullable|image|max:4096', // 4MB
        ]);

        // calculate subtotal from session cart
        $subtotal = 0;
        foreach ($cart as $it) {
            $subtotal += ((float)$it['price']) * ((int)$it['qty']);
        }
        $shipping = 0;
        $total = $subtotal + $shipping;

        // store with transaction
        $order = DB::transaction(function () use ($request, $cart, $subtotal, $shipping, $total) {

            // upload receipt if provided
            $receiptPath = null;
            if ($request->hasFile('receipt_image')) {
                $receiptPath = $request->file('receipt_image')->store('receipts', 'public');
            }

            $paymentStatus = $request->payment_method === 'qr'
                ? 'pending'   // wait admin confirm
                : 'unpaid';   // COD unpaid until delivered

            // create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'address_line' => $request->address_line,
                'city' => $request->city,
                'note' => $request->note,
                'payment_method' => $request->payment_method,
                'payment_ref' => $request->payment_ref,
                'receipt_image' => $receiptPath,
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'total' => $total,
                'status' => $paymentStatus,
            ]);

            // create items
            foreach ($cart as $pid => $it) {
                $qty = (int)$it['qty'];

                // optional: verify product still exists
                $p = Product::whereKey($pid)->lockForUpdate()->first();
                if (!$p || $p->stock < $qty) {
                    $available = $p?->stock ?? 0;
                    throw ValidationException::withMessages([
                        'cart' => "{$it['name']} has only {$available} unit(s) available. Please update your cart.",
                    ]);
                }
                $name = $it['name'] ?? ($p?->ProductName ?? 'Unknown');
                $price = (float)$it['price'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $pid,
                    'qty' => $qty,
                    'price' => $price,
                ]);

                $p->decrement('stock', $qty);
            }

            return $order;
        });

        // clear cart after create order
        session()->forget('cart');

        return redirect()->route('checkout.receipt', $order)
            ->with('success', 'Order placed successfully. Your receipt is ready.');
    }


public function placeOrder()
{
    $cart = session()->get('cart', []);

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    $order = Order::create([
        'user_id' => Auth::id(),
        'total' => $total,
        'status' => 'pending',
    ]);

    foreach ($cart as $id => $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'qty' => $item['qty'],
            'price' => $item['price'],
        ]);
    }

    session()->forget('cart');

    return redirect()->route('orders.history')->with('success','Order placed!');
}

    public function success(Order $order)
    {
        return redirect()->route('checkout.receipt', $order);
    }

    public function receipt(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        $order->load('items.product');

        return view('front.checkout.receipt', compact('order'));
    }

}
