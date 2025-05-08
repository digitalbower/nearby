<?php

namespace Database\Seeders;

use App\Models\MainSeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainSeo::updateOrCreate(
            ['page_url' => 'default'], 
            [
                'meta_title' => 'Default',
                'meta_description' => 'Default', 
            ]
        );
    }
}
