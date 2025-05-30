<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedItem;
use Illuminate\Support\Facades\Storage;

class FeaturedItemController extends Controller
{
    public function index()
    {
        $items = FeaturedItem::latest()->get();
        return view('admin.blog.featured_items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.blog.featured_items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('featured', 'public');
        }

        FeaturedItem::create($data);
        return redirect()->route('admin.blog.featured_items.index')->with('success', 'Featured item added successfully.');
    }

    public function edit(FeaturedItem $featured_item)
    {
        return view('admin.blog.featured_items.edit', compact('featured_item'));
    }

    public function update(Request $request, FeaturedItem $featured_item)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($featured_item->image && Storage::disk('public')->exists($featured_item->image)) {
                Storage::disk('public')->delete($featured_item->image);
            }
            $data['image'] = $request->file('image')->store('featured', 'public');
        }

        $featured_item->update($data);
        return redirect()->route('admin.featured-items.index')->with('success', 'Updated successfully.');
    }

    public function destroy(FeaturedItem $featured_item)
    {
        if ($featured_item->image && Storage::disk('public')->exists($featured_item->image)) {
            Storage::disk('public')->delete($featured_item->image);
        }
        $featured_item->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
