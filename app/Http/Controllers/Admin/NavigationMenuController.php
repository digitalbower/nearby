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
         // Validate the request
         $request->validate([
            'name' => 'required|string|max:255',
           
            'navigation_placement' => 'required|in:upper,lower',
            
        ]);

        // Create a new menu item
        NavigationMenu::create([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => $request->icon,
            'navigation_placement' => $request->navigation_placement,
            'active' => $request->has('active') ? 1 : 0, // Checkbox handling
        ]);

        return redirect()->route('admin.navigation.index')->with('success', 'Menu item added successfully');
    }

    public function edit(NavigationMenu $navigationMenu)
    {
        return view('admin.navigation.edit', compact('navigationMenu'));
    }

    public function update(Request $request, NavigationMenu $navigationMenu)
    {
        // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
       
        
        'navigation_placement' => 'required|in:upper,lower',
        
    ]);

    // Update the menu item with validated data
    $navigationMenu->update([
        'name' => $request->name,
        'link' => $request->link,
        'icon' => $request->icon,
        'navigation_placement' => $request->navigation_placement,
        'active' => $request->has('active') ? 1 : 0, // Handle checkbox input
    ]);
       
        return redirect()->route('admin.navigation.index')->with('success', 'Menu item updated successfully');
    }

    public function destroy(NavigationMenu $navigationMenu)
    {
        $navigationMenu->delete();
        return redirect()->route('admin.navigation.index')->with('success', 'Menu item deleted successfully');
    }
}
