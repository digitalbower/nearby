<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
            $item = CheckoutItem::where('product_variant_id',$order['product_variant_id'])->first(); 
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
       
        $product_array = [];

        $bookingAmount = 0;

        $originalTotal = 0;

        

        foreach ($products as $checkout) { 
            $count = count($checkout->items);
            foreach ($checkout->items as $item) {
                $variant = $item->variant; 
               
                $discountedPrice = $variant['discounted_price'] * $item->quantity;

                $unitPrice = $variant['unit_price'] * $item->quantity;

                $bookingAmount += $discountedPrice;

                $originalTotal += $unitPrice;
            }
        } 
        $voucherSavings = $originalTotal - $bookingAmount; 

        $vat = round($bookingAmount * 0.05, 2);
        
        $total = $bookingAmount + $vat;

        return view('user.checkout',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','count','bookingAmount','voucherSavings','vat','total')); 
    }
    public function getCheckoutItems(){
        
        $products = Checkout::with('items.variant')->where('user_id',Auth::user()->id)->get();
        
        $product_array = [];

        $bookingAmount = 0;

        $originalTotal = 0;


        foreach ($products as $checkout) { 
          
            foreach ($checkout->items as $item) {

                $variant = $item->variant; 

                $discountedPrice = $variant['discounted_price'] * $item->quantity;

                $unitPrice = $variant['unit_price'] * $item->quantity;

                $bookingAmount += $discountedPrice;

                $originalTotal += $unitPrice;
                

                $voucherSavings = $originalTotal - $bookingAmount; 

                $imagePath = $variant['product']['image'] ?? null;

                $product_array[] = [
                    'id' => $variant['id'],
                    'checkout_id' => $checkout->id,
                    'title' => $variant['title'],
                    'short_description' => $variant['short_description'],
                    'discounted_price' => number_format($discountedPrice, 2),
                    'unit_price' => number_format($unitPrice, 2),
                    'timer_flag' => $variant['timer_flag'],
                    'end_time' => $variant['end_time'],
                    'image' => $imagePath ? asset('storage/' . $imagePath) : 'https://via.placeholder.com/100',
                    'quantity' => $item->quantity,
                    'total_discount'=>number_format($voucherSavings, 2),
                    'total_unit_price'=>number_format($originalTotal, 2),
                    'total_discounted_price'=>number_format($bookingAmount, 2),
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
                $total_discounted_price = 0;
                $total_unit_price = 0;
    
                foreach ($checkout->items as $cartItem) { 
                    $total_discounted_price += $cartItem->variant->discounted_price * $cartItem->quantity;
                    $total_unit_price += $cartItem->variant->unit_price * $cartItem->quantity;
                }
               
                $total_discount = $total_unit_price - $total_discounted_price;
                $checkout->booking_amount = $total_unit_price;
                $checkout->discount_amount = $total_discounted_price;
                $checkout->total_amount = $total_discount;
                $checkout->save();
                return response()->json([
                    'success' => true,
                    'discountedPrice' => $discountedPrice,
                    'unitPrice' => $unitPrice,
                    'total_discounted_price' => $total_discounted_price,
                    'total_unit_price' => $total_unit_price,
                    'total_discount' => $total_discount,
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
        $checkout_id = $request->input('checkout_id');

        $user_id = Auth::user()->id;
        $user = User::find($user_id); 
        $checkout =  $user->user()->checkout()->with('items')->first();

        if ($checkout) {
            $item = $checkout->items->where('checkout_id', $checkout_id)->first();

            if ($item) {
                $item->delete(); 

                $checkout->load('items.variant');

                $total_discounted_price = 0;
                $total_unit_price = 0;

                foreach ($checkout->items as $cartItem) {
                    $total_discounted_price += $cartItem->variant->discounted_price * $cartItem->quantity;
                    $total_unit_price += $cartItem->variant->unit_price * $cartItem->quantity;
                }
    
                $total_discount = $total_unit_price - $total_discounted_price;
                return response()->json(['success' => true,
                    'total_discounted_price' => $total_discounted_price,
                    'total_unit_price' => $total_unit_price,
                    'total_discount' => $total_discount
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
    
        $coupon = Promo::where('promocode', $code)
            ->where('is_active', 1)
            ->whereDate('validity_from', '<=', $now)
            ->whereDate('validity_to', '>=', $now)
            ->where('status',1)
            ->first();
    
        if (!$coupon) {
            return back()->with('error', 'Invalid or expired promo code.');
        }
    
        // Store the coupon ID in session for later use
        session()->put('applied_coupon_id', $coupon->id);
    
        return back()->with('success', 'Promo code applied!');
    }
    public function checkoutBooking(Request $request){
        dd($request->all());
    }
    
}
