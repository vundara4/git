<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REPORT DATA
    |--------------------------------------------------------------------------
    */

    private function reportData(string $report)
    {
        switch ($report) {

            /*
            |--------------------------------------------------------------------------
            | 1. SALES
            |--------------------------------------------------------------------------
            */

            // C:\xampp\htdocs\project\Assignmentt\app\Http\Controllers\ReportController.php

case 'sales':

    $rows = Order::query()
        ->with(['user']) // <-- Removed 'customer'
        ->latest()
        ->get();

                $total = $rows->sum(function ($row) {
                    return (float) (
                        $row->total
                        ?? $row->total_amount
                        ?? 0
                    );
                });

                $monthlySales = $rows
                    ->groupBy(function ($row) {
                        return optional($row->created_at)
                            ->format('M Y');
                    });

                return [
                    'title' => 'Sales Report',

                    'subtitle' =>
                        'Complete sales performance overview',

                    'columns' => [
                        'ID',
                        'Customer',
                        'Date',
                        'Status',
                        'Amount'
                    ],

                    'rows' => $rows->map(function ($row) {

                        return [
                            $row->id,

                            optional($row->user)->name
                                ?? 'Walk-in Customer',

                            optional($row->created_at)
                                ->format('d M Y'),

                            ucfirst($row->status ?? 'Pending'),

                            (float) (
                                $row->total
                                ?? $row->total_amount
                                ?? 0
                            ),
                        ];

                    })->values(),

                    'stats' => [
                        'Total Sales' => $total,

                        'Transactions' => $rows->count(),

                        'Average Sale' =>
                            $rows->count()
                                ? $total / $rows->count()
                                : 0,

                        'Completed' =>
                            $rows->where('status', 'completed')
                                ->count(),
                    ],

                    'chart' => [
                        'type' => 'line',

                        'label' => 'Sales',

                        'labels' => $monthlySales
                            ->keys()
                            ->values(),

                        'data' => $monthlySales
                            ->map(function ($group) {

                                return $group->sum(function ($row) {

                                    return (float) (
                                        $row->total
                                        ?? $row->total_amount
                                        ?? 0
                                    );

                                });

                            })
                            ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 2. PURCHASE
            |--------------------------------------------------------------------------
            */

            case 'purchase':

                $products = Product::with('category')->get();

                $totalStock = $products->sum(
                    fn($p) => (int) ($p->stock ?? 0)
                );

                return [

                    'title' => 'Purchase Report',

                    'subtitle' =>
                        'Inventory purchasing overview',

                    'columns' => [
                        'ID',
                        'Product',
                        'Category',
                        'Stock',
                        'Cost'
                    ],

                    'rows' => $products->map(function ($p) {

                        return [
                            $p->id,
                            $p->name,

                            optional($p->category)->name
                                ?? 'N/A',

                            (int) ($p->stock ?? 0),

                            (float) (
                                $p->cost
                                ?? $p->purchase_price
                                ?? 0
                            ),
                        ];

                    })->values(),

                    'stats' => [

                        'Products' =>
                            $products->count(),

                        'Total Units' =>
                            $totalStock,

                        'Average Cost' =>
                            $products->count()
                                ? $products->avg(
                                    fn($p) =>
                                    (float) (
                                        $p->cost
                                        ?? $p->purchase_price
                                        ?? 0
                                    )
                                )
                                : 0,

                        'Stock Value' =>
                            $products->sum(
                                fn($p) =>
                                (float) ($p->stock ?? 0)
                                *
                                (float) (
                                    $p->cost
                                    ?? $p->purchase_price
                                    ?? 0
                                )
                            ),
                    ],

                    'chart' => [

                        'type' => 'bar',

                        'label' => 'Stock',

                        'labels' =>
                            $products
                                ->take(10)
                                ->pluck('name')
                                ->values(),

                        'data' =>
                            $products
                                ->take(10)
                                ->pluck('stock')
                                ->map(
                                    fn($v) => (int) $v
                                )
                                ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 3. PRODUCTS
            |--------------------------------------------------------------------------
            */

            case 'products':

                $products = Product::with('category')
                    ->latest()
                    ->get();

                return [

                    'title' => 'Product Report',

                    'subtitle' =>
                        'Complete product catalog report',

                    'columns' => [
                        'ID',
                        'Product',
                        'Category',
                        'Price',
                        'Stock'
                    ],

                    'rows' => $products->map(function ($p) {

                        return [
                            $p->id,
                            $p->name,

                            optional($p->category)->name
                                ?? 'N/A',

                            (float) ($p->price ?? 0),

                            (int) ($p->stock ?? 0),
                        ];

                    })->values(),

                    'stats' => [

                        'Total Products' =>
                            $products->count(),

                        'In Stock' =>
                            $products
                                ->where('stock', '>', 0)
                                ->count(),

                        'Out of Stock' =>
                            $products
                                ->where('stock', '<=', 0)
                                ->count(),

                        'Inventory Value' =>
                            $products->sum(
                                fn($p) =>
                                (float) ($p->price ?? 0)
                                *
                                (int) ($p->stock ?? 0)
                            ),
                    ],

                    'chart' => [

                        'type' => 'bar',

                        'label' => 'Stock by Product',

                        'labels' =>
                            $products
                                ->take(10)
                                ->pluck('name')
                                ->values(),

                        'data' =>
                            $products
                                ->take(10)
                                ->pluck('stock')
                                ->map(
                                    fn($v) => (int) $v
                                )
                                ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 4. CATEGORIES
            |--------------------------------------------------------------------------
            */

            case 'categories':

                $categories = Category::withCount('products')
                    ->latest()
                    ->get();

                return [

                    'title' => 'Category Report',

                    'subtitle' =>
                        'Product distribution by category',

                    'columns' => [
                        'ID',
                        'Category',
                        'Products'
                    ],

                    'rows' => $categories->map(function ($c) {

                        return [
                            $c->id,
                            $c->name,
                            $c->products_count,
                        ];

                    })->values(),

                    'stats' => [

                        'Categories' =>
                            $categories->count(),

                        'Products' =>
                            $categories->sum(
                                'products_count'
                            ),

                        'Largest Category' =>
                            $categories->max(
                                'products_count'
                            ) ?? 0,

                        'Average Products' =>
                            $categories->count()
                                ? $categories->avg(
                                    'products_count'
                                )
                                : 0,
                    ],

                    'chart' => [

                        'type' => 'pie',

                        'label' =>
                            'Products by Category',

                        'labels' =>
                            $categories
                                ->pluck('name')
                                ->values(),

                        'data' =>
                            $categories
                                ->pluck('products_count')
                                ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 5. CUSTOMERS
            |--------------------------------------------------------------------------
            */

            case 'customers':

                $customers = User::query()
                    ->latest()
                    ->get();

                $monthlyCustomers = $customers
                    ->groupBy(function ($user) {

                        return optional($user->created_at)
                            ->format('M Y');

                    });

                return [

                    'title' => 'Customer Report',

                    'subtitle' =>
                        'Registered customer overview',

                    'columns' => [
                        'ID',
                        'Name',
                        'Email',
                        'Registered'
                    ],

                    'rows' => $customers->map(function ($user) {

                        return [
                            $user->id,
                            $user->name,
                            $user->email,

                            optional($user->created_at)
                                ->format('d M Y'),
                        ];

                    })->values(),

                    'stats' => [

                        'Total Customers' =>
                            $customers->count(),

                        'This Month' =>
                            $customers
                                ->filter(
                                    fn($u) =>
                                    optional(
                                        $u->created_at
                                    )->isCurrentMonth()
                                )
                                ->count(),

                        'This Year' =>
                            $customers
                                ->filter(
                                    fn($u) =>
                                    optional(
                                        $u->created_at
                                    )->isCurrentYear()
                                )
                                ->count(),

                        'Latest Customer' =>
                            optional(
                                $customers->first()
                            )->name ?? 'N/A',
                    ],

                    'chart' => [

                        'type' => 'line',

                        'label' =>
                            'New Customers',

                        'labels' =>
                            $monthlyCustomers
                                ->keys()
                                ->values(),

                        'data' =>
                            $monthlyCustomers
                                ->map(
                                    fn($group) =>
                                    $group->count()
                                )
                                ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 6. SUPPLIERS
            |--------------------------------------------------------------------------
            */

            case 'suppliers':

                /*
                 * Replace this with Supplier model
                 * when you create Supplier model.
                 */

                $suppliers = collect();

                return [

                    'title' => 'Supplier Report',

                    'subtitle' =>
                        'Supplier directory and overview',

                    'columns' => [
                        'ID',
                        'Supplier',
                        'Phone',
                        'Email'
                    ],

                    'rows' => $suppliers
                        ->map(function ($s) {

                            return [
                                $s->id,
                                $s->name,
                                $s->phone ?? 'N/A',
                                $s->email ?? 'N/A',
                            ];

                        })
                        ->values(),

                    'stats' => [

                        'Total Suppliers' =>
                            $suppliers->count(),

                        'With Email' =>
                            $suppliers
                                ->filter(
                                    fn($s) =>
                                    !empty($s->email)
                                )
                                ->count(),

                        'With Phone' =>
                            $suppliers
                                ->filter(
                                    fn($s) =>
                                    !empty($s->phone)
                                )
                                ->count(),

                        'Latest Supplier' =>
                            optional(
                                $suppliers->first()
                            )->name ?? 'N/A',
                    ],

                    'chart' => [

                        'type' => 'bar',

                        'label' =>
                            'Supplier Records',

                        'labels' =>
                            ['Suppliers'],

                        'data' =>
                            [$suppliers->count()],
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 7. STOCK
            |--------------------------------------------------------------------------
            */

            case 'stock':

                $products = Product::with('category')
                    ->orderByDesc('stock')
                    ->get();

                return [

                    'title' => 'Stock Report',

                    'subtitle' =>
                        'Current inventory position',

                    'columns' => [
                        'ID',
                        'Product',
                        'Category',
                        'Stock',
                        'Price',
                        'Stock Value'
                    ],

                    'rows' => $products->map(function ($p) {

                        $stock =
                            (int) ($p->stock ?? 0);

                        $price =
                            (float) ($p->price ?? 0);

                        return [
                            $p->id,
                            $p->name,

                            optional($p->category)->name
                                ?? 'N/A',

                            $stock,
                            $price,
                            $stock * $price,
                        ];

                    })->values(),

                    'stats' => [

                        'Total Units' =>
                            $products->sum(
                                fn($p) =>
                                (int) ($p->stock ?? 0)
                            ),

                        'Stock Value' =>
                            $products->sum(
                                fn($p) =>
                                (int) ($p->stock ?? 0)
                                *
                                (float) ($p->price ?? 0)
                            ),

                        'Out of Stock' =>
                            $products
                                ->where('stock', '<=', 0)
                                ->count(),

                        'Low Stock' =>
                            $products->filter(
                                fn($p) =>
                                (int) ($p->stock ?? 0) > 0
                                &&
                                (int) ($p->stock ?? 0) <= 10
                            )->count(),
                    ],

                    'chart' => [

                        'type' => 'bar',

                        'label' => 'Stock',

                        'labels' =>
                            $products
                                ->take(10)
                                ->pluck('name')
                                ->values(),

                        'data' =>
                            $products
                                ->take(10)
                                ->pluck('stock')
                                ->map(
                                    fn($v) => (int) $v
                                )
                                ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 8. ORDERS
            |--------------------------------------------------------------------------
            */

            case 'orders':

                $orders = Order::with('user')
                    ->latest()
                    ->get();

                $total = $orders->sum(
                    fn($o) =>
                    (float) (
                        $o->total
                        ?? $o->total_amount
                        ?? 0
                    )
                );

                return [

                    'title' => 'Order Report',

                    'subtitle' =>
                        'Complete customer order history',

                    'columns' => [
                        'Order ID',
                        'Customer',
                        'Status',
                        'Date',
                        'Total'
                    ],

                    'rows' => $orders->map(function ($o) {

                        return [
                            $o->id,

                            optional($o->user)->name
                                ?? $o->customer_name
                                ?? 'Guest',

                            ucfirst(
                                $o->status ?? 'Pending'
                            ),

                            optional($o->created_at)
                                ->format('d M Y'),

                            (float) (
                                $o->total
                                ?? $o->total_amount
                                ?? 0
                            ),
                        ];

                    })->values(),

                    'stats' => [

                        'Total Orders' =>
                            $orders->count(),

                        'Completed' =>
                            $orders
                                ->where(
                                    'status',
                                    'completed'
                                )
                                ->count(),

                        'Pending' =>
                            $orders
                                ->where(
                                    'status',
                                    'pending'
                                )
                                ->count(),

                        'Order Value' =>
                            $total,
                    ],

                    'chart' => [

                        'type' => 'bar',

                        'label' =>
                            'Orders by Status',

                        'labels' => [
                            'Pending',
                            'Completed',
                            'Cancelled'
                        ],

                        'data' => [
                            $orders
                                ->where(
                                    'status',
                                    'pending'
                                )
                                ->count(),

                            $orders
                                ->where(
                                    'status',
                                    'completed'
                                )
                                ->count(),

                            $orders
                                ->where(
                                    'status',
                                    'cancelled'
                                )
                                ->count(),
                        ],
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 9. LOW STOCK
            |--------------------------------------------------------------------------
            */

            case 'low-stock':

                $products = Product::with('category')
                    ->where('stock', '<=', 10)
                    ->orderBy('stock')
                    ->get();

                return [

                    'title' => 'Low Stock Report',

                    'subtitle' =>
                        'Products requiring inventory attention',

                    'columns' => [
                        'ID',
                        'Product',
                        'Category',
                        'Stock',
                        'Price'
                    ],

                    'rows' => $products->map(function ($p) {

                        return [
                            $p->id,
                            $p->name,

                            optional($p->category)->name
                                ?? 'N/A',

                            (int) ($p->stock ?? 0),

                            (float) ($p->price ?? 0),
                        ];

                    })->values(),

                    'stats' => [

                        'Low Stock Items' =>
                            $products
                                ->where('stock', '>', 0)
                                ->count(),

                        'Out of Stock' =>
                            $products
                                ->where('stock', '<=', 0)
                                ->count(),

                        'Critical Stock' =>
                            $products
                                ->where('stock', '<=', 3)
                                ->count(),

                        'Total Units' =>
                            $products->sum(
                                fn($p) =>
                                (int) ($p->stock ?? 0)
                            ),
                    ],

                    'chart' => [

                        'type' => 'bar',

                        'label' =>
                            'Low Stock Quantity',

                        'labels' =>
                            $products
                                ->take(10)
                                ->pluck('name')
                                ->values(),

                        'data' =>
                            $products
                                ->take(10)
                                ->pluck('stock')
                                ->map(
                                    fn($v) => (int) $v
                                )
                                ->values(),
                    ],
                ];


            /*
            |--------------------------------------------------------------------------
            | 10. REVENUE
            |--------------------------------------------------------------------------
            */

            case 'revenue':

                $orders = Order::with('user')
                    ->whereNotIn(
                        'status',
                        ['cancelled']
                    )
                    ->latest()
                    ->get();

                $revenue = $orders->sum(
                    fn($o) =>
                    (float) (
                        $o->total
                        ?? $o->total_amount
                        ?? 0
                    )
                );

                $months = $orders->groupBy(
                    fn($o) =>
                    optional($o->created_at)
                        ->format('M Y')
                );

                return [

                    'title' => 'Revenue Report',

                    'subtitle' =>
                        'Revenue and financial performance',

                    'columns' => [
                        'Order ID',
                        'Date',
                        'Customer',
                        'Revenue'
                    ],

                    'rows' => $orders->map(function ($o) {

                        return [
                            $o->id,

                            optional($o->created_at)
                                ->format('d M Y'),

                            optional($o->user)->name
                                ?? $o->customer_name
                                ?? 'Guest',

                            (float) (
                                $o->total
                                ?? $o->total_amount
                                ?? 0
                            ),
                        ];

                    })->values(),

                    'stats' => [

                        'Total Revenue' =>
                            $revenue,

                        'Transactions' =>
                            $orders->count(),

                        'Average Order' =>
                            $orders->count()
                                ? $revenue / $orders->count()
                                : 0,

                        'Highest Order' =>
                            $orders->max(
                                fn($o) =>
                                (float) (
                                    $o->total
                                    ?? $o->total_amount
                                    ?? 0
                                )
                            ) ?? 0,
                    ],

                    'chart' => [

                        'type' => 'line',

                        'label' =>
                            'Monthly Revenue',

                        'labels' =>
                            $months
                                ->keys()
                                ->values(),

                        'data' =>
                            $months
                                ->map(
                                    fn($group) =>
                                    $group->sum(
                                        fn($o) =>
                                        (float) (
                                            $o->total
                                            ?? $o->total_amount
                                            ?? 0
                                        )
                                    )
                                )
                                ->values(),
                    ],
                ];


            default:

                abort(404);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | REPORT PAGE
    |--------------------------------------------------------------------------
    */

    public function show(string $report)
    {
        $data = $this->reportData($report);

        return view(
            'admin.reports.report',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REPORT ROUTES
    |--------------------------------------------------------------------------
    */

    public function sales()
    {
        return $this->show('sales');
    }

    public function purchase()
    {
        return $this->show('purchase');
    }

    public function products()
    {
        return $this->show('products');
    }

    public function categories()
    {
        return $this->show('categories');
    }

    public function customers()
    {
        return $this->show('customers');
    }

    public function suppliers()
    {
        return $this->show('suppliers');
    }

    public function stock()
    {
        return $this->show('stock');
    }

    public function orders()
    {
        return $this->show('orders');
    }

    public function lowStock()
    {
        return $this->show('low-stock');
    }

    public function revenue()
    {
        return $this->show('revenue');
    }


    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */

    public function pdf(string $report)
    {
        $data = $this->reportData($report);

        $pdf = Pdf::loadView(
            'admin.reports.pdf',
            $data
        )->setPaper(
            'a4',
            'landscape'
        );

        return $pdf->download(
            $report . '-report.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EXCEL
    |--------------------------------------------------------------------------
    */

    public function excel(string $report)
    {
        $data = $this->reportData($report);

        return Excel::download(
            new ReportExport(
                $data['title'],
                $data['columns'],
                $data['rows']
            ),
            $report . '-report.xlsx'
        );
    }
}