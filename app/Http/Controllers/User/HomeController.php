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
use Illuminate\Support\Facades\Mail;

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
        return view('user.bookingconfirmation',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels')); 
    } 

    public function bookingconfirmationEmail(){
        $name = 'John Doe';
        $variants = [
            ['name' => 'Couple Package', 'id' => 1],
            ['name' => 'Family Package', 'id' => 2],
        ];
        Mail::to('anjalykjoy@gmail.com')->send(new BookingConfirmationEmail($name, $variants));
    }

    
}
