<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::with('subcategories')->get()
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->validate([
            'name' => 'required|string|max:255',
            'filter_link' => 'nullable|string',
            'code' => 'required|string|unique:categories,code',
            'status' => 'boolean',
            'show_on_home' => 'boolean',
        ]));

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->validate([
            'name' => 'required|string|max:255',
            'filter_link' => 'nullable|string',
            'code' => 'required|string|unique:categories,code,' . $category->id,
            'status' => 'boolean',
            'show_on_home' => 'boolean',
        ]));

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
