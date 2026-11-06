<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->ProductName,
                'price' => $p->Price,
                'category' => $p->category->CategoryName ?? 'N/A',
                'image' => $p->ProductImage 
                    ? asset('img/product/' . $p->ProductImage)
                    : null,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }

    public function show(Product $product)
    {
        $product->load('category');

        return response()->json(['status' => true, 'data' => $this->formatProduct($product)]);
    }

    public function byCategory(int $category)
    {
        $products = Product::with('category')->where('CategoryID', $category)->get();

        return response()->json([
            'status' => true,
            'data' => $products->map(fn (Product $product) => $this->formatProduct($product)),
        ]);
    }

    private function formatProduct(Product $product): array
    {
        return [
            'id' => $product->id,
            'name' => $product->ProductName,
            'price' => (float) $product->Price,
            'category' => $product->category?->CategoryName,
            'image' => $product->ProductImage ? asset('img/product/' . $product->ProductImage) : null,
        ];
    }
}
