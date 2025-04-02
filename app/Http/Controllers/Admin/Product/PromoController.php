<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::latest()->get();
        return view('admin.products.promos.index')->with(['promos'=>$promos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.promos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'promocode' => 'required',
            'discount' => 'required',
            'validity_from' => 'required',
            'validity_to' => 'required',
        ]);
        Promo::create($request->all());
        return redirect()->route('admin.products.promos.index')->with('success', 'New Promo code created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promo)
    {
        return view('admin.products.promos.edit')->with(['promo'=>$promo]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'promocode' => 'required',
            'discount' => 'required',
            'validity_from' => 'required',
            'validity_to' => 'required',
        ]);
        $promo->update($request->all());
        return redirect()->route('admin.products.promos.index')->with('success', ' Promo code updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('admin.products.promos.index')
        ->with('success', 'Promo code deleted successfully.');
    }
    public function changePromoStatus(Request $request)
    { 
        $promo = Promo::findOrFail($request->id);
        $promo->status = $request->status;
        $promo->save();

        return response()->json(['message' => 'Promo code status updated successfully!']);
    }
}
