<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavigationMenu;

class HomeController extends Controller
{

    public function index()
    {

        $menuItems = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'upper')
        ->get();
   
        return view('user.index', compact('menuItems')); 
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
