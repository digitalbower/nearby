<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = ProductType::latest()->get();
        return view('admin.products.product_types.index')->with(['types'=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.product_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_type' => 'required',
            'validity' => 'required|integer',
        ]);
        ProductType::create($request->all());
        return redirect()->route('admin.products.product_types.index')->with('success', 'New Product type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $product_type)
    {
        return view('admin.products.product_types.edit')->with(['product_type'=>$product_type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $product_type)
    {
        $request->validate([
            'product_type' => 'required',
            'validity' => 'required|integer',
        ]);
        $product_type->update($request->all());
        return redirect()->route('admin.products.product_types.index')->with('success', 'Product type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $product_type)
    {
        $product_type->delete();
        
        return redirect()->route('admin.products.product_types.index')
                         ->with('success', 'Product type deleted successfully.');
    }
    public function changeTypeStatus(Request $request)
    { 
        $type = ProductType::findOrFail($request->id);
        $type->status = $request->status;
        $type->save();

        return response()->json(['message' => 'Product type status updated successfully!']);
    }
    
}
