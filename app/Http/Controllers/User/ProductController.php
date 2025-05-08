<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Emirate;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\MainSeo;
use App\Models\NavigationMenu;
use App\Models\NbvTerm;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class ProductController extends Controller
{
    public function index()
    {
        $uppermenuItems = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'upper')
        ->get(); 

        $lowermenuitem = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'lower')
        ->get();

        $logo = Logo::where('status', 1)
        ->where('type', 'header') 
        ->first(); 
        
        $topDestinations = Footer::where('type', 'Top Destination')
                              ->where('status', 1)
                              ->get();
    
        $informationLinks = Footer::where('type', 'Information')
                            ->where('status', 1)
                            ->get();

        $followus = Footer::where('type', 'Follow Us')
        ->where('status', 1)
        ->get();

        $payment_channels = Footer::where('type', 'payment_channels')
        ->where('status', 1)
        ->get();    
        $currentPath = request()->path(); 
        $seo = MainSeo::where('page_url', $currentPath)->first()
        ?? MainSeo::where('page_url', 'default')->first();
        return view('user.products.index',compact('seo','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels'));
    }

    public function getProducts() {

        $today = Carbon::today();

        $query = Product::with('vendor')
        ->whereHas('vendor', function ($q) use ($today) {
            $q->where('status', 1)
              ->whereDate('validityfrom', '<=', $today)
              ->whereDate('validityto', '>=', $today);
        })
        ->whereDate('validity_from', '<=', $today)
        ->whereDate('validity_to', '>=', $today);

        $categories = Category::where('status', 1)
        ->with(['subcategories' => function ($query) {
            $query->select('id', 'category_id', 'name');
        }])
        ->get(['id', 'name']);
        $locations = Emirate::where('status',1) ->get(['id', 'name']);
        $products = $query->get()->map(function ($product) use ($today) {
            $variants = ($product->variants ?? collect([]))->filter(function ($variant) use ($today) {
                return 
                       Carbon::parse($variant->validity_from)->lte($today) &&
                       Carbon::parse($variant->validity_to)->gte($today);
            });
        
            if ($variants->isEmpty()) {
                return null;
            }
        
            $minVariant = $variants->sortBy('unit_price')->first();
            $maxVariant = $variants->sortByDesc('unit_price')->first();
        
            $minVariantPrice = $minVariant->unit_price;
            $maxVariantPrice = $maxVariant->unit_price;
    
            // Get min and max discounted prices from variants
            $minDiscountedVariant = $variants->whereNotNull('discounted_price')->sortBy('discounted_price')->first();
            $maxDiscountedVariant = $variants->whereNotNull('discounted_price')->sortByDesc('discounted_price')->first();
    
            // If discounted prices exist, use the min and max discounted prices, otherwise fall back to unit prices
            $minDiscountedPrice = $minDiscountedVariant ? $minDiscountedVariant->discounted_price : $minVariantPrice;
            $maxDiscountedPrice = $maxDiscountedVariant ? $maxDiscountedVariant->discounted_price : $maxVariantPrice;
            $tagNames = $product->tag()->toArray();
            $tag_name = implode(', ', $tagNames); 
            $reviews = $product->reviews;
            $totalRatings = $reviews->sum('review_rating');
            $totalReviews = $reviews->count();
            $averageRating = $totalReviews > 0 ? $totalRatings / $totalReviews : 0;
            $averageRating = number_format($averageRating, 1);
            return [
                'id' => $product->id,
                'slug' => $product->slug,
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
                'variants' => [
                    'min_variant' => [
                        'id' => $minVariant->id,
                        'name' => $minVariant->title,
                        'unit_price' => $minVariant->unit_price,
                        'discounted_percentage' => $minVariant->discounted_percentage,
                        'discounted_price' => $minVariant->discounted_price ?? $minVariant->unit_price,
                    ],
                    'max_variant' => [
                        'id' => $maxVariant->id,
                        'name' => $maxVariant->title,
                        'unit_price' => $maxVariant->unit_price,
                        'discounted_percentage' => $maxVariant->discounted_percentage,
                        'discounted_price' => $maxVariant->discounted_price ?? $maxVariant->unit_price,
                    ],
                ],
            ];
        })->filter(); 
    
        return response()->json([
            'products' => $products->filter()->values(),
            'categories' => $categories,
            'locations'=>$locations
        ]);
    }
    
    public function show($slug)
    { 
        $uppermenuItems = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'upper')
        ->get(); 

        $lowermenuitem = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'lower')
        ->get();

        $logo = Logo::where('status', 1)
        ->where('type', 'header') 
        ->first(); 
        
        $topDestinations = Footer::where('type', 'Top Destination')
                              ->where('status', 1)
                              ->get();
    
        $informationLinks = Footer::where('type', 'Information')
                            ->where('status', 1)
                            ->get();

        $followus = Footer::where('type', 'Follow Us')
        ->where('status', 1)
        ->get();

        $payment_channels = Footer::where('type', 'payment_channels')
        ->where('status', 1)
        ->get();    
        $nbvterms = NbvTerm::all();
        $currentPath = request()->path();  
        $slug = str_replace('products/', '', $currentPath);
        $slug = trim($slug, '/');
        $seo = Product::where('slug', $slug)->first();
        $product = Product::where('slug',$slug)->first(); 
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

        $user = Auth::user();
        $unit_type = $product->category->categoryType->unitType->unit_type;
        // $variantsWithType = $variants->map(function ($variant) {
        //     $typeName = $variant->types ? $variant->types->name : 'No Type Available';
        //     $variant->product_type = $typeName;
        //     return $variant;
        // });
        return view('user.products.show', compact('seo','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels','product','tag_name','gallery','nbvterms','variants','reviews',
        'totalReviews','averageRating','percentages','unit_type','user'));
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
    
        return response()->json([
            'status' => 'success',
            'message' => 'Review added successfully!'
        ]);    }
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

        $filteredVariants = collect($request->input('variants', []))
        ->filter(function ($item) {
            return isset($item['quantity']) && (int) $item['quantity'] > 0;
        })
        ->toArray();

        $request->merge(['variants' => $filteredVariants]);

        $request->validate([
            'variants' => 'required|array|min:1', 
            'variants.*.product_variant_id' => 'required|exists:product_variants,id',
            'variants.*.quantity' => 'required|integer|min:1', 
        ],
        [
            'variants.*.quantity.required' => 'Add quantity', 
            'variants.*.quantity.min' => 'Add quantity with minimum value 1', 
        ]);
        foreach ($request->variants as $variant) {
            $cart = Cart::where('product_variant_id',$variant['product_variant_id'])
                        ->where('user_id', Auth::id())
                        ->first(); 
            if($cart == null){
                Cart::create([
                    'product_variant_id' => $variant['product_variant_id'],
                    'quantity' => $variant['quantity'],
                    'user_id' => Auth::user()->id, 
                ]);
            
            }
            else{
                $cart->quantity = $variant['quantity'];
                $cart->save();
            }
         
        }
        if ($request->input('redirect_to_cart') == "1") {
            return redirect()->route('user.cart');
        }
        return redirect('cart')->with('success', 'Added to cart successfully!');
    }



    public function cart()
    {
        $uppermenuItems = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'upper')
        ->get(); 

        $lowermenuitem = NavigationMenu::where('active', 1)
        ->where('navigation_placement', 'lower')
        ->get();

        $logo = Logo::where('status', 1)
        ->where('type', 'header') 
        ->first(); 
        
        $topDestinations = Footer::where('type', 'Top Destination')
                              ->where('status', 1)
                              ->get();
    
        $informationLinks = Footer::where('type', 'Information')
                            ->where('status', 1)
                            ->get();

        $followus = Footer::where('type', 'Follow Us')
        ->where('status', 1)
        ->get();

        $payment_channels = Footer::where('type', 'payment_channels')
        ->where('status', 1)
        ->get();    
       
        $userId = Auth::id();
        
        $currentPath = request()->path(); 
        $seo = MainSeo::where('page_url', $currentPath)->first()
        ?? MainSeo::where('page_url', 'default')->first();  

        $cartItems = Cart::with('productVariant.checkout')->where('user_id', $userId)->get();

    $totalQuantity = 0;
    $totalAmount = 0;
    $totalDays = 0;
    $total = 0;
    $start = null;
    $end = null;

    // Use first variant only for demo of time calculations
    $firstVariant = $cartItems->first()?->productVariant;

    if ($firstVariant && $firstVariant->timer_start_time && $firstVariant->timer_end_time) {
        $start = Carbon::parse($firstVariant->timer_start_time);
        $end = Carbon::parse($firstVariant->timer_end_time);
        $totalDays = $start->diffInDays($end);
    }

    // Calculate total amount from all items
    foreach ($cartItems as $item) {
        $quantity = $item->quantity ?? 1;
        $price = $item->productVariant?->discounted_price ?? $item->productVariant?->unit_price ?? 0;
        $totalQuantity += $quantity;
        $totalAmount += ($price * $quantity);
    }
        
       
        
        
       return view('user.cart', compact('seo','uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
       'followus','payment_channels','cartItems', 'totalAmount', 'totalQuantity','totalDays','end','total'));
    }
    public function updateCart(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
    
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]); 
        $cart = Cart::find($id);
        if ($cart) {
            $cart->quantity =$quantity;
            $cart->save();
            return response()->json(['success' => true, 'message' => 'Cart item quantity updated.']);
        }
        else {
            return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
        }
    }
    public function destroy(Request $request)
    { 
        $item = Cart::find($request->id); 
        if ($item) {
            $item->delete();
            return response()->json(['success' => true, 'message' => 'Cart item removed.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
        }
    }
}
