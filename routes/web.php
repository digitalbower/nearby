<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\Auth\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\Product\CompanyTermController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\VendorController;
use App\Http\Controllers\Admin\Product\VendorTermController;
use App\Http\Controllers\Admin\NavigationMenuController;
use App\Http\Controllers\Admin\Product\ProductVariantController;

// ✅ User Routes

// ✅ Google Authentication Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');


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



    

 
    
// ✅ Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Authentication
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'adminLogin'])->name('login');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Admin Panel Routes (Requires Admin Middleware)
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create'); 
            Route::post('/', [ProductController::class, 'store'])->name('store'); 
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit'); 
            Route::put('/{product}', [ProductController::class, 'update'])->name('update'); 
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy'); 
            Route::get('/company-terms', [CompanyTermController::class, 'index'])->name('company_terms.index');
            Route::get('/company-terms/{term}/edit', [CompanyTermController::class, 'edit'])->name('company_terms.edit');
            Route::put('/company-terms/{term}', [CompanyTermController::class, 'update'])->name('company_terms.update');
            Route::resource('vendors', VendorController::class);
            Route::post('/vendors/change-status', [VendorController::class, 'changeVendorStatus'])->name('vendors.status');
            Route::resource('vendor_terms', VendorTermController::class);
            Route::resource('product_variants', ProductVariantController::class);

        });
        Route::prefix('logos')->name('logos.')->group(function () {
            Route::get('/', [LogoController::class, 'index'])->name('index'); 
            Route::get('/{id}/edit', [LogoController::class, 'edit'])->name('edit'); 
            Route::post('/update', [LogoController::class, 'update'])->name('update'); 
        });

        // Navigation Menu Management Routes
        Route::prefix('navigation')->name('navigation.')->group(function () {
            Route::get('/', [NavigationMenuController::class, 'index'])->name('index');
            Route::get('/create', [NavigationMenuController::class, 'create'])->name('create');
            Route::post('/', [NavigationMenuController::class, 'store'])->name('store');
            Route::get('/{navigationMenu}/edit', [NavigationMenuController::class, 'edit'])->name('edit');
            Route::put('/{navigationMenu}', [NavigationMenuController::class, 'update'])->name('update');
            Route::delete('/{navigationMenu}', [NavigationMenuController::class, 'destroy'])->name('destroy');

        });
    });
});


