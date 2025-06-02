<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class C_MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_Members')->insert([
            ['id_character' => 1, 'id_campaign' => 1],
            ['id_character' => 2, 'id_campaign' => 1],
            ['id_character' => 3, 'id_campaign' => 2],
        ]);
    }
}