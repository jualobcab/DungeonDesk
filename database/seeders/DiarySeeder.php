<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diary')->insert([
            [
                'id_character' => 1,
                'id_campaign' => 1,
                'entry' => 'We found an old ruin.',
                'date' => '2025-04-01'
            ],
            [
                'id_character' => 1,
                'id_campaign' => 1,
                'entry' => 'Encountered undead in the jungle.',
                'date' => '2025-04-02'
            ],
            [
                'id_character' => 2,
                'id_campaign' => 1,
                'entry' => 'Spoke with a spirit guardian.',
                'date' => '2025-04-03'
            ],
        ]);
    }
}