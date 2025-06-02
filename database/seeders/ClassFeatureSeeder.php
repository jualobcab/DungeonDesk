<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ClassFeature')->insert([
            [
                'feature_id' => 1,
                'class_id' => 1,
                'level' => 1,
            ],
            [
                'feature_id' => 2,
                'class_id' => 2,
                'level' => 2,
            ],
        ]);
    }
}