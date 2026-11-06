<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $Categories = Category::all();
        return view('product', compact('Categories'));
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'CategoryID'    => 'required|integer',
            'productName'   => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'productImage'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $newImageName = null;

        if ($request->hasFile('productImage')) {
            $newImageName = time() . '-' . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->move(public_path('img/product'), $newImageName);
        }

        Product::create([
            'CategoryID'   => $request->CategoryID,
            'ProductName'  => $request->productName,
            'Price'        => $request->price,
            'stock'        => $request->stock,
            'ProductImage' => $newImageName,
        ]);

        return redirect('productList');
    }
  public function productList(Request $request)
{
    $query = Product::with('category');

    // Filter products if a search parameter is provided
    if ($request->filled('search')) {
        $searchTerm = trim($request->input('search'));
        
        $query->where(function ($q) use ($searchTerm) {
            $q->where('ProductName', 'LIKE', "%{$searchTerm}%")
              ->orWhereHas('category', function ($catQuery) use ($searchTerm) {
                  $catQuery->where('CategoryName', "%{$searchTerm}%"); // Adjust column name if different
              });
        });
    }

    $Products = $query->orderBy('id', 'desc')->get();

    return view('productList', compact('Products'));
}

    public function productShowData($id)
    {
        $Product = Product::findOrFail($id);
        $Categories = Category::all(); 
        return view('productEdit', compact('Product','Categories'));
    }

    public function productUpdate(Request $request, $id)
{
    $request->validate([
        'CategoryID'   => 'required|integer',
        'productName'  => 'required|string|max:255',
        'price'        => 'required|numeric|min:0',
        'stock'        => 'required|integer|min:0',
        'productImage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $Product = Product::findOrFail($id);

    // update basic fields
    $Product->CategoryID  = $request->CategoryID;
    $Product->ProductName = $request->productName;
    $Product->Price       = $request->price;
    $Product->stock       = $request->stock;

    // update image if uploaded
    if ($request->hasFile('productImage')) {
        $newImageName = time() . '-' . $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->move(public_path('img/product'), $newImageName);

        // (optional) delete old file
        if (!empty($Product->ProductImage) && file_exists(public_path('img/product/'.$Product->ProductImage))) {
            unlink(public_path('img/product/'.$Product->ProductImage));
        }

        $Product->ProductImage = $newImageName;
    }

    $Product->save();
    return redirect()->route('product.list')->with('success', 'Product updated successfully.');
}

    public function newArrivals()
    {
        $products = Product::with('category')
            ->orderByDesc('id')
            ->paginate(12);

        return view('front.new-arrivals', compact('products'));
    }

    public function about()
    {
        return view('front.about');
    }

}
