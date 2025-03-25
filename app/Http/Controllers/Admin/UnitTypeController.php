<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitType;
use App\Models\Category;


class UnitTypeController extends Controller
{
    public function index() {
        $unitTypes = UnitType::with('category')->paginate(10);
        return view('admin.unittypes.index', compact('unitTypes'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.unittypes.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item' => 'required|string|max:255',
        ]);

        UnitType::create($request->all());

        return redirect()->route('admin.unit_types.index')->with('success', 'Unit Type added successfully!');
    }

    public function edit(UnitType $unitType) {
        $categories = Category::all();
        return view('admin.unittypes.edit', compact('unitType', 'categories'));
    }

    public function update(Request $request, UnitType $unitType) {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item' => 'required|string|max:255',
        ]);

        $unitType->update($request->all());

        return redirect()->route('admin.unit_types.index')->with('success', 'Unit Type updated successfully!');
    }

    public function destroy(UnitType $unitType) {
        $unitType->delete();
        return redirect()->route('admin.unit_types.index')->with('success', 'Unit Type deleted successfully!');
    }
}
