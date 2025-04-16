<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Emirate;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\NavigationMenu;
use App\Models\Product;
use Illuminate\Http\Request;

class DealsController extends Controller
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
    
        return view('user.deals',compact('uppermenuItems','lowermenuitem','logo','topDestinations','informationLinks',
        'followus','payment_channels'));
    }
    
    public function getDeals() {
        
        $query = Product::with('vendor')
        ->whereHas('vendor', function ($query) {
            $query->where('status', 1);
        })
        ->where('trending',1);
        $categories = Category::where('status', 1)
        ->with(['subcategories' => function ($query) {
            $query->select('id', 'category_id', 'name');
        }])
        ->get(['id', 'name']);
        $locations = Emirate::where('status',1) ->get(['id', 'name']);
        $products = $query->get()->map(function ($product) {
            $variants = $product->variants ?? collect([]);

            $minVariant = $variants->isNotEmpty() ? $variants->sortBy('unit_price')->first() : null;
            $maxVariant = $variants->isNotEmpty() ? $variants->sortByDesc('unit_price')->first() : null;

            $minVariantPrice = $minVariant ? $minVariant->unit_price : $product->unit_price;
            $maxVariantPrice = $maxVariant ? $maxVariant->unit_price : $product->unit_price;
    
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
                    'min_variant' => $minVariant ? [
                        'id' => $minVariant->id,
                        'name' => $minVariant->title,
                        'unit_price' => $minVariant->unit_price,
                        'discounted_percentage' => $minVariant->discounted_percentage,
                        'discounted_price' => $minVariant->discounted_price ?? $minVariant->unit_price,
                    ] : null,
                    'max_variant' => $maxVariant ? [
                        'id' => $maxVariant->id,
                        'name' => $maxVariant->title,
                        'unit_price' => $maxVariant->unit_price,
                        'discounted_percentage' => $maxVariant->discounted_percentage,
                        'discounted_price' => $maxVariant->discounted_price ?? $maxVariant->unit_price,
                    ] : null,
                ],
            ];
        });
       
    
        return response()->json([
            'products' => $products,
            'categories' => $categories,
            'locations'=>$locations
        ]);
    }
}
