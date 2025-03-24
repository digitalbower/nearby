<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavigationMenu;

class NavigationMenuController extends Controller
{
    public function index()
    {
        $menuItems = NavigationMenu::all();
        return view('admin.navigation.index', compact('menuItems'));
    }

    public function create()
    {
        return view('admin.navigation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'navigation_placement' => 'required|in:upper,lower',
            'active' => 'boolean'
        ]);
        
        NavigationMenu::create($request->all());
        return redirect()->route('admin.navigation.index')->with('success', 'Menu item added successfully');
    }

    public function edit(NavigationMenu $navigationMenu)
    {
        return view('admin.navigation.edit', compact('navigationMenu'));
    }

    public function update(Request $request, NavigationMenu $navigationMenu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'navigation_placement' => 'required|in:upper,lower',
            'active' => 'boolean'
        ]);
        
        $navigationMenu->update($request->all());
        return redirect()->route('admin.navigation.index')->with('success', 'Menu item updated successfully');
    }

    public function destroy(NavigationMenu $navigationMenu)
    {
        $navigationMenu->delete();
        return redirect()->route('admin.navigation.index')->with('success', 'Menu item deleted successfully');
    }
}
