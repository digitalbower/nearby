<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    

    public function index() {
        $logo = Logo::first(); // Fetch first logo entry
        return view('admin.logo.index', compact('logo'));
    }

    public function update(Request $request) {
        $request->validate([
            'logo_image' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'preview_image' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $logo = Logo::first();
        if (!$logo) {
            $logo = new Logo();
        }

        if ($request->hasFile('logo_image')) {
            if ($logo->logo_image && Storage::exists($logo->logo_image)) {
                Storage::delete($logo->logo_image);
            }
            $logo->logo_image = $request->file('logo_image')->store('logos', 'public');
        }

        if ($request->hasFile('preview_image')) {
            if ($logo->preview_image && Storage::exists($logo->preview_image)) {
                Storage::delete($logo->preview_image);
            }
            $logo->preview_image = $request->file('preview_image')->store('logos', 'public');
        }

        $logo->save();
        return redirect()->back()->with('success', 'Logo updated successfully');
    }
}


