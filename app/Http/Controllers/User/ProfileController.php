<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Gender;
use App\Models\Country;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\NavigationMenu;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function profile()
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
        $user = Auth::user(); // Get the authenticated user
        $countries = Country::all(); 
        $gender = Gender::all();

        return view('user.profile', compact('user','countries','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels')); // Pass user data to the view
    }

    /**
     * Update the profile information.
     */
    public function update(Request $request)
    { 
        $user = Auth::user(); // Get the authenticated user

        // ✅ Validate incoming data
      

        // ✅ Update user details
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('birthday'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'address' => $request->input('address'),
        ]);

        // ✅ Handle Profile Picture Upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        return redirect()->route('user.profile.index')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current-password' => ['required'],
            'new-password' => ['required', 'min:8', 'confirmed'],
        ]);
    
        $user = Auth::user();
    
        // Check if the current password matches
        if (!Hash::check($request->input('current-password'), $user->password)) {
            throw ValidationException::withMessages([
                'current-password' => 'The current password is incorrect.',
            ]);
        }
    
        // Update the password
        $user->password = Hash::make($request->input('new-password'));
        $user->save();
    
        return redirect()->route('user.profile.index')->with('success', 'Password successfully updated.');
    }

}
