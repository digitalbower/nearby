<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Models\Logo; 
use App\Models\Footer;
use App\Models\Gender;
use App\Models\Review;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\MainSeo;
use App\Models\NbvTerm;
use App\Models\VendorTerm;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\NavigationMenu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\BookingConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BookingConfirmationItem;
use Illuminate\Validation\Rules\Password;
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
        $currentPath = request()->path(); 
        $seo = MainSeo::where('page_url', $currentPath)->first()
        ?? MainSeo::where('page_url', 'default')->first();     
        $user = Auth::user(); // Get the authenticated user
        $countries = Country::all(); 
        $gender = Gender::all();

        $userId = Auth::id(); 

        // Get items only for the logged-in user, joining to booking_confirmations table to verify user_id
        $bookingConfirmations = DB::table('booking_confirmation_items as bci')
            ->join('booking_confirmations as bc', 'bci.booking_confirmation_id', '=', 'bc.id')
            ->where('bc.user_id', $userId)
            ->select(
                'bci.*',
                'bc.booking_id',
                'bc.created_at as booking_created_at',
                'bc.total_amount'
            )
            ->orderByDesc('bci.created_at')
            ->get();

        $reviews = Review::with('product')->where('user_id', Auth::user()->id)->get();  

        return view('user.profile', compact('seo','user','countries','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','bookingConfirmations','reviews')); // Pass user data to the view
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
            'country_code_id' => $request->input('country_id'), 
            'address' => $request->input('address'),
            'country_residence'=> $request->input('country_of_residence_id'),
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

    
    public function download($id)
    { 
       $userId = Auth::user();

        $item = BookingConfirmationItem::with('variant.product')->findOrFail($id); 
        $booking = bookingConfirmation::findOrFail($item->booking_confirmation_id);

        $product = $item->variant->product;
        $guests = $booking->guests;

        $nbvTerms = NbvTerm::find($product->nbv_terms_id);
        $vendorTerms = VendorTerm::find($product->vendor_terms_id);
        $vendor = Vendor::find($product->vendor_id); 
        $productType = ProductType::find($product->product_type_id); 
        $order_date = $booking->created_at->copy();  
        $pdf = Pdf::loadView('user.generate_pdf', [
            'item' => $item,
            'nbvTerms' => $nbvTerms,
            'vendorTerms' => $vendorTerms,
            'vendor' => $vendor,
            'productType' => $productType,
            'order_date'=> $order_date->format('Y-m-d'),
            'validUntil' => $item->validity,
            'userId'    =>  $userId,
            'guests' => $guests
        ]);

        return $pdf->download('Booking-'.$item->booking_id.'.pdf');
    }
    public function updateReview(Request $request,$id){

       $request->validate([
            'review_title' => 'required|string|max:255',
            'review_rating' => 'required|integer|between:1,5',
            'review_description' => 'required|string',
        ]);
        $data= $request->all();
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('user.profile.index')->with('success', 'Review updated successfully!');
    
    }
    public function deleteReview($id){
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('user.profile.index')->with('success', 'Review deleted successfully!');

    }

}
