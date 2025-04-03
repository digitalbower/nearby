<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'categoryicon' => 'required|string',
            'status' => 'required|boolean',
            'enable_homecarousel' => 'required|boolean'
        ]);

        $uniqueCode = strtoupper(Str::random(4));
        
    Category::create([
        'name' => $request->name,
        'code' => $uniqueCode, // Auto-generate code
        'categoryicon' => $request->categoryicon,
        'status' => $request->status,
        'enable_homecarousel' => $request->enable_homecarousel
    ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|string|max:255',
            'categoryicon' => 'required|string',
            'status' => 'required|boolean',
            'enable_homecarousel' => 'required|boolean'
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
