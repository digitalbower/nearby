<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ProfileController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\DashboardController;

// ✅ Google Authentication Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// ✅ User Routes
Route::prefix('user')->group(function () {

    // ✅ Guest Routes (Only for Unauthenticated Users)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/login', [AuthController::class, 'loginsubmit'])->name('login.submit');
    });

    // ✅ Authenticated Routes (Only for Logged-in Users)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // ✅ Home & Product Routes
        
        Route::get('/product', [HomeController::class, 'product'])->name('home.product');

        // ✅ E-commerce & Booking Routes
        Route::get('/bookingconfirmation', [HomeController::class, 'bookingconfirmation'])->name('home.bookingconfirmation');
        Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');

        // ✅ Profile Management Routes
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::post('/profile/upload-picture', [ProfileController::class, 'uploadPicture'])->name('profile.upload-picture');
    });
});

Route::get('/admin', function () {
    return view('admin.index');
});


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// ✅ Admin Routes (To be added when required)
Route::prefix('admin')->group(function () {
    // Example: Admin routes can be added here in the future
     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
