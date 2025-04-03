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

    public function create()
    {
        return view('admin.logo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
            'type' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Logo::create([
            'logo' => $logoPath,
            'link' => $request->link,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.logo.index')->with('success', 'Logo added successfully.');
    }

    public function edit($id)
    {
        $logo = Logo::findOrFail($id);
        return view('admin.logo.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
            'type' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $logo = Logo::findOrFail($id);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $logo->logo = $logoPath;
        }

        $logo->link = $request->link;
        $logo->type = $request->type;
        $logo->status = $request->status;
        $logo->save();

        return redirect()->route('admin.logos.index')->with('success', 'Logo updated successfully.');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);
        $logo->delete();
        return redirect()->route('admin.logos.index')->with('success', 'Logo deleted successfully.');
    }
}


