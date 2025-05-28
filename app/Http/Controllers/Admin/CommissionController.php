<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\BookingConfirmation;


class CommissionController extends Controller
{
    public function commission()
    { 

        // $bookingConfirmations = BookingConfirmation::where('booking_status', 'confirmed')->get();

        // // Map booking data to attach related variant and product info
        // $bookingConfirmations->map(function ($booking) {
        //     // booking_details is cast to array in model, so no need to decode
        //     $details = $booking->booking_details;
    
        //     // If single variant item exists
        //     if (isset($details['product_variant_id'])) {
        //         $variant = ProductVariant::with('product.category')->find($details['product_variant_id']);
        //         $booking->variant = $variant;
        //         $booking->qty = $details['qty'] ?? 1;
        //     }
    
        //     return $booking;
        // });

        $productVariants = ProductVariant::with(['product.category'])->get(); 
        return view('admin.commission.index', compact('productVariants'));
        
    }
}
