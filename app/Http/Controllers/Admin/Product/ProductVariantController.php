<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variants = ProductVariant::with('product')->get();
        return view('admin.products.product_variants.index')->with(['variants'=>$variants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::with('vendor')
        ->whereHas('vendor', function ($query) {
            $query->where('status', 1);
        })
        ->get();
        return view('admin.products.product_variants.create')->with(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id|unique:product_variants,product_id',
            'title' => 'required',
            'short_description' => 'required',
            'unit_price' => 'required',
            'unit_type' => 'required',
            'discounted_price' => 'required',
            'available_quantity' => 'required',
            'validity_from' => 'required',
            'validity_to' => 'required',
            'timer_flag'=> 'required',


        ]);
        ProductVariant::create($request->all());
        return redirect()->route('admin.products.product_variants.index')->with('success', 'New Product Variant created successfully!');
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
    public function edit(ProductVariant $product_variant)
    {
        $products = Product::with('vendor')
        ->whereHas('vendor', function ($query) {
            $query->where('status', 1);
        })
        ->get();
        return view('admin.products.product_variants.edit')->with(['products'=>$products,'product_variant'=>$product_variant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVariant $product_variant)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id|unique:product_variants,product_id,'.$product_variant->id,
            'title' => 'required',
            'short_description' => 'required',
            'unit_price' => 'required',
            'unit_type' => 'required',
            'discounted_price' => 'required',
            'available_quantity' => 'required',
            'validity_from' => 'required',
            'validity_to' => 'required',
            'timer_flag'=> 'required',


        ]);
        $product_variant->update($request->all());
        return redirect()->route('admin.products.product_variants.index')->with('success', 'Product Variant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariant $product_variant)
    {
        $product_variant->delete();
        return redirect()->route('admin.products.product_variants.index')
        ->with('success', 'Product Variant deleted successfully.');
    }
}
