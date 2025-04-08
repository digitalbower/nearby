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
        return view('user.bookingconfirmation'); 
    } 

    public function cart()
    {dd(12);
        return view('user.cart'); 
    }
    
    public function checkout()
    {
        return view('user.checkout'); 
    }

    

    


    
}
