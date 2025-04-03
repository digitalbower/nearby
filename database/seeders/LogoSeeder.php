<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Logo;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Logo::insert([
            ['logo' => 'logos/company1.png', 'link' => 'https://company1.com', 'type' => 'HEADER', 'status' => 1],
            
        ]);
    }

}
