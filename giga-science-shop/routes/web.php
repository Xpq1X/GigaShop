<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// CSRF token route to set cookies
Route::get('/sanctum/csrf-cookie', function () {
    return response()->json(['message' => 'CSRF token set']);
});

// Public home page
Route::get('/', function () {
    return view('welcome');  // Base route, serves welcome.blade.php
});

// Public Routes for Products and Orders (no authentication needed)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');  // View all products
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');  // View all orders

// Optionally, if you need to create orders, make a post route without authentication
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');  // Create new order (if public creation is allowed)

// If you still want product management (CRUD) available, you could keep this:
Route::resource('products', ProductController::class);  // This assumes product creation and management might still be needed
