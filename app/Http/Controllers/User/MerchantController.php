<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\Merchant;
use App\Models\NavigationMenu;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function merchant(){
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
        $categories = Category::where('status',1)->get();
        return view('user.merchant',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','categories'));
    }
    public function storeMerchant(Request $request){

        $request->validate([
            'business_name' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'category_id' => 'required|exists:categories,id',
        ]);
        Merchant::create($request->all());
        return redirect()->route('user.merchant')->with('success', 'Data created successfully!');
    }
}
