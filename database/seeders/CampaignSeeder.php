<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campaign')->insert([
            [
                'id_user' => 1,
                'name' => 'Curse of the Forgotten',
                'description' => 'A tale of lost cities.'
            ],
            [
                'id_user' => 2,
                'name' => 'The Northern Wars',
                'description' => 'A war-torn land in need of heroes.'
            ],
            [
                'id_user' => 1,
                'name' => 'Mysteries of the Deep',
                'description' => 'An oceanic expedition full of secrets.'
            ]
        ]);
    }
}