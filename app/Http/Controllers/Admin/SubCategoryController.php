<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
   
    public function index() {
        $subcategories = Subcategory::with('category')->latest()->paginate(10);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new subcategory.
     */
    public function create() {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created subcategory in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => Str::random(10), // Auto-generated unique code
            'status' => $request->status,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Show the form for editing a subcategory.
     */
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified subcategory in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|boolean',
    ]);

    $subcategory = Subcategory::findOrFail($id);
    $subcategory->update($request->all());

    return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
}

    /**
     * Remove the specified subcategory from storage.
     */
    public function destroy($id)
{
    $subcategory = Subcategory::findOrFail($id);
    $subcategory->delete();

    return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
}
}
