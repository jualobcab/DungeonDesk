<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weapon')->insert([
            [
                'equipment_id' => 1,
                'type' => 'Melee',
                'damage_die' => 8,
                'damage_type' => 'Slashing',
            ],
        ]);
    }
}