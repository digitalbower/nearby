<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    { dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'categoryicon' => 'required|string',
            'status' => 'required|boolean',
            'markup' => 'required',
            'commission' => 'required',
            'enable_homecarousel' => 'required|boolean'
        ]);

        $uniqueCode = strtoupper(Str::random(4)); // Generate a unique code
        
        Category::create([
            'name' => $request->name,
            'commission' => $request->commission,
            'markup' => $request->markup,
            'code' => $uniqueCode,
            'categoryicon' => $request->categoryicon,
            'status' => $request->status,
            'enable_homecarousel' => $request->enable_homecarousel
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    { 
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    { 
        $request->validate([
            'name' => 'required|string|max:255',
            'categoryicon' => 'required|string',
            'status' => 'required|boolean',
            'commission' => 'required',
            'markup' => 'required',
            'enable_homecarousel' => 'required|boolean'
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
