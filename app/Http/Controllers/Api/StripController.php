<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationEmail;
use App\Models\BookingConfirmation;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Models\ProductVariant;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;

class StripController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $amount = $request->input('amount'); 
    
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);
    
        return response()->json([
            'client_secret' => $intent->client_secret,
        ]);
    }
    public function finalizeBooking(Request $request) 
    {
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $user =Auth::user(); 

    DB::beginTransaction();
    try {
        // Optional: Retrieve payment intent to verify it again if needed
        $paymentIntent = \Stripe\PaymentIntent::retrieve($request->payment_intent_id);

        if ($paymentIntent->status !== 'succeeded') {
            throw new \Exception('Payment not completed.');
        }
        
        $status = 'pending';
        if($paymentIntent->status == 'succeeded'){
            $status = 'completed';
        }
        else{
            $status = 'failed';
        }
        // Save Payment Details
        $paymentId = DB::table('payments')->insertGetId([
            'order_id' => $request->order_id,
            'user_id' => $user->id,
            'booking_amount' => $request->booking_amount,
            'discount_amount' => $request->voucher_savings,
            'total_amount' => $request->total_amount,
            'payment_method' => 'stripe',
            'payment_status' => $status, 
            'stripe_transaction_id' => $paymentIntent->id,
            'payment_response' => json_encode($paymentIntent),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create Booking Confirmation
        $bookingConfirmation = BookingConfirmation::create([
            'payment_id' => $paymentId,
            'order_id' => $request->order_id,
            'booking_id' => uniqid('BOOK-'),
            'user_id' => $user->id,
            'booking_amount' => $request->booking_amount,
            'discount_amount' => $request->voucher_savings,
            'total_amount' => $request->total_amount,
            'booking_status' => 'confirmed',
            'booking_details' => json_encode($request->items),
            'promocode' => $request->promocode,
            'promocode_discount_amount' => $request->promo_discount_amount,
            'vat' => $request->vat_amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($request->items as $variantId => $item) {

            $product_variant = ProductVariant::find($variantId);
            $order_date = $bookingConfirmation->created_at->copy(); 
            $validity = $product_variant->product->types->validity; 
            $valid_until = $order_date->copy()->addDays($validity);

            DB::table('booking_confirmation_items')->insert([
                'booking_confirmation_id' => $bookingConfirmation->id,
                'product_varient_id' => $variantId,
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['total_price'],
                'verification_number' => rand(100000, 999999),
                'verification_status' => 'pending',
                'validity'=>  $valid_until,
                'giftproduct' => $item['giftproduct'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Cleanup
        Cart::where('user_id', $user->id)->delete();
        CheckoutItem::where('checkout_id', $request->order_id)->delete();
        Checkout::where('id', $request->order_id)->delete();

        $variants = [];
        $bookingConfirmationId = $bookingConfirmation->id;
        $booking = BookingConfirmation::find($bookingConfirmationId);
        $order_date = $booking->created_at->format('Y-m-d'); 
        $order_number = $booking->booking_id;
        $vat = $booking->vat;
        $promocode_discount_amount = $booking->promocode_discount_amount;
        $grand_total = $booking->total_amount;
        $promocode = $booking->promocode;
        $promo_discount = null;
        if($promocode){
            $promo = Promo::where('promocode', $promocode)->first();

            $promo_discount =$promo->discount;
        }


        $items = [];
        $importantinfo = null;
        $nbv_terms = null;
        foreach ($booking->items as $booking_item) { 
            $product_variant = ProductVariant::find($booking_item['product_varient_id']);
             $items[] = [
                'product_variant'=>$product_variant->title,
                'quantity' => $booking_item['quantity'],
                'unit_price' => $product_variant->discounted_price,
                'total_price' => $booking_item['unit_price'],
            ];
            if ($product_variant->product) {
                $importantinfo = $product_variant->product->importantinfo ?? null;
                $nbv_terms = $product_variant->product->nbvTerms->terms ?? null;
            }
        }
        foreach ($booking->items as $booking_item) { 
            
            $variants[] = [
                'product_variant_id'=>$booking_item->product_varient_id,
                'voucher_number' => $booking->booking_id, 
                'guest_name'   =>$user->first_name .' '. $user->last_name,
                'email'=>$user->email,
                'verification_number'=>$booking_item->verification_number,
                'voucher_details'=> $product_variant->product->email_about,
                'product_name'=>$product_variant->product->name,
                'product_variant_name'=>$product_variant->title,
                'importantinfo'=>$product_variant->product->importantinfo,
                'validity_from' => $order_date,
                'validity_to' => $booking_item->validity,
                'vendor'=> $product_variant->product->vendor->name,
                'nbv_terms_title'=> $product_variant->product->nbvTerms->title,
                'nbv_terms'=> $product_variant->product->nbvTerms->terms,
                'vendor_terms_title'=> $product_variant->product->vendorTerms->title,
                'vendor_terms'=> $product_variant->product->vendorTerms->terms,
            ];
        }

        Mail::to($user->email)->send(new BookingConfirmationEmail($user->first_name,$order_date,$order_number,$grand_total,$vat,$promocode,$promo_discount,$promocode_discount_amount,$importantinfo, $nbv_terms,$items,$variants));

        DB::commit();
        return response()->json(['success' => true, 'message' => 'Booking confirmed.']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

}
