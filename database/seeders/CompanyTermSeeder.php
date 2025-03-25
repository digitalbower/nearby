<?php

namespace Database\Seeders;

use App\Models\CompanyTerm;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanyTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        CompanyTerm::updateOrCreate([
            'terms' => $faker->paragraph,
        ]);
    }
}
