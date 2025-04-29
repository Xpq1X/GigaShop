<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/products', [ProductController::class, 'index']); // List all products
Route::get('/products/{id}', [ProductController::class, 'show']); // Show specific product

// Routes for authenticated users (using sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [OrderController::class, 'store']); // Create an order

    // Admin Routes (protected by auth middleware)
    Route::prefix('admin')->group(function () {
        Route::get('/products', [AdminController::class, 'index']); // Get all products (for admin)
        Route::post('/products', [AdminController::class, 'store']); // Add new product
        Route::put('/products/{id}', [AdminController::class, 'update']); // Update product
        Route::delete('/products/{id}', [AdminController::class, 'destroy']); // Delete product
    });
});

// Get current authenticated user (for frontend auth check)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
