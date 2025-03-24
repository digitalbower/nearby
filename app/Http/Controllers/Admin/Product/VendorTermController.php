<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorTerm;
use Illuminate\Http\Request;

class VendorTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendor_terms = VendorTerm::latest()->get();
        return view('admin.products.vendor_terms.index')->with(['vendor_terms'=>$vendor_terms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::where('status',1)->latest()->get();
        $products = Product::latest()->get();
        return view('admin.products.vendor_terms.create')->with(['vendors'=>$vendors,'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id|unique:vendor_terms,vendor_id',
            'product_id' => 'required|exists:products,id|unique:vendor_terms,product_id',
            'terms' => 'required|string',

        ]); 
        VendorTerm::create($request->all());
        return redirect()->route('admin.products.vendor_terms.index')->with('success', 'New Vendor Terms created successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VendorTerm $vendor_term)
    {
        $vendors = Vendor::where('status',1)->latest()->get();
        $products = Product::latest()->get();
        return view('admin.products.vendor_terms.edit')->with(['vendors'=>$vendors,'vendor_term'=>$vendor_term,'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VendorTerm $vendor_term)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id|unique:vendor_terms,vendor_id,'.$vendor_term->id,
            'product_id' => 'required|exists:products,id|unique:vendor_terms,product_id,'.$vendor_term->id,
            'terms' => 'required|string',

        ]);
        $vendor_term->update($request->all());
        return redirect()->route('admin.products.vendor_terms.index')->with('success', ' Vendor Terms updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorTerm $vendor_term)
    {
        $vendor_term->delete();
        
        return redirect()->route('admin.products.vendors.index')
                         ->with('success', 'Vendor deleted successfully.');
    }
}
