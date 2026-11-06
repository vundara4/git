<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CategoryApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\Api\ProductApiController;



Route::middleware('api.key')->group(function () {
    Route::post('/auth/login', [AuthApiController::class, 'login']);
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/categories/{category}/products', [ProductApiController::class, 'byCategory']);
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{product}', [ProductApiController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', fn (Request $request) => $request->user());
        Route::post('/auth/logout', [AuthApiController::class, 'logout']);
        Route::get('/cart', [CartApiController::class, 'index']);
        Route::post('/cart/items', [CartApiController::class, 'store']);
        Route::put('/cart/items/{product}', [CartApiController::class, 'update']);
        Route::delete('/cart/items/{product}', [CartApiController::class, 'destroy']);
    });
});
