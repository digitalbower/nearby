<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->insert([
            ['gender' => 'Male', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['gender' => 'Female', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
