<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Beauty & Spas',
                'filter_link' => 'beauty-spas',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Food & Drink',
                'filter_link' => 'food-drink',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Things To Do',
                'filter_link' => 'things-to-do',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Personal Services',
                'filter_link' => 'personal-services',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Health & Fitness',
                'filter_link' => 'health-fitness',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Automotive',
                'filter_link' => 'automotive',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Retail',
                'filter_link' => 'retail',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Home Services',
                'filter_link' => 'home-services',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Travel',
                'filter_link' => 'travel',
                'code' => Str::random(10),
                'status' => 1,
                'show_on_home' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['name' => $category['name']], // Condition to check
                $category
            );
        }
    }
}
