<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\BookingConfirmationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingManagementController extends Controller
{
    public function index(){
          $booking_items = BookingConfirmationItem::with(['variant.product','bookingConfirmation.user'])
        ->where('verification_status','pending')
        ->whereHas('variant.product', function ($query) {
            $query->where('vendor_id', Auth::guard('vendor')->id());
        })
        ->latest()->paginate(10);
        return view('vendor.booking.index',compact('booking_items'));
    }
    public function approveBooking(Request $request){
        $request->validate([
            'verification_number' => 'required|string'
        ]);
      
        $booking_item = BookingConfirmationItem::find($request->booking_confirmation_item_id); 
        if($booking_item->verification_number == $request->verification_number){
            $booking_item->verification_status = "redeem";
            $booking_item->save();
            return redirect()->back()
            ->with('success', 'Booking approved successfully!');
        }
       else{
        return redirect()->back()
        ->with('error', 'OTP does not match!');
       }
    }
    public function bookingHistory(){
        $booking_items = BookingConfirmationItem::with(['variant.product','bookingConfirmation.user'])
        ->whereIn('verification_status',['redeem','expired'])
        ->whereHas('variant.product', function ($query) {
            $query->where('vendor_id', Auth::guard('vendor')->id());
        })
        ->latest()->paginate(10);
        return view('vendor.booking.history',compact('booking_items'));
    }
}
