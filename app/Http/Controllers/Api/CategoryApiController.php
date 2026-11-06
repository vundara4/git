<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function index()
{
    $categories = Category::all()->map(function ($c) {
        return [
            'id' => $c->id,
            'name' => $c->CategoryName,
            'image' => $c->CategoryImage 
                ? asset('img/product/' . $c->CategoryImage)
                : null,
        ];
    });

    return response()->json([
        'status' => true,
        'data' => $categories
    ]);
}
    
}
