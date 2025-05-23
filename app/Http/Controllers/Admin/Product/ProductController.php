<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Emirate;
use App\Models\NbvTerm;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SalesPerson;
use App\Models\Subcategory;
use App\Models\Tags;
use App\Models\Vendor;
use App\Models\VendorTerm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $today = Carbon::today();
        $vendors =  Vendor::where('status', 1)
        ->whereDate('validityfrom', '<=', $today)
        ->whereDate('validityto', '>=', $today)
        ->get();
        $categories = Category::where('status',1)->latest()->get();
        $tags = Tags::where('status',1)->latest()->get();
        $terms = NbvTerm::where('status',1)->latest()->get();
        $emirates = Emirate::where('status',1)->latest()->get();
        $persons = SalesPerson::where('status',1)->latest()->get();
        $types = ProductType::where('status', 1)->get();
        return view('admin.products.create')->with(['vendors'=>$vendors,'types'=>$types,'categories'=>$categories,
        'tags'=>$tags,'terms'=>$terms,'emirates'=>$emirates,'persons'=>$persons]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        
        $request->validate([
            'vendor_id' => 'required',
            'product_type_id' => 'required|exists:product_types,id',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'short_description' => 'required|string|max:1000',
            'nbv_terms_id' => 'required',
            'tags_id' => 'required',
            'emirates_id'=> 'required',
            'productlocation_address'=> 'required',
            'productlocation_link'=>'required',
            'validity_from'=>'required',
            'validity_to'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'gallery' => 'required', 
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_description' => 'required',
            'email_about' => 'required',

        ],
        [
            'gallery.required' => 'Please upload at least one image.',
            'gallery.*.image' => 'Each file must be a valid image.', 
            'gallery.*.mimes' => 'Only JPG, JPEG, PNG, and GIF formats are allowed.', 
            'gallery.*.max' => 'Each image must not exceed 2MB.', 
        ]);
      
        $product = new Product;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('products/images', 'public');  
            $product->image = $path; 
        }

        if ($request->hasFile('gallery')) {
            $galleryArray = [];
    
            
            $files = is_array($request->file('gallery')) ? $request->file('gallery') : [$request->file('gallery')];
    
            foreach ($files as $image) {
                $path = $image->store('products', 'public');  
                $galleryArray[] = $path;
            }
                
            $product->gallery = json_encode($galleryArray);
        }
        if ($request->hasFile('og_image')) {
            $og_image = $request->file('og_image');
            $path_og_image = $og_image->store('seo_images', 'public');  
            $product->og_image = $path_og_image; 
        }

        $product->name = $request->name;
        $product->product_type_id =$request->product_type_id;
        $product->short_description = $request->short_description;
        $product->about_description = $request->about_description;
        $product->email_about = $request->email_about;
        $product->tags_id =  json_encode($request->tags_id);
        $product->vendor_id = $request->vendor_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->nbv_terms_id  = $request->nbv_terms_id;
        $product->vendor_terms_id  = $request->vendor_terms_id;
        $product->product_support_phone  = $request->product_support_phone;
        $product->product_support_email  = $request->product_support_email;
        $product->emirates_id  = $request->emirates_id;
        $product->productlocation_address = $request->productlocation_address;
        $product->productlocation_link  = $request->productlocation_link;
        $product->importantinfo  = $request->importantinfo;
        $product->validity_from  = $request->validity_from;
        $product->validity_to  = $request->validity_to;
        $product->giftable  = $request->has('giftable') ? 1 : 0;
        $product->herocarousel = $request->has('herocarousel') ? 1 : 0;
        $product->trending = $request->has('trending') ? 1 : 0;
        $product->categorycarousel = $request->has('categorycarousel') ? 1 : 0;
        $product->sales_person_id  = $request->sales_person_id;
        $product->slug = Str::slug($request->name, '-');
        $product->meta_title  = $request->meta_title;
        $product->meta_description  = $request->meta_description;
        $product->og_title  = $request->og_title;
        $product->og_description  = $request->og_description;
        $product->schema  = $request->schema;
        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'New Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $today = Carbon::today();
        $vendors =  Vendor::where('status', 1)
        ->whereDate('validityfrom', '<=', $today)
        ->whereDate('validityto', '>=', $today)
        ->get();
        $categories = Category::where('status',1)->latest()->get();
        $tags = Tags::where('status',1)->latest()->get();
        $terms = NbvTerm::where('status',1)->latest()->get();
        $emirates = Emirate::where('status',1)->latest()->get();
        $persons = SalesPerson::where('status',1)->latest()->get();
        $types = ProductType::where('status', 1)->get();
        return view('admin.products.edit')->with(['product'=>$product,'vendors'=>$vendors,'categories'=>$categories,
        'tags'=>$tags,'terms'=>$terms,'emirates'=>$emirates,'persons'=>$persons,'types'=>$types]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'vendor_id' => 'required',
            'product_type_id' => 'required|exists:product_types,id',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'short_description' => 'required|string|max:1000',
            'nbv_terms_id' => 'required',
            'tags_id' => 'required',
            'emirates_id'=> 'required',
            'productlocation_address'=> 'required',
            'productlocation_link'=>'required',
            'validity_from'=>'required',
            'validity_to'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'gallery' => 'nullable|array',  
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_description' => 'required',
            'email_about' => 'required',
        ],
        [
            'gallery.array' => 'Gallery must be an array.', 
            'gallery.*.image' => 'Each file must be a valid image.',
            'gallery.*.mimes' => 'Only JPG, JPEG, PNG, and GIF formats are allowed.',
            'gallery.*.max' => 'Each image must not exceed 2MB.',
        ]);
    
        $galleryArray = $product->gallery ? json_decode($product->gallery, true) : [];

        $removedImages = json_decode($request->input('removed_images'), true);
        
        // Remove images from storage and gallery array
        if (!empty($removedImages)) {
            foreach ($removedImages as $path) {
                Storage::delete('public/' . $path); // Delete from disk
        
                // Remove from gallery array
                if (($key = array_search($path, $galleryArray)) !== false) {
                    unset($galleryArray[$key]);
                }
            }
        
            // Re-index the array to keep it clean
            $galleryArray = array_values($galleryArray);
        }
        
        // Add new uploaded images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('products', 'public');
                $galleryArray[] = $path;
            }
        }
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $image = $request->file('image');
            $path = $image->store('products/images', 'public');  
            $product->image = $path; 
        }
        if ($request->hasFile('og_image')) {
            if ($product->og_image) {
                Storage::disk('public')->delete($product->og_image);
            }
            $og_image = $request->file('og_image');
            $path_og_image = $og_image->store('seo_images', 'public');  
            $product->og_image = $path_og_image; 
        }
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->product_type_id =$request->product_type_id;
        $product->short_description = $request->short_description;
        $product->about_description = $request->about_description;
        $product->email_about = $request->email_about;
        $product->vendor_id = $request->vendor_id;
        $product->tags_id =  json_encode($request->tags_id);
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->tags_id =  json_encode($request->tags_id);
        $product->vendor_id = $request->vendor_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->nbv_terms_id  = $request->nbv_terms_id;
        $product->vendor_terms_id  = $request->vendor_terms_id;
        $product->product_support_phone  = $request->product_support_phone;
        $product->product_support_email  = $request->product_support_email;
        $product->emirates_id  = $request->emirates_id;
        $product->productlocation_address = $request->productlocation_address;
        $product->productlocation_link  = $request->productlocation_link;
        $product->importantinfo  = $request->importantinfo;
        $product->validity_from  = $request->validity_from;
        $product->validity_to  = $request->validity_to;
        $product->giftable  = $request->has('giftable') ? 1 : 0;
        $product->herocarousel = $request->has('herocarousel') ? 1 : 0;
        $product->trending = $request->has('trending') ? 1 : 0;
        $product->categorycarousel = $request->has('categorycarousel') ? 1 : 0;
        $product->sales_person_id  = $request->sales_person_id;
        $product->meta_title  = $request->meta_title;
        $product->meta_description  = $request->meta_description;
        $product->og_title  = $request->og_title;
        $product->og_description  = $request->og_description;
        $product->schema  = $request->schema;
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
    public function getVendorTerms(Request $request){
        $vendor_terms = VendorTerm::where('status',1)->where('vendor_id',$request->vendor_id)->get();
        return response()->json($vendor_terms);


    }
}