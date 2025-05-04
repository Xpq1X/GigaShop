<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Authenticated Routes (using Firebase token for authentication)
Route::middleware('firebase.auth')->group(function () {  // You can implement your own middleware to verify Firebase token here
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);  // ✅ GET orders
    Route::post('/orders/{id}/pay', [OrderController::class, 'pay']);  // ✅ PAY order

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/user', fn(Request $request) => $request->user());
});
