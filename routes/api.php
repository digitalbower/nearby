<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\StripController;

// Preflight request handler for CORS
Route::options('/{any}', function () {
    return response()->json([], 204);
})->where('any', '.*');

Route::middleware(['web'])->group(function () {
    Route::post('/stripe/create-payment-intent', [StripController::class, 'createSetupIntent']);
    Route::post('/stripe/subscribe', [StripController::class, 'subscribe']);
    Route::post('/stripe/save-paymentcard', [StripController::class, 'savePaymentCard']);
    Route::post('/stripe/payment-details', [StripController::class, 'getCustomerPaymentMethods']);
    Route::post('/stripe/update-default-card', [StripController::class, 'updateDefaultCard']);
    Route::post('/subscribe/confirm', [StripController::class, 'confirmSubscription']);

});
