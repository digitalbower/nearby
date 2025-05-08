<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmiratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emirates = [
            ['name' => 'All over UAE', 'code' => 'UAE'],
            ['name' => 'Abu Dhabi', 'code' => 'AUH'],
            ['name' => 'Dubai', 'code' => 'DXB'],
            ['name' => 'Sharjah', 'code' => 'SHJ'],
            ['name' => 'Ajman', 'code' => 'AJM'],
            ['name' => 'Umm Al Quwain', 'code' => 'UAQ'],
            ['name' => 'Ras Al Khaimah', 'code' => 'RAK'],
            ['name' => 'Fujairah', 'code' => 'FUJ'],
        ];

        foreach ($emirates as $emirate) {
            DB::table('emirates')->updateOrInsert(
                ['code' => $emirate['code']],
                ['name' => $emirate['name']]
            );
        }
    
    }
}
