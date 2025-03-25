<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'filter_link' => 'nullable|string',
            'code' => 'required|string|unique:subcategories,code',
            'status' => 'boolean',
            'show_on_home' => 'boolean',
        ]);

        Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'filter_link' => $request->filter_link,
            'code' => $request->code,
            'status' => $request->status ?? 0,
            'show_on_home' => $request->show_on_home ?? 0,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory added successfully.');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'filter_link' => 'nullable|string',
            'code' => 'required|string|unique:subcategories,code,' . $id,
            'status' => 'boolean',
            'show_on_home' => 'boolean',
        ]);

        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'filter_link' => $request->filter_link,
            'code' => $request->code,
            'status' => $request->status ?? 0,
            'show_on_home' => $request->show_on_home ?? 0,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
