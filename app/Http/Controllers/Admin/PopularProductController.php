<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PopularProduct;
use App\Models\Product;

class PopularProductController extends Controller
{
    public function index() {
        $popularProducts = PopularProduct::with('product')->get();
        return view('admin.popular.index', compact('popularProducts'));
    }

    public function create() {
        $products = Product::all();
        return view('admin.popular.create', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:products,id',
        ]);

        PopularProduct::truncate();
        foreach ($request->product_ids as $productId) {
            PopularProduct::create(['product_id' => $productId]);
        }

        return redirect()->route('admin.popular.index')->with('success', 'Popular products updated.');
    }

    public function edit() {
        $products = Product::all();
        $selectedProducts = PopularProduct::pluck('product_id')->toArray();
        return view('admin.popular.edit', compact('products', 'selectedProducts'));
    }

    public function update(Request $request) {
        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:products,id',
        ]);

        PopularProduct::truncate();
        foreach ($request->product_ids as $productId) {
            PopularProduct::create(['product_id' => $productId]);
        }

        return redirect()->route('admin.popular.index')->with('success', 'Popular products updated.');
    }

    public function destroy($id) {
        PopularProduct::findOrFail($id)->delete();
        return redirect()->route('admin.popular.index')->with('success', 'Popular product removed.');
    }
}
