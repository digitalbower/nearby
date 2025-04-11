<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Payment;
use App\Models\BookingConfirmation;
use App\Models\BookingConfirmationItem;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    public function paymentcheckout()
    {
        return view('user.checkout');
    }

    public function createSession(Request $request)
    {
        // HARD CODED just for testing
        Stripe::setApiKey('sk_test_51RCiBxFE0ideOXuZh6wTWktSExMp3DhJ3d112CWRyf2RVuChJtlfQ9jiCzAIFkTQOjQfyxoHB1ws8SWRBWWOathR00s60hwqD4');

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => [
                        'name' => 'Test Product',
                    ],
                    'unit_amount' => 5000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('user.checkout.success'),
            'cancel_url' => route('user.checkout.cancel'),
        ]);

        return redirect($checkout_session->url);
    }
}
