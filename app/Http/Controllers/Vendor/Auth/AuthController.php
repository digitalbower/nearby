<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showVendorLogin(){
        return view('vendor.auth.login');
    }
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $vendor = \App\Models\Vendor::where('email', $credentials['email'])
        ->where('expired',1)
        ->where('status',1)
        ->first();

            // Check if vendor exists and password matches
            if ($vendor && Hash::check($credentials['password'], $vendor->password)) {
            Auth::guard('vendor')->login($vendor);
            return redirect()->intended('/vendor/booking');
            }

            return back()->withErrors(['email' => 'Invalid credentials or account not active/valid.']);
    }
    
    public function logout() {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login');
    }
}
