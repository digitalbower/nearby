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
    public function checkout()
    {
        return view('user.checkout');
    }

    public function session(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = 5000; // amount in AED (e.g., 50.00)
        $userId = auth()->id(); // assume user is logged in
        $bookingId = Str::uuid();

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => [
                        'name' => 'Booking Payment',
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('user.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('user.stripe.cancel'),
        ]);

        session(['stripe_session_id' => $checkout_session->id]);
        session(['booking_id' => $bookingId]);

        return redirect($checkout_session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        $userId = auth()->id();
        $bookingId = session('booking_id');

        // Store Payment
        $payment = Payment::create([
            'order_id' => null,
            'user_id' => $userId,
            'booking_amount' => 50.00,
            'discount_amount' => 0.00,
            'total_amount' => 50.00,
            'payment_method' => 'stripe',
            'payment_status' => 'completed',
            'stripe_transaction_id' => $session->payment_intent,
            'payment_response' => json_encode($session),
        ]);

        // Store Booking Confirmation
        $bookingConfirmation = BookingConfirmation::create([
            'order_id' => null,
            'booking_id' => $bookingId,
            'user_id' => $userId,
            'booking_amount' => 50.00,
            'discount_amount' => 0.00,
            'total_amount' => 50.00,
            'booking_status' => 'confirmed',
            'booking_details' => json_encode(['message' => 'Booking successful']),
        ]);

        // Store Booking Items (dummy item for now)
        BookingConfirmationItem::create([
            'booking_confirmation_id' => $bookingConfirmation->id,
            'product_varient_id' => 1,
            'quantity' => 1,
            'unit_price' => 50.00,
            'total_price' => 50.00,
            'verification_number' => rand(100000, 999999),
            'verification_status' => 'pending',
            'giftproduct' => 1,
        ]);

        return view('payment.success');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
