<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtifactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artifact')->insert([
            [
                'equipment_id' => 24,
                'type' => 'Wondrous item',
            ],
            [
                'equipment_id' => 25,
                'type' => 'Wondrous item',
            ],
            [
                'equipment_id' => 26,
                'type' => 'Wondrous item',
            ],
            [
                'equipment_id' => 27,
                'type' => 'Magic Focus',
            ],
            [
                'equipment_id' => 28,
                'type' => 'Wondrous item',
            ],
            [
                'equipment_id' => 29,
                'type' => 'Wondrous item',
            ],
            [
                'equipment_id' => 30,
                'type' => 'Wondrous item',
            ],
            [
                'equipment_id' => 31,
                'type' => 'Wondrous item',
            ]
        ]);
    }
}