<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitType;
use App\Models\Category;


class UnitTypeController extends Controller
{
    public function index()
    {
        $unitTypes = UnitType::with('category')->get();
        return view('admin.unittypes.index', compact('unitTypes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.unittypes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_type' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        UnitType::create([
            'category_id' => $request->category_id,
            'unit_type' => $request->unit_type,
            'status' => $request->status,
           
        ]);

        return redirect()->route('admin.unit_types.index')->with('success', 'Unit Type added successfully');
    }

    public function edit($id)
    {
        $unitType = UnitType::findOrFail($id);
        $categories = Category::all();
        return view('admin.unittypes.edit', compact('unitType', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_type' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $unitType = UnitType::findOrFail($id);
        $unitType->update([
            'category_id' => $request->category_id,
            'unit_type' => $request->unit_type,
            'status' => $request->status,
            
        ]);

        return redirect()->route('admin.unit_types.index')->with('success', 'Unit Type updated successfully');
    }

    public function destroy($id)
    {
        $unitType = UnitType::findOrFail($id);
        $unitType->delete();

        return redirect()->route('admin.unit_types.index')->with('success', 'Unit Type deleted successfully');
    }
}
