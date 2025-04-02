<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitTypes = [
            ['unit_type' => 'Per Person', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['unit_type' => 'Per Night', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['unit_type' => 'Per Day', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        
        foreach ($unitTypes as $unitType) {
            DB::table('unit_types')->updateOrInsert(
                ['unit_type' => $unitType['unit_type']], // Condition to check
                $unitType
            );
        }
    }
}
