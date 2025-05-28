<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogNavigationController extends Controller
{
    public function create()
    {
        $types = ['home', 'about', 'contact'];
        return view('admin.blog.navigation.navigation', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'navigation_placement' => 'required|in:upper,lower',
            'type' => 'required|string',
            'logo' => 'nullable|image|max:2048',
            'main_title' => 'nullable|string',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
            'button_hide' => 'nullable|boolean',
            'social_media_icons' => 'nullable|array',
            'social_media_icons.*' => 'nullable|url',
            'footer_text' => 'nullable|string',
        ]);

        $data['button_hide'] = $request->has('button_hide');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('navigations', 'public');
        }

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('navigations', 'public');
        }

        if (isset($data['social_media_icons'])) {
            $data['social_media_icons'] = json_encode($data['social_media_icons']);
        }

        Navigation::create($data);
        return redirect()->back()->with('success', 'Navigation saved.');
    }

    public function edit(Navigation $navigation)
    {
        $types = ['home', 'about', 'contact'];
        return view('navigation.form', compact('navigation', 'types'));
    }

    public function update(Request $request, Navigation $navigation)
    {
        $data = $request->validate([
            'navigation_placement' => 'required|in:upper,lower',
            'type' => 'required|string',
            'logo' => 'nullable|image|max:2048',
            'main_title' => 'nullable|string',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
            'button_hide' => 'nullable|boolean',
            'social_media_icons' => 'nullable|array',
            'social_media_icons.*' => 'nullable|url',
            'footer_text' => 'nullable|string',
        ]);

        $data['button_hide'] = $request->has('button_hide');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('navigations', 'public');
        }

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('navigations', 'public');
        }

        if (isset($data['social_media_icons'])) {
            $data['social_media_icons'] = json_encode($data['social_media_icons']);
        }

        $navigation->update($data);
        return redirect()->back()->with('success', 'Navigation updated.');
    }
}
