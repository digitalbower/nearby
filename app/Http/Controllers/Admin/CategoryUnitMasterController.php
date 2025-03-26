<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryUnitMaster;
use App\Models\Category;
use App\Models\UnitType;

class CategoryUnitMasterController extends Controller
{
    public function index()
    {
        $categoryUnits = CategoryUnitMaster::with(['category', 'unitType'])->get();
        return view('admin.category_unit.index', compact('categoryUnits'));
    }

    public function create()
    {
        $categories = Category::all();
        $unitTypes = UnitType::all();
        return view('admin.category_unit.create', compact('categories', 'unitTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_type_id' => 'required|exists:unit_types,id',
            'status' => 'required|boolean',
        ]);

        CategoryUnitMaster::create($request->all());
        return redirect()->route('admin.category_unit.index')->with('success', 'Category Unit added successfully!');
    }

    public function edit(CategoryUnitMaster $categoryUnitMaster)
    {
        $categories = Category::all();
        $unitTypes = UnitType::all();
        return view('admin.category_unit.edit', compact('categoryUnitMaster', 'categories', 'unitTypes'));
    }

    public function update(Request $request, CategoryUnitMaster $categoryUnitMaster)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_type_id' => 'required|exists:unit_types,id',
            'status' => 'required|boolean',
        ]);

        $categoryUnitMaster->update($request->all());
        return redirect()->route('admin.category_unit.index')->with('success', 'Category Unit updated successfully!');
    }

    public function destroy(CategoryUnitMaster $categoryUnitMaster)
    {
        $categoryUnitMaster->delete();
        return redirect()->route('admin.category_unit.index')->with('success', 'Category Unit deleted successfully!');
    }
}
