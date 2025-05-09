<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialistRequest;


class SpecialistRequestController extends Controller
{
    
    public function submit(Request $request)
    { 
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'countryCode'  => 'required|string|max:10',
            'phone'        => 'required|string|max:20',
            'message'      => 'required|string',
        ]);

        SpecialistRequest::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'country_code' => $request->countryCode,
            'phone'        => $request->phone,
            'message'      => $request->message,
        ]);

        return redirect()->back()->with([
            'modal_success' => "Thank You for Reaching Out! We've received your inquiry and our travel team will get back to you shortly during our business hours.",
            'modal_open' => true
        ]);
    }
}
