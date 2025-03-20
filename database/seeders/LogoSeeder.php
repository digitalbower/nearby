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
            [
                'title' => 'Company A',
                'image' => 'logos/company_a.png', // Ensure you place an image in storage
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
