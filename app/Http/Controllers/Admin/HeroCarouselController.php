<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroCarousel;
use App\Models\Product;

class HeroCarouselController extends Controller
{
    public function index() {
        $carousels = HeroCarousel::with('product')->get();
        return view('admin.hero-carousel.index', compact('carousels'));
    }

    public function create() {
        $products = Product::all();
        return view('admin.hero-carousel.create', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'status' => 'required|boolean'
        ]);

        HeroCarousel::create($request->all());

        return redirect()->route('admin.hero-carousel.index')->with('success', 'Carousel item added successfully.');
    }

    public function edit($id) {
        $carousel = HeroCarousel::findOrFail($id);
        $products = Product::all();
        return view('admin.hero-carousel.edit', compact('carousel', 'products'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'status' => 'required|boolean'
        ]);

        $carousel = HeroCarousel::findOrFail($id);
        $carousel->update($request->all());

        return redirect()->route('admin.hero-carousel.index')->with('success', 'Carousel updated successfully.');
    }

    public function destroy($id) {
        HeroCarousel::findOrFail($id)->delete();
        return redirect()->route('admin.hero-carousel.index')->with('success', 'Carousel item removed.');
    }
}
