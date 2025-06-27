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
use App\Models\MainSeo;
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
                    'check_in_date' => $order['check_in_date'],
                    'check_out_date' => $order['check_out_date'],
                    'dated_product' => $order['dated_product'] ?? 0,
                ]);
            
            }
            else{
                $item->quantity = $order['quantity'];
                $item->unit_price = $order['unit_price'];
                $item->total_price = $order['total_price'];
                $item->giftproduct = $order['giftproduct'] ?? 0;
                $item->check_in_date = $order['check_in_date'];
                $item->check_out_date = $order['check_out_date'];
                $item->dated_product = $order['dated_product'] ?? 0;
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
        
        $currentPath = request()->path(); 
        $seo = MainSeo::where('page_url', $currentPath)->first()
        ?? MainSeo::where('page_url', 'default')->first();  

        $products = Checkout::with('items.variant')->where('user_id',Auth::user()->id)->get(); 

        if (!$products || count($products) == 0) {
            return redirect()->route('user.products.index')->with('warning', 'Your checkout is empty.');
        }
        $product_array = [];

        $bookingAmount = 0;

        $originalTotal = 0;

        
        $promoCode = session('promocode');

        foreach ($products as $checkout) { 
            $user_first_name = $checkout->user->first_name;
            $user_email= $checkout->user->email;
            $max_quantity_in_checkout = $checkout->items->max('quantity'); 
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

    
        return view('user.checkout',compact('seo','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','count','bookingAmount','voucherSavings','vat','total','promo_discount',
        'promocode_discount_amount','discountedPrice','order_id','isPromoApplied','promoCode','max_quantity_in_checkout','user_first_name','user_email')); 
    }
    public function getCheckoutItems(){
        
        $products = Checkout::with('items.variant')->where('user_id',Auth::user()->id)->get();
        
        $product_array = [];

        foreach ($products as $checkout) { 
          
            foreach ($checkout->items as $item) {

                $variant = $item->variant; 

                $originalPrice =  $variant['unit_price'];

                $discountedPrice = $variant['discounted_price'] * $item->quantity;

                $imagePath = $variant['product']['image'] ?? null;

                $product_array[] = [
                    'id' => $variant['id'],
                    'checkout_id' => $checkout->id,
                    'product_name'=>$variant['product']['name'],
                    'title' => $variant['title'],
                    'short_description' => $variant['product']['short_description'],
                    'product_type'=>$variant['product']->types->product_type,
                    'discounted_price' => number_format($discountedPrice, 2),
                    'original_price' => number_format($originalPrice, 2),
                    'timer_flag' => $variant['timer_flag'],
                    'end_time' => \Carbon\Carbon::parse($variant['end_time'])->toIso8601String(),
                    'image' => $imagePath ? asset('storage/' . $imagePath) : 'https://via.placeholder.com/100',
                    'quantity' => $item->quantity,
                    'giftproduct'=>$item->giftproduct,
                    'check_in_date' => $item->check_in_date,
                    'check_out_date' =>$item->check_out_date,
                    'dated_product' => $item->dated_product,
                    'holiday_length'=>$variant['holiday_length']
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
}
