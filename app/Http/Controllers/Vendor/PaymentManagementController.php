<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\BookingConfirmation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentManagementController extends Controller
{
    public function index(){
        $bookings = BookingConfirmation::with('payment')
        ->whereHas('items.variant.product', function ($query) {
            $query->where('vendor_id', Auth::guard('vendor')->id());
        })
        ->latest()->paginate(10);
        return view('vendor.payment.index',compact('bookings'));
    }

}
