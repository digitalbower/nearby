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
        $today = Carbon::today();

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

        $carouselCategories = Product::with(['vendor', 'variants', 'reviews', 'category'])
        ->whereHas('vendor', function ($q) use ($today) {
            $q->where('status', 1)
            ->whereDate('validityfrom', '<=', $today)
            ->whereDate('validityto', '>=', $today);
        })
        ->whereDate('validity_from', '<=', $today)
        ->whereDate('validity_to', '>=', $today)
        ->where('categorycarousel', 1)
        ->where('status', 1)
        ->get()
        ->map(function ($product) use ($today) {
            $validVariants = ($product->variants ?? collect([]))->filter(function ($variant) use ($today) {
                return $variant->status == 1 &&
                        Carbon::parse($variant->validity_from)->lte($today) &&
                        Carbon::parse($variant->validity_to)->gte($today);
            });
    
            $product->filtered_variants = $validVariants;
            return $validVariants->isNotEmpty() ? $product : null;
        })
        ->filter()
        ->filter(fn($product) => $product->category && $product->category->name)
        ->groupBy(fn($product) => $product->category->name);  
    
        $topDestinations = Footer::where('type', 'Top Destination')
                              ->where('status', 1)
                              ->get();
        $trendingProducts = Product::with(['vendor', 'variants', 'reviews'])
        ->whereHas('vendor', function ($q) use ($today) {
            $q->where('status', 1)
            ->whereDate('validityfrom', '<=', $today)
            ->whereDate('validityto', '>=', $today);
        })
        ->whereDate('validity_from', '<=', $today)
        ->whereDate('validity_to', '>=', $today)
        ->where('trending', 1)
        ->where('status', 1)
        ->latest()->take(10)
        ->get()
        ->map(function ($product) use ($today) {
            // Filter variants that are active and valid
            $validVariants = ($product->variants ?? collect([]))->filter(function ($variant) use ($today) {
                return $variant->status == 1 &&
                        Carbon::parse($variant->validity_from)->lte($today) &&
                        Carbon::parse($variant->validity_to)->gte($today);
            });
    
            $product->filtered_variants = $validVariants;
            return $validVariants->isNotEmpty() ? $product : null;
        })
        ->filter();
    
        $informationLinks = Footer::where('type', 'Information')
                          ->where('status', 1)
                          ->get();

                          $followus = Footer::where('type', 'Follow Us')
                          ->where('status', 1)
                          ->get();

                          $payment_channels = Footer::where('type', 'payment_channels')
                          ->where('status', 1)
                          ->get();                

                          $products = Product::with(['vendor', 'variants', 'reviews'])
                          ->whereHas('vendor', function ($q) use ($today) {
                              $q->where('status', 1)
                                ->whereDate('validityfrom', '<=', $today)
                                ->whereDate('validityto', '>=', $today);
                          })
                          ->whereHas('variants', function ($q) use ($today) {
                              $q->where('status', 1)
                                ->whereDate('validity_from', '<=', $today)
                                ->whereDate('validity_to', '>=', $today);
                          })
                          ->whereDate('validity_from', '<=', $today)
                          ->whereDate('validity_to', '>=', $today)
                          ->where('herocarousel', 1)
                          ->where('status', 1)
                          ->get()
                          ->map(function ($product) use ($today) {
                              $variants = ($product->variants ?? collect([]))->filter(function ($variant) use ($today) {
                                  return Carbon::parse($variant->validity_from)->lte($today) &&
                                         Carbon::parse($variant->validity_to)->gte($today);
                              });
                      
                              $product->filtered_variants = $variants;
                      
                              $reviews = $product->reviews;
                              $totalRatings = $reviews->sum('review_rating');
                              $product->total_review = $reviews->count();
                              $averageRating = $product->total_review > 0 ? $totalRatings / $product->total_review : 0;
                              $product->average_rating = number_format($averageRating, 1);
                      
                              $minVariant = $variants->sortBy('unit_price')->first();
                      
                              if ($minVariant) {
                                  $product->min_discounted_price = $minVariant->discounted_price;
                                  $product->min_original_price = $minVariant->unit_price;
                                  $product->min_discounted_percentage = number_format($minVariant->discounted_percentage);
                              } else {
                                  $product->min_discounted_price = null;
                                  $product->min_original_price = null;
                                  $product->min_discounted_percentage = null;
                              }
                      
                              return $product;
                          });
                          
           
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

        $user = Auth::user();

        $bookingConfirmation = BookingConfirmation::where('user_id', $user->id)
        ->latest()
        ->first();

        $payment = Payment::where('user_id', $user->id)
        ->latest()
        ->first();

       
        $booking = BookingConfirmation::with('items.variant.product')->find($bookingConfirmation->id);  
        
        $promoCode = session('promocode');
        $promo_discount = null;
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
