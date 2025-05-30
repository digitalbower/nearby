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
use Illuminate\Support\Str;

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
            return redirect()->to($redirectUrl)->with('success', 'Logged in successfully!');
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
        $countries = \App\Models\Country::orderBy('name')->get();
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
            'password'   => 'required','string','min:8','confirmed','regex:/[A-Z]/','regex:/[a-z]/','regex:/[0-9]/','regex:/[!@#$%^&*(),.?":{}|<>]/',  
            'terms' => 'accepted',
          
 [
    'password.regex' => 'Password must contain uppercase, lowercase, number, and special character.',
    'terms.accepted' => 'You must accept the Terms and Conditions.',
   
   
    ],
        ]); 

        // Create user
        $country = Country::find($request->country_id);
        $residenceCountry = Country::find($request->country_of_residence_id);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'country'    => $country,
            'country_code_id '    => $request->country_code_id ,
            'country_residence' =>$residenceCountry,
            'password'   => Hash::make($request->password),
        ]);

        $email = $request->email;
        $name = $request->first_name;
        Mail::to($email)->send(new RegistrationEmail($name));
        // Redirect to login page with success message
        return redirect()->route('user.login')->with('success','User registered successfully! You can now log in.');
    }


    public function redirectToGoogle(Request $request)
    {
        $mode = $request->query('mode', 'signin'); // default is signin
        if ($request->has('state')) {
        session(['google_oauth_state' => $request->query('state')]);
        }  
        session(['google_mode' => $mode]);
        return Socialite::driver('google')->stateless()->redirect();
    }
    
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $mode = session('google_mode', 'signin'); // get stored mode
            $email = $googleUser->getEmail();
            $existingUser = User::where('email', $email)->first();

            
    
            if ($mode === 'signup') {
                // Block if already registered
                if ($existingUser) {
                    return redirect()->route('user.login')
                        ->with('error', 'This email is already registered. Please sign in instead.');
                }
    
                // Create new user
                $nameParts = explode(' ', $googleUser->getName(), 2); 
                $firstName = $nameParts[0];
                $lastName = $nameParts[1] ?? '';
    
                $newUser = User::create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'google_id' => $googleUser->getId(), 
                    'password' => bcrypt(Str::random(16)), // Dummy password
                ]); 
    
                Mail::to($email)->send(new RegistrationEmail($firstName));
                Auth::login($newUser);
    
                return redirect()->route('user.dashboard')->with('success', 'Signed up via Google!');
            }
    
            if ($mode === 'signin') {
                $redirectUrl = session('google_oauth_state', '/'); 
                $redirectUrl = urldecode($redirectUrl); 
                if (!$existingUser) {
                    return redirect()->route('user.login')
                        ->with('error', 'No account found. Please sign up using Google first.');
                }
    
                if ($existingUser->google_id === null) {
                    return redirect()->route('user.login')
                        ->with('error', 'This email is registered using a password. Please login with email/password.');
                }
    
                Auth::login($existingUser);
                return redirect()->to($redirectUrl)->with('success', 'Logged in successfully via Google!');
            }
    
            return redirect()->route('user.login')->with('error', 'Invalid action.');
    
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('user.login')->with('error', 'Google Sign-In failed. Please try again.');
        }
    }
   
}
