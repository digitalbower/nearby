<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogFooter;

class BlogFooterController extends Controller
{
  public function index()
    {
        $footers = BlogFooter::latest()->get();
        return view('admin.blog.footer.index', compact('footers'));
    }

    public function create()
    {
        return view('admin.blog.footer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:text,social',
        ]);

        $footer = new BlogFooter();
        $footer->type = $request->type;

        if ($request->type === 'text') {
            $footer->footer_text = $request->footer_text;
            $footer->footer_link = $request->footer_link;
        } elseif ($request->type === 'social') {
            $footer->social_icon = $request->social_icon;
            $footer->social_link = $request->social_link;
            $footer->social_svg = $request->social_svg;
        }

        $footer->save();
        return redirect()->route('admin.blog.footer.index')->with('success', 'Footer created successfully');
    }

    public function edit($id)
    {
        $footer = BlogFooter::findOrFail($id);
        return view('admin.blog.footer.edit', compact('footer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:text,social',
        ]);

        $footer = BlogFooter::findOrFail($id);
        $footer->type = $request->type;

        if ($request->type === 'text') {
            $footer->footer_text = $request->footer_text;
            $footer->footer_link = $request->footer_link;
            $footer->social_icon = null;
            $footer->social_link = null;
        } elseif ($request->type === 'social') {
            $footer->social_icon = $request->social_icon;
            $footer->social_link = $request->social_link;
            $footer->footer_text = null;
            $footer->footer_link = null;
            $footer->social_svg = $request->social_svg;
        }

        $footer->save();
        return redirect()->route('admin.blog.footer.index')->with('success', 'Footer updated successfully');
    }

    public function destroy($id)
    {
        $footer = BlogFooter::findOrFail($id);
        $footer->delete();

        return redirect()->route('admin.blog.footer.index')->with('success', 'Footer deleted successfully');
    }
}
