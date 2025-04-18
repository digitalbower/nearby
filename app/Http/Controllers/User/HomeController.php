<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavigationMenu;
use App\Models\Logo;
use App\Models\Category;
use App\Models\Product;
use App\Models\Footer;
use App\Models\Country;
use App\Models\BookingConfirmation;
use App\Models\BookingConfirmationItem;
use App\Models\Payment;
use App\Models\PurchasedProduct;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
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

        $categories = Category::where('status', 1)->get();

        $carouselCategories = Product::where('status', 1)
        ->where('categorycarousel', 1)
        ->with('category')
        ->get();

        $topDestinations = Footer::where('type', 'Top Destination')
                              ->where('status', 1)
                              ->get();
    

        $trendingProducts = Product::where('trending', 1)->latest()->take(10)->get();

        $informationLinks = Footer::where('type', 'Information')
                          ->where('status', 1)
                          ->get();

                          $followus = Footer::where('type', 'Follow Us')
                          ->where('status', 1)
                          ->get();

                          $payment_channels = Footer::where('type', 'payment_channels')
                          ->where('status', 1)
                          ->get();                

            $products = Product::where('status', 1)
            ->where('herocarousel', 1)
            ->get();    
           
            $countryCodes = Country::all(); 

        return view('user.index', compact('uppermenuItems','lowermenuitem','logo','categories','products','carouselCategories','trendingProducts','topDestinations','informationLinks','followus','payment_channels','countryCodes')); 
    }

    public function bookingconfirmation()
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

        $user = auth()->user();

        $bookingConfirmation = BookingConfirmation::where('user_id', auth()->id())
        ->latest()
        ->first();

        $payment = Payment::where('user_id', auth()->id())
        ->latest()
        ->first();

       
        $product_items = ProductVariant::with('product_purchase')->get(); 

        $userId = Auth::user()->id;

        $checkout = \App\Models\Checkout::where('user_id', $userId)->latest()->first();

        $checkoutData = null;

        if ($checkout) {
            $checkoutData = [
                'total' => $checkout->total_amount,
                'promo_code' => $checkout->promocode,
                'discount' => $checkout->discount_amount,
                'after_discount' => $checkout->total_amount - $checkout->discount_amount,
            ];
        }
   

        return view('user.bookingconfirmation',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','user','bookingConfirmation','payment','product_items','checkoutData')); 
    } 


    public function download($product_id)
    {
        // Retrieve the purchased product by ID
        $purchased_product = PurchasedProduct::with('product')
            ->where('id', $product_id)
            ->firstOrFail();

        // Check if the file exists (assuming the product has a downloadable file, e.g., voucher)
        $filePath = storage_path('app/public/vouchers/' . $purchased_product->product->voucher_filename);

        // If the file exists, return it as a download response
        if (file_exists($filePath)) {
            return response()->download($filePath, $purchased_product->product->voucher_filename);
        }

        // If file does not exist, return an error message
        return back()->with('error', 'File not found.');
    }
      
    

    

    


    
}
