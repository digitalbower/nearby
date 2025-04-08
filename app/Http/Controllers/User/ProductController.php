<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Emirate;
use App\Models\NbvTerm;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('user.products.index');
    }

    public function getProducts() {
        
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
            $reviews = $product->reviews;
            $totalRatings = $reviews->sum('review_rating');
            $totalReviews = $reviews->count();
            $averageRating = $totalReviews > 0 ? $totalRatings / $totalReviews : 0;
            $averageRating = number_format($averageRating, 1);
            return [
                'id' => $product->id,
                'name' => $product->name,
                'short_description' => $product->short_description,
                'image_url' => $product->image ? asset('storage/' . $product->image) : asset('default-image.jpg'),
                'location' => $product->emirate->name ?? 'Unknown',
                'rating' => $averageRating ?? 0,
                'total_reviews' => $totalReviews,
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
        $reviews =  $product->reviews; 
        $totalRatings = $reviews->sum('review_rating');
        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? $totalRatings / $totalReviews : 0;
        $averageRating = number_format($averageRating, 1);
        $ratingCounts = [
            5 => $reviews->where('review_rating', 5)->count(),
            4 => $reviews->where('review_rating', 4)->count(),
            3 => $reviews->where('review_rating', 3)->count(),
            2 => $reviews->where('review_rating', 2)->count(),
            1 => $reviews->where('review_rating', 1)->count(),
        ];

        $percentages = [];
        foreach ($ratingCounts as $rating => $count) {
            $percentages[$rating] = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
        }

        $variants =  $product->variants; 

        $variantsWithType = $variants->map(function ($variant) {
            $typeName = $variant->types ? $variant->types->name : 'No Type Available';
            $variant->product_type = $typeName;
            $cart = $variant->cart ? $variant->cart : null; 
            $variant->quantity =  $cart  ? $cart->quantity : '0';
            return $variant;
        });
        return view('user.products.show', compact('product','tag_name','gallery','nbvterms','variants','reviews',
        'totalReviews','averageRating','percentages','variantsWithType'));
    }
    public function storeReview(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review_title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', 
            'review_rating' => 'required|integer|between:1,5',
            'review_description' => 'required|string',
        ]);
    
        Review::create($request->all());
    
        return response()->json(['message' => 'Review added successfully!']);
    }
    public function showReview($product_id){
        $reviews = Review::where('product_id', $product_id)
        ->where('status', 1)
        ->get()
        ->map(function ($review) {
            $review->formatted_date = $review->created_at->format('F j, Y'); 
            return $review;
        });        
        return response()->json($reviews);
    }
    public function addCart(Request $request){

        $request->validate([
            'user_id' => 'required|exists:users,id', 
            'variants' => 'required|array',
            'variants.*.product_variant_id' => 'required|exists:product_variants,id',
            'variants.*.quantity' => 'required|integer|min:1', 
        ],
        [
            'variants.*.quantity.required' => 'Add quantity', 
            'variants.*.quantity.min' => 'Add quantity with minimum value 1', 
        ]);
        foreach ($request->variants as $variant) {
            $cart = Cart::where('product_variant_id',$variant['product_variant_id'])->first(); 
            if($cart == null){
                Cart::create([
                    'product_variant_id' => $variant['product_variant_id'],
                    'quantity' => $variant['quantity'],
                    'user_id' => $request->user_id, 
                ]);
            
            }
            else{
                $cart->quantity = $variant['quantity'];
                $cart->save();
            }
         
        }
    
        return redirect()->back()->with('success', 'New Promo code created successfully!');
    }
}
