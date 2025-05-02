<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// CSRF token route to set cookies
Route::get('/sanctum/csrf-cookie', function () {
    return response()->json(['message' => 'CSRF token set']);
});

// Public home page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes (only accessible for guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout Route (accessible to authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Orders Routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');  // View all orders
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');  // Create new order
    
    // Product Routes (accessible to authenticated users as well)
    Route::resource('products', ProductController::class);
});
