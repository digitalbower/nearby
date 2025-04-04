<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavigationMenu;
use App\Models\Logo;
use App\Models\Category;

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

        $carouselCategories = Category::where('status', 1)
            ->where('enable_homecarousel', 1)
            ->get();
   
        return view('user.index', compact('uppermenuItems','lowermenuitem','logo','categories')); 
    }

    public function bookingconfirmation()
    {
        return view('user.bookingconfirmation'); 
    } 

    public function cart()
    {
        return view('user.cart'); 
    }
    
    public function checkout()
    {
        return view('user.checkout'); 
    }

    

    


    
}
