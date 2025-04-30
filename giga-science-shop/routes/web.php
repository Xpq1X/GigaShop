<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Home page (protected)
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Authentication Routes (only accessible for guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout Route (accessible to authenticated users)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', function () {
        return 'Products Dashboard (placeholder)';
    })->name('admin.products');

    Route::get('/admin/users', function () {
        return 'Users Dashboard (placeholder)';
    })->name('admin.users');

    Route::get('/admin/orders', function () {
        return 'Orders Dashboard (placeholder)';
    })->name('admin.orders');

    // Optional: Real admin controller routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::put('/admin/products/{id}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
});
