<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// Authenticated Routes (using sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);  // ✅ GET orders
    Route::post('/orders/{id}/pay', [OrderController::class, 'pay']);  // ✅ PAY order

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/user', fn(Request $request) => $request->user());
});
