<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class C_ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_Classes')->insert([
            [
                'class_id' => 9,
                'id_character' => 1,
                'subclass_id' => 17,
                'level' => 3
            ],
            [
                'class_id' => 5,
                'id_character' => 1,
                'subclass_id' => null,
                'level' => 2
            ],
            [
                'class_id' => 3,
                'id_character' => 2,
                'subclass_id' => 5,
                'level' => 3
            ],
            [
                'class_id' => 1,
                'id_character' => 3,
                'subclass_id' => 1,
                'level' => 2
            ]
        ]);
    }
}