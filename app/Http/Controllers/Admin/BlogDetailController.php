<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogDetail;
use App\Models\FeaturedItem;
use Illuminate\Support\Str;


class BlogDetailController extends Controller
{
    public function index()
    {
        $details = BlogDetail::with('blog')->latest()->get();
        return view('admin.blog.blog_details.index', compact('details'));
    }

    public function create()
    {
        $blogs = Blog::all(); // for dropdown
        return view('admin.blog.blog_details.create', compact('blogs'));
    }


public function store(Request $request)
{ 
    $request->validate([
        'blog_id' => 'required|exists:blogs,id',
        'title' => 'required|string|max:255',
    ]);

    $data = $request->all(); 
    $data['slug'] = Str::slug($request->title); 
    $data['description'] = $request->input('description');

    // Handle multiple image uploads
    if ($request->hasFile('images')) { 
        $paths = [];
        foreach ($request->file('images') as $image) {
            $paths[] = $image->store('blog_images', 'public');
        }
        $data['images'] = json_encode($paths);
    } 

   
    BlogDetail::create($data);

    return redirect()->route('admin.blog.blog-details.index')
                     ->with('success', 'Blog detail created.');
}

  
    public function edit(BlogDetail $blog_detail)
    {
        $blogs = Blog::all();
        return view('admin.blog.blog_details.edit', compact('blog_detail', 'blogs'));
    }

    public function update(Request $request, BlogDetail $blog_detail)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'title' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $image) {
                $paths[] = $image->store('blog_images', 'public');
            }
            $data['images'] = json_encode($paths);
        }

        $blog_detail->update($data);
        return redirect()->route('admin.blog.blog-details.index')->with('success', 'Updated successfully.');
    }

    public function destroy(BlogDetail $blog_detail)
    {
        $blog_detail->delete();
        return redirect()->route('admin.blog.blog-details.index')->with('success', 'Deleted successfully.');
    }
}
