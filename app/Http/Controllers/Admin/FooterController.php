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
            'type' => 'required|string|max:255',
            'item_text' => 'required_if:type,Top Destination,Information|string|nullable',
            'icon' => 'required_if:type,Follow Us,payment_channels|string|nullable',
            'link' => ['required_if:type,Top Destination,Information','nullable', 'regex:/^(https?:\/\/|\/)/'],
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
