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
            ['category_id' => 1, 'name' => 'Salons',  'code' => Str::slug('Salons') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Spas',  'code' => Str::slug('Spas') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Hair & Styling',  'code' => Str::slug('Hair & Styling') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Nails', 'code' => Str::slug('Nails') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Face & Skin',  'code' => Str::slug('Face & Skin') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Hair Removal',  'code' => Str::slug('Hair Removal') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Food & Drink
            ['category_id' => 2, 'name' => 'Restaurants',  'code' => Str::slug('Restaurants') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Coffee & Treats', 'code' => Str::slug('Coffee & Treats') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Groceries & Markets',  'code' => Str::slug('Groceries & Markets') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Bars', 'code' => Str::slug('Bars') . '-' . Str::random(5), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            ['category_id' => 3, 'name' => 'Kids Activities',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Sports & Outdoors', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Sightseeing & Tours',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Fun & Leisure',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Tickets & Events',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Personal Services
            ['category_id' => 4, 'name' => 'Classes',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Local Services',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Health & Fitness
            ['category_id' => 5, 'name' => 'Sport', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Fitness',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Weight Loss',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Dental',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Automotive
            ['category_id' => 6, 'name' => 'Auto Repair',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 6, 'name' => 'Car Cleaning',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Retail
            ['category_id' => 7, 'name' => 'Flowers, Sweets & Baskets',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Home & Garden',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Electronics',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Apparel',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Home Services
            ['category_id' => 8, 'name' => 'Cleaning Services',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Plumbing & Electrical',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Lawn & Garden',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Flooring',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Travel
            ['category_id' => 9, 'name' => 'Hotels',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'Packages', 'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'International Packages',  'code' => Str::random(10), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        
        ];

        foreach ($subcategories as $subcategory) {
            DB::table('subcategories')->updateOrInsert(
                ['category_id' => $subcategory['category_id'], 'name' => $subcategory['name']],
                $subcategory
            );
        }
    }
}
