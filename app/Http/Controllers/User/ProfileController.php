<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Get logged-in user
        return view('user.profile', compact('user'));
    }


    // Update profile information
    public function update(Request $request)
    { 
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
        ]);

        $user = Auth::user(); 
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    // Change user password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('user.profile')->with('success', 'Password changed successfully.');
    }

    // Upload profile picture
    public function uploadPicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $user->update(['profile_picture' => $path]);

        return redirect()->route('user.profile')->with('success', 'Profile picture updated successfully.');
    }
}
