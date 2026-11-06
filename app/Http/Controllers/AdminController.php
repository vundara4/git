<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        // ==========================================
        // SALES - LAST 7 DAYS
        // ==========================================

        $startDate = now()->subDays(6)->startOfDay();

        $dailySales = Order::query()
            ->whereBetween('created_at', [
                $startDate,
                now()->endOfDay()
            ])
            ->selectRaw(
                'DATE(created_at) as order_date,
                 COALESCE(SUM(total), 0) as sales_total'
            )
            ->groupBy('order_date')
            ->pluck('sales_total', 'order_date');

        // ==========================================
        // SALES LABELS
        // ==========================================

        $salesLabels = collect(range(0, 6))
            ->map(function (int $daysAgo) {
                return now()
                    ->subDays(6 - $daysAgo)
                    ->format('M j');
            });

        // ==========================================
        // SALES DATA
        // ==========================================

        $salesData = collect(range(0, 6))
            ->map(function (int $daysAgo) use ($dailySales) {

                $date = now()
                    ->subDays(6 - $daysAgo)
                    ->toDateString();

                return (float) ($dailySales[$date] ?? 0);
            });

        // ==========================================
        // DASHBOARD DATA
        // ==========================================

        return view('admin.dashboard', [

            // Products
            'productCount' => Product::count(),

            // Categories
            'categoryCount' => Category::count(),

            // Total stock
            'totalStock' => Product::sum('stock'),

            // Low stock: 1 - 5
            'lowStockCount' => Product::whereBetween(
                'stock',
                [1, 5]
            )->count(),

            // Out of stock
            'outOfStockCount' => Product::where(
                'stock',
                0
            )->count(),

            // Inventory value
            'inventoryValue' => Product::selectRaw(
                'COALESCE(SUM(stock * price), 0) as total'
            )->value('total'),

            // Recent products
            'recentProducts' => Product::with('category')
                ->latest()
                ->take(5)
                ->get(),

            // Chart
            'salesLabels' => $salesLabels,
            'salesData' => $salesData,
        ]);
    }

    public function categories()
    {
        return response(
            'Admin categories controller is set up.'
        );
    }

    public function products()
    {
        return response(
            'Admin products controller is set up.'
        );
    }
}