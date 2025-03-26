<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('vendor')
        ->whereHas('vendor', function ($query) {
            $query->where('status', 1);
        })
        ->get();
        return view('admin.products.index')->with(['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->latest()->get();
        return view('admin.products.create')->with(['vendors'=>$vendors,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        
        $tagsArray = is_string($request->tags) ? json_decode($request->tags, true) : $request->tags;
        $request->merge(['tags' => $tagsArray]);
        
        $request->validate([
            'vendor_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'short_description' => 'required|string|max:1000',
            'tags' => ['required', 'array'],
            'tags.*' => ['string', 'max:255'],
            'gallery' => 'required', 
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_description' => 'required',

        ],
        [
            'tags.required' => 'Please add at least one tag.',
            'tags.array' => 'Tags must be an array.',
            'tags.*.string' => 'Each tag must be a valid string.',
            'tags.*.max' => 'Each tag must not exceed 255 characters.',
            'gallery.required' => 'Please upload at least one image.',
            'gallery.*.image' => 'Each file must be a valid image.', 
            'gallery.*.mimes' => 'Only JPG, JPEG, PNG, and GIF formats are allowed.', 
            'gallery.*.max' => 'Each image must not exceed 2MB.', 
        ]);
      
        $product = new Product;

        if ($request->hasFile('gallery')) {
            $galleryArray = [];
    
            
            $files = is_array($request->file('gallery')) ? $request->file('gallery') : [$request->file('gallery')];
    
            foreach ($files as $image) {
                $path = $image->store('products', 'public');  
                $galleryArray[] = $path;
            }
                
            $product->gallery = json_encode($galleryArray);
        }

        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->about_description = $request->about_description;
        $product->tags =json_encode($request->tags);
        $product->vendor_id = $request->vendor_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'New Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $vendors = Vendor::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->latest()->get();
        $product->tags = json_decode($product->tags, true);
        return view('admin.products.edit')->with(['product'=>$product,'vendors'=>$vendors,'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $tagsArray = is_string($request->tags) ? json_decode($request->tags, true) : $request->tags;
        $request->merge(['tags' => $tagsArray]);

        $request->validate([
            'vendor_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'short_description' => 'required|string|max:1000',
            'tags' => ['required', 'array'],
            'tags.*' => ['string', 'max:255'],
            'gallery' => 'nullable|array',  
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_description' => 'required',
        ],
        [
            'tags.required' => 'Please add at least one tag.',
            'tags.array' => 'Tags must be an array.',
            'tags.*.string' => 'Each tag must be a valid string.',
            'tags.*.max' => 'Each tag must not exceed 255 characters.',
            'gallery.array' => 'Gallery must be an array.', 
            'gallery.*.image' => 'Each file must be a valid image.',
            'gallery.*.mimes' => 'Only JPG, JPEG, PNG, and GIF formats are allowed.',
            'gallery.*.max' => 'Each image must not exceed 2MB.',
        ]);
    
        $galleryArray = $product->gallery ? json_decode($product->gallery, true) : [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('products', 'public');  
                $galleryArray[] = $path;
            }
        }
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->about_description = $request->about_description;
        $product->vendor_id = $request->vendor_id;
        $product->tags =json_encode($request->tags);
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        if (!empty($galleryArray)) {
            $product->gallery = json_encode($galleryArray);
        }
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->gallery) {
            $images = json_decode($product->gallery, true);
            foreach ($images as $image) {
                $imagePath = storage_path('app/public/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); 
                }
            }
        }
        if($product->vendorTerm){
            $product->vendorTerm()->delete();
        }
        if($product->variants){
            $product->variants()->delete();
        }
        $product->delete();
        return redirect()->route('admin.products.index')
        ->with('success', 'Product deleted successfully.');
    }
    public function changeProductStatus(Request $request)
    { 
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['message' => 'Product status updated successfully!']);
    }
    public function getSubcategories(Request $request){
        $subcategories = Subcategory::where('status',1)->where('category_id',$request->category_id)->get();
        return response()->json($subcategories);


    }
}