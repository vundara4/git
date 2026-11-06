<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CategoryFrontController;
use App\Http\Controllers\Front\CategoryProductFrontController;
use App\Http\Controllers\Front\FrontCategoryController;
use App\Http\Controllers\Front\ProductFrontController;
use App\Http\Controllers\Front\CartFrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\ChatController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'index'])->name('products.index');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'storeRegistration']);

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'customer'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');
});


Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/category/{id}', [ProductController::class, 'byCategory']);

Route::get('/categories', [CategoryFrontController::class, 'index'])
    ->name('front.categories.index');
Route::get('/category/{category}/products', [CategoryProductFrontController::class, 'index'])
    ->name('front.category.products');
Route::get('/category/{id}/products', [FrontCategoryController::class, 'categoryProducts']);

Route::get('/product/{product}', [ProductFrontController::class, 'show'])->name('products.show');

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/cart', [CartFrontController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartFrontController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{product}', [CartFrontController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartFrontController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartFrontController::class, 'clear'])->name('cart.clear');
});

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index')
    ->middleware(['auth', 'customer']);
Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store')
    ->middleware(['auth', 'customer']);
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success')->middleware(['auth', 'customer']);
Route::get('/checkout/failure', [CheckoutController::class, 'failure'])->name('checkout.failure');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::get('/checkout/receipt/{order}', [CheckoutController::class, 'receipt'])->name('checkout.receipt')->middleware(['auth', 'customer']);

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categoryStore', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categoryList', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/categoryEdit/{id}', [CategoryController::class, 'categoryShowData'])->name('category.edit');
    Route::post('/categoryEdit', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/categoryDelete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    Route::get('/product', [ProductController::class, 'product'])->name('product.create');
    Route::post('/productStore', [ProductController::class, 'productStore'])->name('product.store');
    Route::get('/productList', [ProductController::class, 'productList'])->name('product.list');
    Route::get('/productEdit/{id}', [ProductController::class, 'productShowData'])->name('product.edit');
    Route::put('/productUpdate/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::get('/productDelete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
});
use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'history'])
    ->name('orders.history')
    ->middleware(['auth', 'customer']);
Route::get('/admin/api/categories', function () {
    return view('admin.api.categories');
});

Route::get('/admin/api/products', function () {
    return view('admin.api.products');
});

Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
Route::get('/rental/assets', [RentalController::class, 'assets'])->name('rental.assets');

//--report
Route::middleware(['auth', 'admin'])->prefix('admin/reports')->name('reports.')->group(function () {

    // Report pages
    Route::get('/sales', [ReportController::class, 'sales'])
        ->name('sales');

    Route::get('/purchase', [ReportController::class, 'purchase'])
        ->name('purchase');

    Route::get('/products', [ReportController::class, 'products'])
        ->name('products');

    Route::get('/categories', [ReportController::class, 'categories'])
        ->name('categories');

    Route::get('/customers', [ReportController::class, 'customers'])
        ->name('customers');

    Route::get('/suppliers', [ReportController::class, 'suppliers'])
        ->name('suppliers');

    Route::get('/stock', [ReportController::class, 'stock'])
        ->name('stock');

    Route::get('/orders', [ReportController::class, 'orders'])
        ->name('orders');

    Route::get('/low-stock', [ReportController::class, 'lowStock'])
        ->name('low-stock');

    Route::get('/revenue', [ReportController::class, 'revenue'])
        ->name('revenue');


    // PDF
    Route::get('/{report}/pdf', [ReportController::class, 'pdf'])
        ->name('pdf');


    // Excel
    Route::get('/{report}/excel', [ReportController::class, 'excel'])
        ->name('excel');

});
Route::get('/new-arrivals', [ProductController::class, 'newArrivals'])->name('front.new-arrivals');
Route::get('/about', [ProductController::class, 'about'])->name('front.about');
///


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Password Reset
|--------------------------------------------------------------------------
*/

// Show Forgot Password page
Route::get(
    '/forgot-password',
    [PasswordResetController::class, 'showForgotPasswordForm']
)->name('password.request');


// Send reset code to email
Route::post(
    '/forgot-password',
    [PasswordResetController::class, 'sendResetLinkEmail']
)->name('password.email');

// Show code verification page
Route::get(
    '/password-verify',
    [PasswordResetController::class, 'showVerifyForm']
)->name('password.verify.form');

// Verify the emailed code
Route::post(
    '/password-verify',
    [PasswordResetController::class, 'verifyResetCode']
)->name('password.verify');

// Show Reset Password page
Route::get(
    '/reset-password/{token}',
    [PasswordResetController::class, 'showResetForm']
)->name('password.reset');


// Update password
Route::post(
    '/reset-password',
    [PasswordResetController::class, 'reset']
)->name('password.update');

//chatbot

Route::post('/chat/respond', [ChatController::class, 'respond'])->name('chat.respond');