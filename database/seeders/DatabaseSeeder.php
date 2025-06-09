<?php

namespace Database\Seeders;

use App\Models\Artifact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            CharactersSeeder::class,
            CampaignSeeder::class,
            C_MembersSeeder::class,
            DiarySeeder::class,
            ClassInfoSeeder::class,
            SubclassSeeder::class,
            C_ClassesSeeder::class,
            FeatureSeeder::class,
            ClassFeatureSeeder::class,
            SubclassFeatureSeeder::class,
            EquipmentSeeder::class,
            C_EquipmentSeeder::class,
            ArmorSeeder::class,
            WeaponSeeder::class,
            ArtifactSeeder::class
        ]);
    }
}
