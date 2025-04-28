<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationEmail;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\NavigationMenu;
use App\Models\Promo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\DB;
use Stripe\Token;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use App\Models\Payment;
use App\Models\BookingConfirmation;
use App\Models\BookingConfirmationItem;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\PurchasedProduct;
use Exception;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function proceedCheckout(Request $request){ 

        $request->validate([
            'orders' => 'required|array',
            'orders.*.product_variant_id' => 'required|exists:product_variants,id',
            'orders.*.quantity' => 'required|integer|min:1', 
        ],
        [
            'orders.*.quantity.required' => 'Add quantity', 
            'orders.*.quantity.min' => 'Add quantity with minimum value 1', 
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id; 
        //Add VAT later
        $checkoutOrder = Checkout::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'booking_amount' => $data['booking_amount'],
                'total_amount' => $data['total_amount'],
                'vat' => $data['vat_amount'],
                'payment_type' => $data['payment_type']
            ]
        );
        
        foreach ($request->orders as $order) { 
            $item = CheckoutItem::where('product_variant_id',$order['product_variant_id'])
                    ->where('checkout_id', $checkoutOrder->id)
                    ->first(); 
            if($item == null){
                CheckoutItem::create([
                    'checkout_id'=>$checkoutOrder->id,
                    'product_variant_id' => $order['product_variant_id'],
                    'quantity' => $order['quantity'],
                    'unit_price'=> $order['unit_price'],
                    'total_price'=> $order['total_price'],
                    'giftproduct'=> $order['giftproduct'] ?? 0,
                ]);
            
            }
            else{
                $item->quantity = $order['quantity'];
                $item->unit_price = $order['unit_price'];
                $item->total_price = $order['total_price'];
                $item->giftproduct = $order['giftproduct'] ?? 0;
                $item->save();
            }
         
        }
    
        return redirect()->route('user.checkout')->with('success', 'Proceed to checkout successfully!');
    }
    public function checkout()
    {
        $uppermenuItems = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'upper')
        ->get(); 

        $lowermenuitem = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'lower')
        ->get();

        $logo = Logo::where('status', 1)
        ->where('type', 'header') 
        ->first(); 
        
        $topDestinations = Footer::where('type', 'Top Destination')
                              ->where('status', 1)
                              ->get();
    
        $informationLinks = Footer::where('type', 'Information')
                            ->where('status', 1)
                            ->get();

        $followus = Footer::where('type', 'Follow Us')
        ->where('status', 1)
        ->get();

        $payment_channels = Footer::where('type', 'payment_channels')
        ->where('status', 1)
        ->get();     
        $products = Checkout::with('items.variant')->where('user_id',Auth::user()->id)->get(); 

        if (!$products || count($products) == 0) {
            return redirect()->route('user.products.index')->with('warning', 'Your checkout is empty.');
        }
        $product_array = [];

        $bookingAmount = 0;

        $originalTotal = 0;

        
        $promoCode = session('promocode');

        foreach ($products as $checkout) { 
            $count = count($checkout->items);
            foreach ($checkout->items as $item) {
                $variant = $item->variant; 
               
                $discountedPrice = $variant['discounted_price'] * $item->quantity;

                $unitPrice = $variant['unit_price'] * $item->quantity;

                $bookingAmount += $discountedPrice;

                $originalTotal += $unitPrice;

               
            }

            $order_id = $checkout->id;
        } 
        $voucherSavings = $originalTotal - $bookingAmount; 

        $vat = round($bookingAmount * 0.05, 2);

        $promo_discount = 0;

        $promocode_discount_amount = 0;
        
        $total = $bookingAmount + $vat;

        if($promoCode){
            $now = Carbon::now();
            $promo = Promo::where('promocode', $promoCode)
            ->whereDate('validity_from', '<=', $now)
            ->whereDate('validity_to', '>=', $now)
            ->where('status', 1)
            ->first();

            $promo_discount =$promo->discount;
            $promocode_discount_amount = $bookingAmount * $promo_discount/100; 
            $vat = $checkout->vat;
            $total =$bookingAmount+(-$promocode_discount_amount)+$vat;
        }
      
    
        $user = Auth::user();
        $isPromoApplied = false;
    
        if ($promoCode ) {
            $checkout = Checkout::where('user_id', $user->id)
                            ->where('promocode', $promoCode)
                            ->latest()
                            ->first();
    
            if ($checkout) {
                $isConfirmed = BookingConfirmation::where('order_id', $checkout->id)->exists();
    
                if ($isConfirmed) {
                    session()->forget('promocode');
                } else {
                    $isPromoApplied = true;
                }
            } else {
                session()->forget('promocode');
            }
        }

    
        return view('user.checkout',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','count','bookingAmount','voucherSavings','vat','total','promo_discount',
        'promocode_discount_amount','discountedPrice','order_id','isPromoApplied')); 
    }
    public function getCheckoutItems(){
        
        $products = Checkout::with('items.variant')->where('user_id',Auth::user()->id)->get();
        
        $product_array = [];

        foreach ($products as $checkout) { 
          
            foreach ($checkout->items as $item) {

                $variant = $item->variant; 

                $discountedPrice = $variant['discounted_price'] * $item->quantity;

                $imagePath = $variant['product']['image'] ?? null;

                $product_array[] = [
                    'id' => $variant['id'],
                    'checkout_id' => $checkout->id,
                    'product_name'=>$variant['product']['name'],
                    'title' => $variant['title'],
                    'short_description' => $variant['short_description'],
                    'discounted_price' => number_format($discountedPrice, 2),
                    'timer_flag' => $variant['timer_flag'],
                    'end_time' => $variant['end_time'],
                    'image' => $imagePath ? asset('storage/' . $imagePath) : 'https://via.placeholder.com/100',
                    'quantity' => $item->quantity,
                    'giftproduct'=>$item->giftproduct
                ];
            }
        } 

        return response()->json($product_array);
        
    }
    public function updateCheckout(Request $request)
    {
        $variantId = $request->input('product_variant_id');
        $quantity = $request->input('quantity');
    
        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $user_id = Auth::user()->id;
        $user = User::find($user_id); 
        $checkout =  $user->checkout()->with('items.variant')->first();
        $promoCode = session('promocode');
        if ($checkout && $checkout->items->isNotEmpty()) {
            $item = $checkout->items->where('product_variant_id', $variantId)->first();
    
            if ($item) {
               
                // Get updated values for this item
                $discountedPrice = $item->variant->discounted_price * $request->quantity;
                $unitPrice = $item->variant->unit_price * $request->quantity; 
    
                $item->quantity = $quantity;
                $item->total_price = $unitPrice;
                $item->save();

                // Calculate full totals
                $bookingAmount = 0;
                $originalTotal = 0;
    
                foreach ($checkout->items as $cartItem) { 
                    $bookingAmount += $cartItem->variant->discounted_price * $cartItem->quantity;
                    $originalTotal += $cartItem->variant->unit_price * $cartItem->quantity;
                }
               
                $voucherSavings = $originalTotal - $bookingAmount;

                $vat = round($bookingAmount * 0.05, 2);
        
                $total = $bookingAmount + $vat;

                if($promoCode){
                    $now = Carbon::now();
                    $promo = Promo::where('promocode', $promoCode)
                    ->whereDate('validity_from', '<=', $now)
                    ->whereDate('validity_to', '>=', $now)
                    ->where('status', 1)
                    ->first();

                    $promo_discount =$promo->discount;

                    $promocode_discount_amount = $bookingAmount * $promo_discount/100; 

                    $vat = $checkout->vat;

                    $total =$bookingAmount+(-$promocode_discount_amount)+$vat;

                    $checkout->promocode = $promoCode;
                    
                    $checkout->discount_amount = $promocode_discount_amount;
                }
                $checkout->booking_amount = $bookingAmount;
                $checkout->vat =  $vat;
                $checkout->total_amount =  $total;
                $checkout->save();
                
                return response()->json([
                    'success' => true,
                    'discountedPrice' => $discountedPrice,
                    'unitPrice' => $unitPrice,
                    'voucherSavings'=>number_format($voucherSavings),
                    'bookingAmount' => number_format($bookingAmount, 2),
                    'vat' => number_format($vat, 2),
                    'promo_discount'=>$promo_discount ?? '',
                    'promocode_discount_amount'=>$promocode_discount_amount ?? '',
                    'total' => number_format($total, 2),
                    'message' => 'Quantity updated successfully.'
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Item not found in checkout.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Checkout or items not found.']);
        }
    }
    public function removeCheckoutItem(Request $request)
    {
        $product_variant_id = $request->input('product_variant_id');

        $user_id = Auth::user()->id;
        $user = User::find($user_id); 
        $checkout =  $user->checkout()->with('items')->first();  

        if ($checkout) {
            $item = $checkout->items->where('product_variant_id', $product_variant_id)->first();
            if ($item) {
                $item->delete(); 

                $checkout->load('items.variant');

                if ($checkout->items->isEmpty()) {
                    $checkout->delete();
                    return response()->json(['success' => true, 'message' => 'Checkout and all items removed.']);
                }

                $bookingAmount = 0;
                $originalTotal = 0;

                foreach ($checkout->items as $cartItem) {
                    $bookingAmount += $cartItem->variant->discounted_price * $cartItem->quantity;
                    $originalTotal += $cartItem->variant->unit_price * $cartItem->quantity;
                }
    
                $voucherSavings = $originalTotal - $bookingAmount;

                $vat = round($bookingAmount * 0.05, 2);
        
                $total = $bookingAmount + $vat;

                $checkout->booking_amount = $bookingAmount;
                $checkout->vat =  $vat;
                $checkout->total_amount =  $total;
                $checkout->save();

                return response()->json(['success' => true,
                        'voucherSavings'=>number_format($voucherSavings),
                        'bookingAmount' => number_format($bookingAmount, 2),
                        'vat' => number_format($vat, 2),
                        'total' => number_format($total, 2),
                ]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Item not found']);
    }
    public function applyCoupon(Request $request)
    {
        $request->validate([
            'promocode' => 'required|string'
        ]);
    
        $code = $request->input('promocode');
        $now = Carbon::now();
        
        if (session('promocode') && session('promocode') === $code) {
            return response()->json([
                'success' => false,
                'message' => 'Promo code already applied.'
            ]);
        }
    
        $promo = Promo::where('promocode', $code)
            ->whereDate('validity_from', '<=', $now)
            ->whereDate('validity_to', '>=', $now)
            ->where('status', 1)
            ->first();
    
        if (!$promo) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired promo code.'
            ]);
        }
    
        session()->put('promocode', $promo->promocode);
        

        $user_id = Auth::user()->id;
        $user = User::find($user_id); 
        $checkout =  $user->checkout()->with('items')->first(); 

        if ($checkout) {

            $bookingAmount = $checkout->booking_amount;
            $promo_discount =$promo->discount;
            $promocode_discount_amount = $bookingAmount * $promo_discount/100; 
            $vat = $checkout->vat;
            $finalAmount =$bookingAmount+(-$promocode_discount_amount)+$vat;

            $checkout->promocode = $promo->promocode;
            $checkout->discount_amount =  $promocode_discount_amount;
            $checkout->total_amount =  $finalAmount;
            $checkout->save();

            return response()->json([
                'success' => true,
                'message' => 'Promo code applied!',
                'promo_discount'=>$promo_discount,
                'promocode_discount_amount' => number_format($promocode_discount_amount, 2),
                'total' => number_format($finalAmount, 2)
            ]);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Promo code applied!'
        ]);
    }

    public function createpaymentintent(Request $request){
    dd($request->all());
    Stripe::setApiKey(env('STRIPE_SECRET'));
    
    $user = Auth::user(); // Assuming user is authenticated

    // Convert amount to fils (Stripe requires smallest currency unit)
    $amountInFils = round($request->total_amount * 100);

    // Create Stripe PaymentIntent
    $paymentIntent = PaymentIntent::create([
        'amount' => $amountInFils,
        'currency' => 'aed',
        'automatic_payment_methods' => ['enabled' => true],

        'description' => 'Booking Payment',
        'metadata' => [
            'user_id' => $user->id,
            'booking_amount' => $request->booking_amount,
            'vat' => $request->vat_amount,
        ],
    ]); dd($paymentIntent);

    if ($paymentIntent->status === 'requires_payment_method') {
        return response()->json([
            'success' => false,
            'requires_action' => true,
            'payment_intent_client_secret' => $paymentIntent->client_secret,
            'payment_intent_id' => $paymentIntent->id,
        ]);
    }
}

    public function checkoutBooking(Request $request){
      
        Stripe::setApiKey(env('STRIPE_SECRET'));

        DB::beginTransaction();
        try {
           
            $intent = PaymentIntent::create([
                'amount' => $request->amount, // Must be in smallest currency unit (like paise/fils)
                'currency' => 'aed',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => false,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'always',
                ],
            ]);

   
   

    if ($paymentIntent->status === 'succeeded') {
            // Save Payment Details
            $payment = DB::table('payments')->insertGetId([
                'order_id' => $request->order_id,
                'user_id' => $user->id,
                'booking_amount' => $request->booking_amount,
                'discount_amount' => $request->voucher_savings,
                'total_amount' => $request->total_amount,
                'payment_method' => 'stripe',
                //'payment_status' => 'completed',
                'stripe_transaction_id' => $paymentIntent->id,
                'payment_response' => json_encode($paymentIntent),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Create Booking Confirmation
            $bookingConfirmationId = DB::table('booking_confirmations')->insertGetId([
                'order_id' => $request->order_id,
                'booking_id' => uniqid('BOOK-'),
                'user_id' => $user->id,
                'booking_amount' => $request->booking_amount,
                'discount_amount' => $request->voucher_savings,
                'total_amount' => $request->total_amount,
                'booking_status' => 'confirmed',
                'booking_details' => json_encode($request->items),
                'vat' => $request->vat_amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Save Booking Items
            foreach ($request->items as $variantId => $item) {
                DB::table('booking_confirmation_items')->insert([
                    'booking_confirmation_id' => $bookingConfirmationId,
                    'product_varient_id' => $variantId,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price'],
                    'verification_number' => rand(100000, 999999),
                    'verification_status' => 'completed',
                    'giftproduct' => $item['giftproduct'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                // Add entry to PurchasedProduct table
                DB::table('purchased_products')->insert([
                    'booking_confirmation_id' => $bookingConfirmationId,
                    'product_variant_id' => $variantId,
                    'user_id' => $user->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price'],
                    'verification_number' => rand(100000, 999999),
                    'verification_status' => 'verified',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

     
    
           $order_id = $request->order_id;
            // Clear Cart
            Cart::where('user_id', $user->id)->delete();
            CheckoutItem::where('checkout_id', $order_id)->delete();
            Checkout::where('id', $order_id)->delete();

            $variants = [];
            $booking = BookingConfirmation::find($bookingConfirmationId);
            $order_date = $booking->created_at->format('Y-m-d');
            $order_number = $booking->booking_id;
            $grand_total = $booking->total_amount;
          


            $items = [];
            $importantinfo = null;
            $nbv_terms = null;
            foreach ($booking->items as $booking_item) { 
                $product_variant = ProductVariant::find($booking_item['product_varient_id']);
                 $items[] = [
                 'product_variant'=>$product_variant->title,
                    'quantity' => $booking_item['quantity'],
                    'unit_price' => $booking_item['unit_price'],
                    'total_price' => $booking_item['total_price'],
                ];
                if ($product_variant->product) {
                    $importantinfo = $product_variant->product->importantinfo ?? null;
                    $nbv_terms = $product_variant->product->nbvTerms->terms ?? null;
                }
            }
            foreach ($booking->items as $booking_item) { 
                $product_variant = ProductVariant::find($booking_item->product_varient_id);
                $variants[] = [
                    'product_variant_id'=>$booking_item->product_varient_id,
                    'voucher_number' => $booking->booking_id, 
                    'guest_name'   =>$user->first_name .' '. $user->last_name,
                    'email'=>$user->email,
                    'verification_number'=>$booking_item->verification_number,
                    'voucher_details'=> $product_variant->product->about_description,
                    'importantinfo'=>$product_variant->product->importantinfo,
                    'validity_from'=> $product_variant->product->validity_from,
                    'validity_to'=> $product_variant->product->validity_to,
                    'vendor'=> $product_variant->product->vendor->name,
                    'nbv_terms'=> $product_variant->product->nbvTerms->terms,
                ];
            }

            Mail::to($user->email)->send(new BookingConfirmationEmail($user->first_name,$order_date,$order_number,$grand_total,$importantinfo, $nbv_terms,$items,$variants));

            DB::commit();
    
            return redirect()->route('user.bookingconfirmation')
                ->with('success', 'Payment successful and booking confirmed!');
        }
        else {
            return back()->with('error', 'Payment not successful.');
        }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    } 

    
    
    
    
}
