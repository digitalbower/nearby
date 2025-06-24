<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\BookingConfirmation;
use App\Models\BookingConfirmationItem;
use App\Exports\CommissionExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class CommissionController extends Controller
{
    public function commission(Request $request)
    { 
          $user = Auth::guard('admin')->user();

    // Determine role
    $roleId = $user->user_role_id;

    // Get sales person list based on role
    if (in_array($roleId, [1, 2])) {
        // Super Admin or Admin: show all sales users (role_id = 3)
        $salesPersons = Admin::where('user_role_id', 3)->get();
    } else {
        // Normal user: only self
        $salesPersons = Admin::where('id', $user->id)->get();
    }

    // Commission Query – no filters applied
    $items = BookingConfirmationItem::with(['variant.product.category'])
                ->where('verification_status', 'redeemed')
                ->get();
        // $items = BookingConfirmationItem::with(['variant.product.category'])->where('verification_status','redeemed')->get(); 
        return view('admin.commission.index', compact('items'));
        
    }
    public function exportCommission(){
        return Excel::download(new CommissionExport, 'commissions.xlsx');
    }
}
