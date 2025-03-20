<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('user.index'); 
    }


    public function product()
    {
        return view('user.product'); 
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
