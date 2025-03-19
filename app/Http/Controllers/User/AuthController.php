<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.signin'); 
    }

    public function loginsubmit(Request $request)
    {
        // Validate input fields
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]); 

        // Attempt to authenticate user
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home.index')->with('success', 'Login successful!');
        }

        // If authentication fails, return back with error
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect()->route('login')->with('success', 'You have logged out.');
}

    // Dashboard page (protected)
    public function dashboard()
    {
        return view('dashboard');
    }

    public function signup()
    {
        return view('user.signup'); 
    }

    public function register(Request $request)
    { 
        // Validate form inputs
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'required|string|max:20',
            'country'    => 'required|string|max:100',
            'password'   => 'required|string|min:6|confirmed',
        ]); 

        // Create user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'country'    => $request->country,
            'password'   => Hash::make($request->password),
        ]);

        Session::flash('success', 'User registered successfully! You can now log in.');

        // Redirect to login page with success message
        return redirect()->route('login');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        try {
            // Get user data from Google
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            if (!$googleUser) {
                return redirect()->route('login')->with('error', 'Failed to get user details from Google.');
            }
    
            \Log::info('Google User:', (array) $googleUser);
    
            // Check if user exists
            $user = User::where('email', $googleUser->getEmail())->first();
    
            // If user does not exist, create a new one
            if (!$user) {
                $user = User::create([
                    'first_name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('google-auth') // Dummy password
                ]);
            }
    
            // Log in the user
            Auth::login($user);
    
            return redirect()->route('login')->with('success', 'Logged in successfully!');
    
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Google Sign-In failed: ' . $e->getMessage());
        }
    }
}
