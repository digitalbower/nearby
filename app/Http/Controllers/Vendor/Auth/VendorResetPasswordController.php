<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Str;

class VendorResetPasswordController extends Controller
{
    protected function broker()
    {
        return Password::broker('vendors');
    }

    protected function guard()
    {
        return Auth::guard('vendor');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('vendor.emails.resetpassword')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
       
        $request->validate([

            'email' => 'required|email|exists:users',

            'password' => 'required|string|min:6|confirmed',

            'password_confirmation' => 'required'

        ]);



        $updatePassword = DB::table('password_reset_tokens')

                            ->where([

                              'email' => $request->email, 

                              'token' => $request->token

                            ])

                            ->first();



        if(!$updatePassword){

            return back()->withInput()->with('error', 'Invalid token!');

        }



        $user = User::where('email', $request->email)

                    ->update(['password' => Hash::make($request->password)]);



        DB::table('password_resets')->where(['email'=> $request->email])->delete();



        return redirect('/login')->with('message', 'Your password has been changed!');

    }
    
}
