<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::where('expired',1)->where('status',1)->get(); 
        return view('admin.vendors.index')->with(['vendors' => $vendors]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendors = Vendor::where('expired',1)->where('status',1)->get();
        $vendor = Vendor::find($id);
        return view('admin.vendors.edit')->with(['vendors' => $vendors,'vendor'=>$vendor,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'vendor_id' => 'required',
        ]);

        $vendor = Vendor::find($id);
        $vendor->password = Hash ::make($request->password);
        $vendor->save();

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor credentials updated successfully!');
    }
}
