<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emirate;
use Illuminate\Http\Request;

class LocationScopeController extends Controller
{
    public function index()
    {
        $locations = Emirate::all();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'emirate_name' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        Emirate::create($request->all());

        return redirect()->route('admin.locations.index')->with('success', 'Location added successfully.');
    }

    public function edit(Emirate $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Emirate $location)
    {
        $request->validate([
            'emirate_name' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $location->update($request->all());

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Emirate $location)
    {
        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location deleted successfully.');
    }
}
