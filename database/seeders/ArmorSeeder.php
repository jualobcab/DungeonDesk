<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('armor')->insert([
            // Light Armor
            [
                'equipment_id' => 1,
                'type' => 'Light',
                'armor_class' => 11,
            ],
            [
                'equipment_id' => 2,
                'type' => 'Light',
                'armor_class' => 11,
            ],
            [
                'equipment_id' => 3,
                'type' => 'Light',
                'armor_class' => 12,
            ],

            // Medium Armor
            [
                'equipment_id' => 4,
                'type' => 'Medium',
                'armor_class' => 12,
            ],
            [
                'equipment_id' => 5,
                'type' => 'Medium',
                'armor_class' => 13,
            ],
            [
                'equipment_id' => 6,
                'type' => 'Medium',
                'armor_class' => 14,
            ],
            [
                'equipment_id' => 7,
                'type' => 'Medium',
                'armor_class' => 14,
            ],
            [
                'equipment_id' => 8,
                'type' => 'Medium',
                'armor_class' => 15,
            ],

            // Heavy Armor
            [
                'equipment_id' => 9,
                'type' => 'Heavy',
                'armor_class' => 14,
            ],
            [
                'equipment_id' => 10,
                'type' => 'Heavy',
                'armor_class' => 16,
            ],
            [
                'equipment_id' => 11,
                'type' => 'Heavy',
                'armor_class' => 17,
            ],
            [
                'equipment_id' => 12,
                'type' => 'Heavy',
                'armor_class' => 18,
            ],
        ]);
    }
}