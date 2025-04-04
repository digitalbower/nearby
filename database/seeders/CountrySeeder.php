<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['country' => 'United States', 'country_code' => 'US', 'status' => 1],
            ['country' => 'Canada', 'country_code' => 'CA', 'status' => 1],
            ['country' => 'United Kingdom', 'country_code' => 'GB', 'status' => 1],
            ['country' => 'India', 'country_code' => 'IN', 'status' => 1],
            ['country' => 'Australia', 'country_code' => 'AU', 'status' => 1],
            ['country' => 'United Arab Emirates', 'country_code' => 'AE', 'status' => 1],
            ['country' => 'Germany', 'country_code' => 'DE', 'status' => 1],
            ['country' => 'France', 'country_code' => 'FR', 'status' => 1],
            ['country' => 'China', 'country_code' => 'CN', 'status' => 1],
            ['country' => 'Japan', 'country_code' => 'JP', 'status' => 1],
        ];

        foreach ($countries as &$country) {
            $country['created_at'] = now();
            $country['updated_at'] = now();
        }

        DB::table('countries')->insert($countries);
    
    }
}
