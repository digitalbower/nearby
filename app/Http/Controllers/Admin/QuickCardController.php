<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuickCard;

class QuickCardController extends Controller
{
    public function index()
    {
        $quickCards = QuickCard::all();
        return view('admin.quick.index', compact('quickCards'));
    }

    public function create()
    {
        if (QuickCard::count() >= 2) {
            return redirect()->route('admin.quick.index')->with('error', 'You can only add up to 2 cards.');
        }
        return view('admin.quick.create');
    }

    public function store(Request $request)
    {
        if (QuickCard::count() >= 2) {
            return redirect()->route('admin.quick.index')->with('error', 'You can only add up to 2 cards.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:50',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'button_text', 'link']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('quick_cards', 'public');
        }

        QuickCard::create($data);

        return redirect()->route('admin.quick.index')->with('success', 'Quick Card added successfully.');
    }

    public function edit(QuickCard $quickCard)
    {
        return view('admin.quick.edit', compact('quickCard'));
    }

    public function update(Request $request, QuickCard $quickCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:50',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'button_text', 'link']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('quick_cards', 'public');
        }

        $quickCard->update($data);

        return redirect()->route('admin.quick.index')->with('success', 'Quick Card updated successfully.');
    }

    public function destroy(QuickCard $quickCard)
    {
        $quickCard->delete();
        return redirect()->route('admin.quick.index')->with('success', 'Quick Card deleted successfully.');
    }
}
