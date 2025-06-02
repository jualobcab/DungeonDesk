<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subclass')->insert([
            [
                'class_id' => 1,
                'name' => 'Evoker',
                'description' => 'Focused on powerful elemental spells.',
            ],
            [
                'class_id' => 2,
                'name' => 'Champion',
                'description' => 'Excels in raw physical power.',
            ],
        ]);
    }
}