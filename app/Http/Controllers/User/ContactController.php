<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInformation;

class ContactController extends Controller
{
    public function contactus()
    {
        return view('user.contact');
    } 

    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        ContactInformation::create($request->only('name', 'email', 'message'));

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

}
