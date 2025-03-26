<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $subcategories = [
            // Beauty & Spas
            ['category_id' => 1, 'name' => 'Salons', 'filter_link' => 'salons', 'code' => Str::slug('Salons') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Spas', 'filter_link' => 'spas', 'code' => Str::slug('Spas') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Hair & Styling', 'filter_link' => 'hair-styling', 'code' => Str::slug('Hair & Styling') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Nails', 'filter_link' => 'nails', 'code' => Str::slug('Nails') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Face & Skin', 'filter_link' => 'face-skin', 'code' => Str::slug('Face & Skin') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Hair Removal', 'filter_link' => 'hair-removal', 'code' => Str::slug('Hair Removal') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Food & Drink
            ['category_id' => 2, 'name' => 'Restaurants', 'filter_link' => 'restaurants', 'code' => Str::slug('Restaurants') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Coffee & Treats', 'filter_link' => 'coffee-treats', 'code' => Str::slug('Coffee & Treats') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Groceries & Markets', 'filter_link' => 'groceries-markets', 'code' => Str::slug('Groceries & Markets') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Bars', 'filter_link' => 'bars', 'code' => Str::slug('Bars') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            ['category_id' => 3, 'name' => 'Kids Activities', 'filter_link' => 'kids-activities', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Sports & Outdoors', 'filter_link' => 'sports-outdoors', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Sightseeing & Tours', 'filter_link' => 'sightseeing-tours', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Fun & Leisure', 'filter_link' => 'fun-leisure', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Tickets & Events', 'filter_link' => 'tickets-events', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Personal Services
            ['category_id' => 4, 'name' => 'Classes', 'filter_link' => 'classes', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Local Services', 'filter_link' => 'local-services', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Health & Fitness
            ['category_id' => 5, 'name' => 'Sport', 'filter_link' => 'sport', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Fitness', 'filter_link' => 'fitness', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Weight Loss', 'filter_link' => 'weight-loss', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Dental', 'filter_link' => 'dental', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Automotive
            ['category_id' => 6, 'name' => 'Auto Repair', 'filter_link' => 'auto-repair', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 6, 'name' => 'Car Cleaning', 'filter_link' => 'car-cleaning', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Retail
            ['category_id' => 7, 'name' => 'Flowers, Sweets & Baskets', 'filter_link' => 'flowers-sweets-baskets', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Home & Garden', 'filter_link' => 'home-garden', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Electronics', 'filter_link' => 'electronics', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Apparel', 'filter_link' => 'apparel', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Home Services
            ['category_id' => 8, 'name' => 'Cleaning Services', 'filter_link' => 'cleaning-services', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Plumbing & Electrical', 'filter_link' => 'plumbing-electrical', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Lawn & Garden', 'filter_link' => 'lawn-garden', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Flooring', 'filter_link' => 'flooring', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Travel
            ['category_id' => 9, 'name' => 'Hotels', 'filter_link' => 'hotels', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'Packages', 'filter_link' => 'packages', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'International Packages', 'filter_link' => 'international-packages', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        
        ];

        foreach ($subcategories as $subcategory) {
            DB::table('subcategories')->updateOrInsert(
                ['category_id' => $subcategory['category_id'], 'name' => $subcategory['name']],
                $subcategory
            );
        }
    }
}
