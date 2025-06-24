<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogHeaderFooter;

class BlogHeaderFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogHeaderFooter::create([
            'main_title' => 'Welcome to Our Blog',
            'description' => 'This is the initial blog header and footer setup.',
            'button_text' => 'Learn More',
            'button_link' => 'https://example.com',
            'button_hide' => false,
            'logo' => null,
            'main_image' => null,
        ]);
    }
}
