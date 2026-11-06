<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function index(Request $request)
    {
        return response()->json($this->cartPayload($this->cartFor($request)));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'qty' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $cart = $this->cartFor($request);
        $product = Product::findOrFail($data['product_id']);
        $item = $cart->items()->firstOrNew(['product_id' => $product->id]);
        $item->qty = ($item->exists ? $item->qty : 0) + ($data['qty'] ?? 1);
        $item->save();

        return response()->json($this->cartPayload($cart->fresh(['items.product'])), 201);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate(['qty' => ['required', 'integer', 'min:1', 'max:100']]);
        $cart = $this->cartFor($request);
        $cart->items()->where('product_id', $product->id)->update(['qty' => $data['qty']]);

        return response()->json($this->cartPayload($cart->fresh(['items.product'])));
    }

    public function destroy(Request $request, Product $product)
    {
        $cart = $this->cartFor($request);
        $cart->items()->where('product_id', $product->id)->delete();

        return response()->json($this->cartPayload($cart->fresh(['items.product'])));
    }

    private function cartFor(Request $request): Cart
    {
        return Cart::firstOrCreate(['user_id' => $request->user()->id]);
    }

    private function cartPayload(Cart $cart): array
    {
        $cart->loadMissing('items.product');
        $items = $cart->items->map(fn ($item) => [
            'product_id' => $item->product_id,
            'name' => $item->product?->ProductName,
            'price' => (float) $item->product?->Price,
            'qty' => $item->qty,
            'line_total' => round((float) $item->product?->Price * $item->qty, 2),
        ]);

        return ['data' => ['items' => $items, 'subtotal' => $items->sum('line_total')]];
    }
}
