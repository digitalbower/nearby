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
            'type' => 'required',
            'item_text' => 'required',
            'link' => 'nullable',
            'icon' => 'nullable',
            'status' => 'required',
        ]);

        Footer::create($request->all());
        return back()->with('success', 'Footer item added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:Top Destination,Information,Follow Us',
            'item_text' => 'required|string',
            'link' => 'nullable|url',
            'icon' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->update($request->all());
        return back()->with('success', 'Footer item updated successfully.');
    }

    public function destroy($id)
    {
        Footer::findOrFail($id)->delete();
        return back()->with('success', 'Footer item deleted successfully.');
    }
}
