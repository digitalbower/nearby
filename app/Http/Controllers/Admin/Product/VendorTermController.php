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
        $vendor_terms = VendorTerm::latest()
        ->whereHas('vendor', function ($query) {
            $query->where('status', 1) // Only vendors with status = 1
                  ->whereNull('deleted_at'); // Exclude soft-deleted vendors
        })
        ->get();        
        return view('admin.products.vendor_terms.index')->with(['vendor_terms'=>$vendor_terms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::where('status',1)->latest()->get();
        return view('admin.products.vendor_terms.create')->with(['vendors'=>$vendors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id'=> 'required',
            'name'=> 'required|string',
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
        return view('admin.products.vendor_terms.edit')->with(['vendors'=>$vendors,'vendor_term'=>$vendor_term]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VendorTerm $vendor_term)
    {
        $request->validate([
            'vendor_id'=> 'required',
            'name'=> 'required|string',
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
        
        return redirect()->route('admin.products.vendor_terms.index')
                         ->with('success', 'Vendor deleted successfully.');
    }
    public function changeVendorTermStatus(Request $request)
    { 
        $vendor_term = VendorTerm::findOrFail($request->id);
        $vendor_term->status = $request->status;
        $vendor_term->save();

        return response()->json(['message' => 'Vendor Term status updated successfully!']);
    }
}
