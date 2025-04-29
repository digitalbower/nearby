<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductVariant;


class CommissionController extends Controller
{
    public function commission()
    { 

        $productVariants = ProductVariant::with(['product.category'])->get();
      
        return view('admin.commission.index', compact('productVariants'));
        
    }
}
