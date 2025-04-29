<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;

// Protect admin routes with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::put('/admin/products/{id}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
});

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes (Login, Logout, etc.)
Auth::routes(); // This automatically includes login, register, and logout routes

// Admin Routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // Add more admin routes here as needed
});
