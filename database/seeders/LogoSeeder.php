<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logos')->insert([
            'logo_image' => null, // No logo uploaded initially
            'logo_fallback' => 'logos/default-logo.png', // Default logo path
            'preview_image' => 'logos/default-preview.png', // Preview image
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
