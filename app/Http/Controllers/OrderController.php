<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Order List
    public function history()
{
    $orders = Order::with('items.product')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('orders.history', compact('orders'));
    
}
}