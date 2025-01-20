<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;




Route::prefix('/')->name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/product', [HomeController::class, 'product'])->name('product');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/bookingconfirmation', [HomeController::class, 'bookingconfirmation'])->name('bookingconfirmation');
});



