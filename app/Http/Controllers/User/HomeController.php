<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationEmail;
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
use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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

       
        $booking = BookingConfirmation::with('items.variant.product')->find($bookingConfirmation->id);  
        
        $promoCode = session('promocode');
        if($promoCode){
            $now = Carbon::now();
            $promo = Promo::where('promocode', $promoCode)
            ->whereDate('validity_from', '<=', $now)
            ->whereDate('validity_to', '>=', $now)
            ->where('status', 1)
            ->first();

            $promo_discount =$promo->discount;
        }

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
        'followus','payment_channels','user','bookingConfirmation','payment','booking','checkoutData')); 
    } 
     

    public function downloadPdfItem($itemId)
    {
        // Load the item with its product
        $item = BookingConfirmationItem::with('variant.product')
                 ->findOrFail($itemId);

        // Generate PDF from the Blade view
        $pdf = Pdf::loadView('user.generate_pdf', compact('item'));

        // Offer it as a download
        return $pdf->download('booking_item_'.$item->id.'.pdf');
    }


   


    
}
