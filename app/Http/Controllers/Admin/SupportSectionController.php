<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportSection;

class SupportSectionController extends Controller
{
    public function index()
    {
        $support = SupportSection::first();
        return view('admin.support.index', compact('support'));
    }

    public function create()
    {
        return view('admin.support.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'form_action' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['label', 'title', 'button_text', 'form_action']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('support_icons', 'public');
        }

        SupportSection::create($data);

        return redirect()->route('admin.support.index')->with('success', 'Support Section added successfully!');
    }

    public function edit()
    {
        $support = SupportSection::first();
        return view('admin.support.edit', compact('support'));
    }

    public function update(Request $request, $id)
    {
        $support = SupportSection::findOrFail($id);

        $request->validate([
            'label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'form_action' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['label', 'title', 'button_text', 'form_action']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('support_icons', 'public');
        }

        $support->update($data);

        return redirect()->route('admin.support.index')->with('success', 'Support Section updated successfully!');
    }

    public function destroy($id)
    {
        $support = SupportSection::findOrFail($id);
        $support->delete();

        return redirect()->route('admin.support.index')->with('success', 'Support Section deleted successfully!');
    }
}
