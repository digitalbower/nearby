<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogHeaderFooter;

class BlogNavigationController extends Controller
{
    public function index()
    {
        $navigations = BlogHeaderFooter::latest()->paginate(10);
        return view('admin.blog.navigation.index', compact('navigations'));
    }


    public function create()
    {
       
        return view('admin.blog.navigation.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'navigation_placement' => 'required|in:header,footer',
            'logo' => 'nullable|image',
            'main_title' => 'nullable|string',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
            'button_hide' => 'nullable|boolean',
            'footer_text' => 'nullable|string',
            'social_media_icons' => 'nullable|array',
            'social_media_icons.*' => 'nullable|url',
        ]);
    
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('navigations', 'public');
        }
    
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('navigations', 'public');
        }
    
        $data['button_hide'] = $request->has('button_hide') ? 1 : 0;
        $data['social_media_icons'] = $request->filled('social_media_icons') ? json_encode(array_filter($request->social_media_icons)) : null;
    
        BlogHeaderFooter::create($data);
    
        return redirect()->route('admin.navigation.index')->with('success', 'Navigation created successfully.');
    }

    public function edit(BlogHeaderFooter $navigation)
{
    return view('admin.blog.navigation.edit', compact('navigation'));
}


    public function update(Request $request, BlogHeaderFooter $navigation)
    {
        $rules = [
            'navigation_placement' => 'required|in:header,footer',
            'logo' => 'nullable|image|max:2048',
            'main_title' => 'nullable|string',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
            'button_hide' => 'nullable|boolean',
        ];
    
        if ($request->navigation_placement === 'footer') {
            $rules['social_media_icons'] = 'nullable|array';
            $rules['social_media_icons.*'] = 'nullable|url';
            $rules['footer_text'] = 'nullable|string';
        }
    
        $data = $request->validate($rules);
        $data['button_hide'] = $request->has('button_hide');
    
        // Replace logo if new one uploaded
        if ($request->hasFile('logo')) {
            if ($navigation->logo && \Storage::disk('public')->exists($navigation->logo)) {
                \Storage::disk('public')->delete($navigation->logo);
            }
            $data['logo'] = $request->file('logo')->store('navigations', 'public');
        }
    
        // Replace main_image if new one uploaded
        if ($request->hasFile('main_image')) {
            if ($navigation->main_image && \Storage::disk('public')->exists($navigation->main_image)) {
                \Storage::disk('public')->delete($navigation->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('navigations', 'public');
        }
    
        if (isset($data['social_media_icons'])) {
            $data['social_media_icons'] = json_encode($data['social_media_icons']);
        }
    
        $navigation->update($data);
    
        return redirect()->route('admin.navigation.index')->with('success', 'Navigation updated successfully.');
    }

    public function destroy($id)
{
    try {
        $navigation = BlogHeaderFooter::findOrFail($id); 

        if ($navigation->logo && \Storage::disk('public')->exists($navigation->logo)) {
            \Storage::disk('public')->delete($navigation->logo);
        }

        if ($navigation->main_image && \Storage::disk('public')->exists($navigation->main_image)) {
            \Storage::disk('public')->delete($navigation->main_image);
        }

        $navigation->delete();

        return back()->with('success', 'Navigation deleted successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong. Please try again.');
    }
}

    
}
