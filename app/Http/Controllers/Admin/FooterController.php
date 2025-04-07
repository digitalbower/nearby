<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();
        return view('admin.footer.index', compact('footers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'nullable|string|max:255',
            'item_text' => 'nullable|string',
            'link' => 'nullable|url',
            'icon' => 'nullable|string', // not an image, just a class string
            'status' => 'nullable|boolean',
        ]);
    
        $data = $request->only(['type', 'item_text', 'link', 'icon', 'status']);
    
        // Default status
        $data['status'] = $data['status'] ?? 1;
    
        Footer::create($data);
    
        
        return back()->with('success', 'Footer item added successfully.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'type' => 'nullable|in:Top Destination,Information,Follow Us',
        'item_text' => 'nullable|string',
        'link' => 'nullable|url',
        'icon' => 'nullable|string',
        'status' => 'nullable|boolean',
    ]);

    $footer = Footer::findOrFail($id);

    $data = $request->only(['type', 'item_text', 'link', 'icon', 'status']);

    $footer->update($data);

    return back()->with('success', 'Footer item updated successfully.');
}


    public function destroy($id)
    {
        Footer::findOrFail($id)->delete();
        return back()->with('success', 'Footer item deleted successfully.');
    }
}
