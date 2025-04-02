<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryUnitMaster;
use App\Models\Product;
use App\Models\ProductType;
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
        ->where('status', 1) 
        ->get();
        $types = ProductType::where('status', 1)->get();
        return view('admin.products.product_variants.create')->with(['products'=>$products,'types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_type_id' => 'required|exists:product_types,id',
            'title' => 'required',
            'short_description' => 'required',
            'short_legend' => 'required',
            'short_info' => 'required',
            'unit_price' => 'required',
            'unit_type_id' => 'required',
            'discounted_price' => 'required',
            'available_quantity' => 'required',
            'validity_from' => 'required',
            'validity_to' => 'required',
        ]);
        $data = $request->all(); 
        if (isset($data['unit_price']) && isset($data['discounted_price']) && $data['unit_price'] > 0) {
            $data['discounted_percentage'] = (($data['unit_price'] - $data['discounted_price']) / $data['unit_price']) * 100;
        } else {
            $data['discounted_percentage'] = 0; 
        }        
        ProductVariant::create($data);
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
        ->where('status', 1) 
        ->get();
        $types = ProductType::where('status', 1)->get();
        return view('admin.products.product_variants.edit')->with(['products'=>$products,'product_variant'=>$product_variant,'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVariant $product_variant)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_type_id' => 'required|exists:product_types,id',
            'title' => 'required',
            'short_description' => 'required',
            'short_legend' => 'required',
            'short_info' => 'required',
            'unit_price' => 'required',
            'unit_type_id' => 'required',
            'discounted_price' => 'required',
            'available_quantity' => 'required',
            'validity_from' => 'required',
            'validity_to' => 'required',
        ]);
        $data = $request->all(); 
        if ($request->timer_flag == 0) { 
            $data['start_time'] = null;
            $data['end_time'] = null;
        }
        if (isset($data['unit_price']) && isset($data['discounted_price']) && $data['unit_price'] > 0) {
            $data['discounted_percentage'] = (($data['unit_price'] - $data['discounted_price']) / $data['unit_price']) * 100;
        } else {
            $data['discounted_percentage'] = 0; 
        } 
        $product_variant->update($data);
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
    public function changeVariantStatus(Request $request)
    { 
        $variant = ProductVariant::findOrFail($request->id);
        $variant->status = $request->status;
        $variant->save();

        return response()->json(['message' => 'Product Variant status updated successfully!']);
    }
    public function getCategoryUnitTypes(Request $request){
        $category_unit_types = CategoryUnitMaster::with(['unitType:id,unit_type'])
        ->where('category_id', $request->category_id)
        ->get();
        return response()->json($category_unit_types->map(function ($item) {
            return [
                'id' => $item->unit_type_id,  
                'unit_type' => optional($item->unitType)->unit_type,  
            ];
        }));    
    }
}
