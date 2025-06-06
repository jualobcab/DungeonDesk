<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classInfo')->insert([
            [
                'name' => 'Wizard',
                'description' => 'Masters of arcane magic.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Fighter',
                'description' => 'Combat experts with versatile styles.',
                'subclass_level' => 1
            ],
        ]);
    }
}