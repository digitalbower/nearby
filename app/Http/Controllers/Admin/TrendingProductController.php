<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrendingProduct;
use App\Models\Product;

class TrendingProductController extends Controller
{
    public function index()
    {
        $trendingProducts = TrendingProduct::with('product')->get();
        return view('admin.trending.index', compact('trendingProducts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.trending.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:products,id',
        ]);

        TrendingProduct::truncate(); // Remove existing trending products
        foreach ($request->product_ids as $productId) {
            TrendingProduct::create(['product_id' => $productId]);
        }

        return redirect()->route('admin.trending.index')->with('success', 'Trending products updated successfully.');
    }

    public function destroy($id)
    {
        TrendingProduct::findOrFail($id)->delete();
        return back()->with('success', 'Trending product removed successfully.');
    }

    public function edit($id)
{
    $trendingProduct = TrendingProduct::findOrFail($id);
    $products = Product::all();
    return view('admin.trending.edit', compact('trendingProduct', 'products'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);

    $trendingProduct = TrendingProduct::findOrFail($id);
    $trendingProduct->update(['product_id' => $request->product_id]);

    return redirect()->route('admin.trending.index')->with('success', 'Trending product updated successfully.');
}
}
