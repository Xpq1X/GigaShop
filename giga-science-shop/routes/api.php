<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/products', [ProductController::class, 'index']); // List all products
Route::get('/products/{id}', [ProductController::class, 'show']); // Show specific product

// Auth Routes (public)
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// Protected Routes (requires login via Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/logout', [LoginController::class, 'logout']); // Now protected

    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/products', [AdminController::class, 'index']);
        Route::post('/products', [AdminController::class, 'store']);
        Route::put('/products/{id}', [AdminController::class, 'update']);
        Route::delete('/products/{id}', [AdminController::class, 'destroy']);
    });

    // Get authenticated user (for frontend auth check)
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
