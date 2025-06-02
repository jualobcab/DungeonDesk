<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment')->insert([
            [
                'name' => 'Longsword',
                'rarity' => 'Common',
                'description' => 'A standard sword for warriors.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Chainmail',
                'rarity' => 'Uncommon',
                'description' => 'Protective armor made of interlocking rings.',
                'type' => 'armor',
            ],
            [
                'name' => 'Orb of Power',
                'rarity' => 'Rare',
                'description' => 'A magical artifact of immense power.',
                'type' => 'artifact',
            ],
        ]);
    }
}