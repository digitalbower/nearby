<?php

use App\Http\Controllers\Api\StripController;
use Illuminate\Support\Facades\Route;

// Preflight request handler for CORS
Route::options('/{any}', function () {
    return response()->json([], 204);
})->where('any', '.*');

Route::middleware(['web'])->group(function () {
    Route::post('/stripe/create-payment-intent', [StripController::class, 'createPaymentIntent']);
    Route::post('/stripe/finalize-booking', [StripController::class, 'finalizeBooking']);
});
