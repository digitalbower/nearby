<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\BookingConfirmation;
use App\Models\BookingConfirmationItem;

class CommissionController extends Controller
{
    public function commission()
    { 
        $items = BookingConfirmationItem::with(['variant.product.category'])->where('verification_status','redeemed')->get(); 
        return view('admin.commission.index', compact('items'));
        
    }
}
