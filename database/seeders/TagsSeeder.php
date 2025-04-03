<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['tags' => 'Popular','status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['tags' => 'Black Friday','status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        
        foreach ($tags as $tag) {
            DB::table('tags')->updateOrInsert(
                ['tags' => $tag['tags']], 
                $tag
            );
        }
    }
}
