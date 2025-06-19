<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogHeaderFooter;
use Illuminate\Support\Facades\Storage;

class BlogNavigationController extends Controller
{
    public function index()
    {
        $navigation = BlogHeaderFooter::get();
        return view('admin.blog.navigation.index', compact('navigation'));
    }


     public function edit($id)
    {
        $navigation = BlogHeaderFooter::findOrFail($id); // fetch record from DB

        return view('admin.blog.navigation.edit', compact('navigation')); // pass it to the view
    }


        public function update(Request $request, $id)
        { 

            $navigation = BlogHeaderFooter::findOrFail($id);

            
            $request->validate([
                'logo' => 'nullable|image|max:2048',
                'main_title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'main_image' => 'nullable|image|max:2048',
                'button_text' => 'nullable|string|max:255',
                'button_link' => 'nullable|url',
                'button_hide' => 'nullable|boolean',
            ]);

    
        $data = $request->only([
            'main_title', 'description', 'button_text', 'button_link'
        ]);
        $data['button_hide'] = $request->has('button_hide');

    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('blogerlogos', 'public'); 
            $data['logo'] = $logoPath;
        } 

        
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('blogerlogos', 'public');
            $data['main_image'] = $mainImagePath;
        }

        // Update the record
        $navigation->update($data);

        // Redirect back with success message
        return redirect()->route('admin.blog.blognavigation.edit', $id)
                        ->with('success', 'Header updated successfully.');
}



}
