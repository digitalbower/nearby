<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsEmail;
use Illuminate\Http\Request;
use App\Models\ContactInformation;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\NavigationMenu;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactus()
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
        return view('user.contact',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels'));
    } 

    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        ContactInformation::create($request->only('name', 'email', 'message'));
        $email = $request->email;
        $name = $request->name;
        Mail::to($email)->send(new ContactUsEmail($name));

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

}
