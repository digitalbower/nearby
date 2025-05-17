<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Mail; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Str;

class VendorForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('vendor.auth.resetpassword'); // Your reset email request form view
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([

            'email' => 'required|email|exists:users',

        ]);



        $token = Str::random(64);



        DB::table('password_reset_tokens')->insert([

            'email' => $request->email, 

            'token' => $token, 

            'created_at' => Carbon::now()

          ]);



        Mail::send('vendor.emails.resetpassword', ['token' => $token], function($message) use($request){

            $message->to($request->email);

            $message->subject('Reset Password');

        });



        return back()->with('message', 'We have e-mailed your password reset link!');

    
    }
}
