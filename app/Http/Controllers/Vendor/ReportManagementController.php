<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\BookingConfirmationItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportManagementController extends Controller
{
    public function index(){
        $booking_items = BookingConfirmationItem::with('variant.product')
        ->where('verification_status','redeemed')
        ->whereHas('variant.product', function ($query) {
            $query->where('vendor_id', Auth::guard('vendor')->id());
        })
        ->latest()->paginate(10);
        return view('vendor.report.index',compact('booking_items'));
    }
    public function reportDownload($id)
    {
        $name = Auth::guard('vendor')->user()->name; 
        $booking = BookingConfirmationItem::with('variant.product')->findOrFail($id);

        $pdf = Pdf::loadView('vendor.report.pdf.booking', compact('booking','name'));
        return $pdf->download('booking_'.$booking->product_varient_id.'_'.$booking->bookingConfirmation->booking_id.'.pdf');
    }
}
