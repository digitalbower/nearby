<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);
    
        NewsletterSubscriber::create(['email' => $request->email]);
    
        return redirect()->back()->with('success', 'Thank You for Subscribing!You’re now on the list to receive our latest deals, exclusive offers, and travel inspiration—straight to your inbox. Stay tuned!');
    }
}
