<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    

    public function index()
    {
        $logos = Logo::all();
        return view('admin.logo.index', compact('logos'));
    }

    public function edit($id)
    {
        $logo = Logo::findOrFail($id);
        return view('admin.logo.edit', compact('logo'));
    }

    // Update the logo details
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logo = Logo::findOrFail($id);
        $logo->title = $request->title;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($logo->image) {
                Storage::delete('public/' . $logo->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('logos', 'public');
            $logo->image = $imagePath;
        }

        $logo->save();

        return redirect()->route('logos.index')->with('success', 'Logo updated successfully!');
    }
}


