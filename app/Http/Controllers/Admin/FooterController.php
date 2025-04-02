<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    { 
        return view('admin.footer.index', [
            'footer' => Footer::first(),
        ]);
    }

    public function update(Request $request, Footer $footer)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'item_text' => 'required|string',
            'link' => 'nullable|string',
            'icon' => 'nullable|json',
            'status' => 'required|boolean',
        ]);

        $footer->update($request->all());

        return back()->with('success', 'Footer information updated successfully.');
    }
}
