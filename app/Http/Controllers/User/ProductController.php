<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Emirate;
use App\Models\NbvTerm;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Tags;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('user.products.index');
    }

    public function getProducts(Request $request) {
        
        $query = Product::with('vendor')
        ->whereHas('vendor', function ($query) {
            $query->where('status', 1);
        });
        $categories = Category::where('status', 1)
        ->with(['subcategories' => function ($query) {
            $query->select('id', 'category_id', 'name');
        }])
        ->get(['id', 'name']);
        $locations = Emirate::where('status',1) ->get(['id', 'name']);
        $products = $query->get()->map(function ($product) {
            $variants = $product->variants ?? collect([]);

            // Get min/max prices from variants
            $minVariantPrice = $variants->min('unit_price') ?? $product->unit_price; 
            $maxVariantPrice = $variants->max('unit_price') ?? $product->unit_price; 
    
            // Get discounted prices from variants
            $minDiscountedPrice = $variants->whereNotNull('discounted_price')->min('discounted_price') ?? $minVariantPrice;
            $maxDiscountedPrice = $variants->whereNotNull('discounted_price')->max('discounted_price') ?? $maxVariantPrice;
            $tagNames = $product->tag()->toArray();
            $tag_name = implode(', ', $tagNames); 
            return [
                'id' => $product->id,
                'name' => $product->name,
                'short_description' => $product->short_description,
                'image_url' => $product->image ? asset('storage/' . $product->image) : asset('default-image.jpg'),
                'location' => $product->emirate->name ?? 'Unknown',
                'rating' => $product->rating ?? 4.5,
                'reviews' => $product->reviews ?? 0,
                // 'distance' => $product->distance ?? 5,
                'price_range' => [
                    'min' => $minVariantPrice,
                    'max' => $maxVariantPrice,
                ],
                'discounted_price_range' => [
                    'min' => $minDiscountedPrice,
                    'max' => $maxDiscountedPrice,
                ],
                'tags' => $tag_name,
                'category' => $product->category->name ?? 'Unknown',
                'subcategory'=>$product->subcategory->name ?? 'Unknown',
                'category_id' => $product->category_id,
                'sub_category_id' => $product->sub_category_id,
                'emirates_id' => $product->emirates_id,
                'giftable' => $product->giftable,
                'productlocation_link' => $product->productlocation_link,
                'variants' => $variants->map(function ($variant) {
                    return [
                        'id' => $variant->id,
                        'name' => $variant->title,
                        'unit_price' => $variant->unit_price,
                        'discounted_percentage'=> $variant->discounted_percentage,
                        'discounted_price' => $variant->discounted_price ?? $variant->unit_price,
                    ];
                    
                })->toArray(),
            ];
        });
       
    
        return response()->json([
            'products' => $products,
            'categories' => $categories,
            'locations'=>$locations
        ]);
    }
    
    public function show($id)
    {
        $nbvterms = NbvTerm::all();
        $product = Product::findOrFail($id);
        $tagNames = $product->tag()->toArray();
        $tag_name = implode(', ', $tagNames); 
        $gallery = json_decode($product->gallery, true);
        $variants =  $product->variants; 
        return view('user.products.show', compact('product','tag_name','gallery','nbvterms','variants'));
    }
}
