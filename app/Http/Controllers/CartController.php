<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $qty = max(1, (int) $request->input('qty', 1));

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->ProductName,
                'price' => $product->Price,
                'quantity' => $qty,
            ];
        }

        $request->session()->put('cart', $cart);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Added to cart']);
        }

        return redirect()->back()->with('cart_toast', 'Added to cart!');
    }
}
