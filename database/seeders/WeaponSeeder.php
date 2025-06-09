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
                'equipment_id' => 13,
                'type' => 'Melee',
                'damage_die' => '1d8',
                'damage_type' => 'Slashing',
            ],
            [
                'equipment_id' => 14,
                'type' => 'Melee',
                'damage_die' => '1d4',
                'damage_type' => 'Piercing',
            ],
            [
                'equipment_id' => 15,
                'type' => 'Melee',
                'damage_die' => '1d6',
                'damage_type' => 'Piercing',
            ],
            [
                'equipment_id' => 16,
                'type' => 'Ranged',
                'damage_die' => '1d8',
                'damage_type' => 'Piercing',
            ],
            [
                'equipment_id' => 17,
                'type' => 'Melee',
                'damage_die' => '2d6',
                'damage_type' => 'Slashing',
            ],
            [
                'equipment_id' => 18,
                'type' => 'Melee',
                'damage_die' => '1d8',
                'damage_type' => 'Bludgeoning',
            ],
            [
                'equipment_id' => 19,
                'type' => 'Melee',
                'damage_die' => '1d8',
                'damage_type' => 'Slashing',
            ],
            [
                'equipment_id' => 20,
                'type' => 'Ranged',
                'damage_die' => '1d8',
                'damage_type' => 'Piercing',
            ],
            [
                'equipment_id' => 21,
                'type' => 'Melee',
                'damage_die' => '1d6',
                'damage_type' => 'Piercing',
            ],
            [
                'equipment_id' => 22,
                'type' => 'Melee',
                'damage_die' => '1d10',
                'damage_type' => 'Slashing',
            ],
            [
                'equipment_id' => 23,
                'type' => 'Melee',
                'damage_die' => '1d8',
                'damage_type' => 'Bludgeoning',
            ]
        ]);
    }
}