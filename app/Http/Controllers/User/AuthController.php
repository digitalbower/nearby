<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Country;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\MainSeo;
use App\Models\NavigationMenu;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
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
        $currentPath = request()->path(); 
        $seo = MainSeo::where('page_url', $currentPath)->first()
        ?? MainSeo::where('page_url', 'default')->first();     
        return view('user.signin', compact('seo','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels'));
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
            $redirectUrl = $request->input('redirect', route('home.index'));
            return redirect()->to($redirectUrl);
        }

        // If authentication fails, return back with error
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect()->route('user.login')->with('success', 'You have logged out.');
}

    // Dashboard page (protected)
    public function dashboard()
    {
        return view('dashboard');
    }

    public function signup()
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
        $currentPath = request()->path(); 
        $seo = MainSeo::where('page_url', $currentPath)->first()
        ?? MainSeo::where('page_url', 'default')->first();  
        $countries = Country::all(); 
        return view('user.signup', compact('seo','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','countries'));  
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
            'cor_id '    => $request->cor_id ,
            'password'   => Hash::make($request->password),
        ]);

        $email = $request->email;
        $name = $request->first_name;
        Mail::to($email)->send(new RegistrationEmail($name));
        // Redirect to login page with success message
        return redirect()->route('user.login')->with('success','User registered successfully! You can now log in.');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
    
            if (!$googleUser) {
                return redirect()->route('user.login')->with('error', 'Failed to get user details from Google.');
            }
    
            $email = $googleUser->getEmail();
            $existingUser = User::where('email', $email)->first();
    
            if ($existingUser) {
                if ($existingUser->google_id === null) {
                    return redirect()->route('user.login')->with('error', 'This email is already registered via email/password. Please login using your password.');
                }
    
                Auth::login($existingUser);
                return redirect()->route('user.dashboard')->with('success', 'Logged in successfully via Google!');
            }
    
            // If user doesn't exist, create new one and send confirmation email
            $nameParts = explode(' ', $googleUser->getName(), 2);
            $firstName = $nameParts[0];
            $lastName = $nameParts[1] ?? '';
    
            $newUser = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(Str::random(16)),
            ]);
    
            // Send registration confirmation email
            Mail::to($email)->send(new RegistrationEmail($firstName));
    
            Auth::login($newUser);
            return redirect()->route('user.dashboard')->with('success', 'Welcome! Your account has been created via Google.');
    
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('user.login')->with('error', 'Google Sign-In failed. Please try again.');
        }
    }
}
