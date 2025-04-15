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
use Illuminate\Support\Facades\DB;

class StripePaymentController extends Controller
{
    public function paymentcheckout()
    {
        return view('user.checkout');
    }

    public function createSession(Request $request)
    {
        $request->validate([
            'cardnumber' => 'required',
            'expDate' => 'required',
            'cvv' => 'required',
            'order_id' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'booking_amount' => 'required|numeric',
            'discount_amount' => 'required|numeric',
            'items' => 'required|array',
        ]);
    
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
    
            // Parse expiration date
            [$expMonth, $expYear] = explode('/', str_replace(' ', '', $request->expDate));
    
            // Create Stripe Token (you can also use PaymentIntents if preferred)
            $token = \Stripe\Token::create([
                'card' => [
                    'number' => str_replace(' ', '', $request->cardnumber),
                    'exp_month' => (int) $expMonth,
                    'exp_year' => (int) ('20' . $expYear),
                    'cvc' => $request->cvv,
                ],
            ]);
    
            // Create the charge
            $charge = Charge::create([
                'amount' => $request->total_amount * 100, // Stripe accepts amount in cents
                'currency' => 'aed',
                'description' => 'Order #' . $request->order_id,
                'source' => $token->id,
            ]);
    
            // Store payment and booking data in DB
            DB::beginTransaction();
    
            // Save payment
            $payment = Payment::create([
                'order_id' => $request->order_id,
                'user_id' => Auth::id(),
                'booking_amount' => $request->booking_amount,
                'discount_amount' => $request->discount_amount,
                'total_amount' => $request->total_amount,
                'payment_method' => 'stripe',
                'payment_status' => $charge->status == 'succeeded' ? 'completed' : 'failed',
                'stripe_transaction_id' => $charge->id,
                'payment_response' => json_encode($charge),
            ]);
    
            // Save booking confirmation
            $booking = BookingConfirmation::create([
                'order_id' => $request->order_id,
                'booking_id' => strtoupper(Str::random(10)),
                'user_id' => Auth::id(),
                'booking_amount' => $request->booking_amount,
                'discount_amount' => $request->discount_amount,
                'total_amount' => $request->total_amount,
                'booking_status' => 'confirmed',
                'booking_details' => json_encode($request->items),
                'vat' => $request->vat ?? 0,
            ]);
    
            foreach ($request->items as $item) {
                BookingConfirmationItem::create([
                    'booking_confirmation_id' => $booking->id,
                    'product_varient_id' => $item['product_varient_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price'],
                    'verification_number' => rand(100000, 999999),
                    'verification_status' => 'pending',
                    'giftproduct' => $item['giftproduct'] ?? 0,
                ]);
            }
    
            DB::commit();
    
            return response()->json([
                'status' => true,
                'message' => 'Payment successful and booking confirmed!',
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Payment failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
