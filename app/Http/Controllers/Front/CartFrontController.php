<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartFrontController extends Controller
{
     public function index()
    {
        $cart = $this->normalizeCart(session()->get('cart', []));
        session()->put('cart', $cart);

        return view('front.cart.index', compact('cart'));
    }

    public function add(Request $request, $product)
    {
        $qty = max(1, (int) $request->input('qty', 1));
        $p = Product::findOrFail($product);

        $cart = $this->normalizeCart(session()->get('cart', []));
        $requestedQty = ($cart[$p->id]['qty'] ?? 0) + $qty;

        if ($p->stock < $requestedQty) {
            return $this->stockResponse($request, $p, $p->stock);
        }

        if (isset($cart[$p->id])) {
            $cart[$p->id]['qty'] += $qty;
        } else {
            $cart[$p->id] = [
                'id'    => $p->id,
                'name'  => $p->ProductName,
                'price' => (float) $p->Price,
                'image' => $p->ProductImage,
                'qty'   => $qty,
            ];
        }

        session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'ok' => true,
                'message' => "+ {$p->ProductName} (x{$qty}) added to cart!",
                'cart_count' => array_sum(array_column($cart, 'qty')),
                'subtotal' => number_format($this->subtotal($cart), 2),
            ]);
        }

        return back()->with('cart_toast', "+ {$p->ProductName} (x{$qty}) added to cart!");
    }

    public function update(Request $request, $product)
    {
        $qty = max(1, (int) $request->input('qty', 1));
        $cart = $this->normalizeCart(session()->get('cart', []));

        if (!isset($cart[$product])) {
            return response()->json(['ok'=>false,'message'=>'Item not found in cart'], 404);
        }

        $p = Product::findOrFail($product);
        if ($p->stock < $qty) {
            return $this->stockResponse($request, $p, $p->stock);
        }

        $cart[$product]['qty'] = $qty;
        session()->put('cart', $cart);

        return response()->json([
            'ok' => true,
            'message' => "+ Quantity updated!",
            'cart_count' => array_sum(array_column($cart, 'qty')),
            'line_total' => number_format($cart[$product]['price'] * $cart[$product]['qty'], 2),
            'subtotal' => number_format($this->subtotal($cart), 2),
        ]);
    }

    public function remove(Request $request, $product)
    {
        $cart = $this->normalizeCart(session()->get('cart', []));
        if (isset($cart[$product])) unset($cart[$product]);
        session()->put('cart', $cart);

        return response()->json([
            'ok' => true,
            'message' => "x Item removed!",
            'cart_count' => array_sum(array_column($cart, 'qty')),
            'subtotal' => number_format($this->subtotal($cart), 2),
        ]);
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('cart_toast', 'Cart cleared!');
    }

    private function subtotal(array $cart): float
    {
        $sum = 0;
        foreach ($cart as $item) {
            $sum += ((float)($item['price'] ?? 0)) * ((int)($item['qty'] ?? 0));
        }
        return $sum;
    }

    private function normalizeCart(mixed $cart): array
    {
        if (!is_array($cart)) {
            return [];
        }

        $normalized = [];
        foreach ($cart as $id => $item) {
            if (!is_array($item)) {
                continue;
            }

            $productId = (int)($item['id'] ?? $id);
            if ($productId < 1) {
                continue;
            }

            $product = Product::find($productId);
            if (!$product) {
                continue;
            }

            $normalized[$productId] = [
                'id' => $productId,
                'name' => $item['name'] ?? $product->ProductName,
                'price' => (float)($item['price'] ?? $product->Price),
                'image' => $item['image'] ?? $product->ProductImage,
                'qty' => max(1, (int)($item['qty'] ?? 1)),
            ];
        }

        return $normalized;
    }

    private function stockResponse(Request $request, Product $product, int $available)
    {
        $message = $available === 0
            ? "{$product->ProductName} is out of stock."
            : "Only {$available} unit(s) of {$product->ProductName} are available.";

        if ($request->expectsJson()) {
            return response()->json(['ok' => false, 'message' => $message, 'available_stock' => $available], 422);
        }

        return back()->with('cart_toast', $message);
    }

}
