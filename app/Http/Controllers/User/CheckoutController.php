<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\NavigationMenu;
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
        $checkoutOrder = Checkout::create($data);
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
        return view('user.checkout',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels')); 
    }


}
