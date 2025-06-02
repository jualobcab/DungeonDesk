<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class C_EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_Equipment')->insert([
            [
                'equipment_id' => 1,
                'id_character' => 1,
                'quantity' => 1,
            ],
            [
                'equipment_id' => 2,
                'id_character' => 2,
                'quantity' => 1,
            ],
            [
                'equipment_id' => 3,
                'id_character' => 1,
                'quantity' => 1,
            ],
        ]);
    }
}