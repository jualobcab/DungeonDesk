<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feature')->insert([
            [
                'name' => 'Spellcasting',
                'description' => 'Can cast spells from the class list.',
            ],
            [
                'name' => 'Second Wind',
                'description' => 'Regain health in battle.',
            ],
        ]);
    }
}