<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('characters')->insert([
            [
                'id_user' => 2,
                'name' => 'Thalion',
                'level' => 5,
                'biography' => 'A mysterious wizard.'
            ],
            [
                'id_user' => 3,
                'name' => 'Durnan',
                'level' => 3,
                'biography' => 'A human cleric in training.'
            ],
            [
                'id_user' => 2,
                'name' => 'Nyssa',
                'level' => 2,
                'biography' => 'An elven ranger who comes from the north.'
            ]
        ]);
    }
}