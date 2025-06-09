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
            // Barbarian subclasses
            [
                'class_id' => 1,
                'name' => 'Berserker',
                'description' => 'Embraces a primal rage in battle.',
            ],
            [
                'class_id' => 1,
                'name' => 'Totem Warrior',
                'description' => 'Draws strength from animal spirits.',
            ],
            // Bard subclasses
            [
                'class_id' => 2,
                'name' => 'College of Lore',
                'description' => 'Masters of knowledge and storytelling.',
            ],
            [
                'class_id' => 2,
                'name' => 'College of Valor',
                'description' => 'Inspires courage and heroism in allies.',
            ],
            // Cleric subclasses
            [
                'class_id' => 3,
                'name' => 'Life Domain',
                'description' => 'Focuses on healing and protection.',
            ],
            [
                'class_id' => 3,
                'name' => 'Light Domain',
                'description' => 'Wields the power of light to combat darkness.',
            ],
            // Druid subclasses
            [
                'class_id' => 4,
                'name' => 'Circle of the Moon',
                'description' => 'Masters of shapeshifting and primal magic.',
            ],
            [
                'class_id' => 4,
                'name' => 'Circle of the Land',
                'description' => 'Guardians of nature with deep ties to the land.',
            ],
            // Fighter subclasses
            [
                'class_id' => 5,
                'name' => 'Champion',
                'description' => 'Focuses on physical prowess and combat skills.',
            ],
            [
                'class_id' => 5,
                'name' => 'Battle Master',
                'description' => 'Tacticians who excel in battlefield control.',
            ],
            // Paladin subclasses
            [
                'class_id' => 6,
                'name' => 'Oath of Devotion',
                'description' => 'Upholds justice and righteousness.',
            ],
            [
                'class_id' => 6,
                'name' => 'Oath of Vengeance',
                'description' => 'Seeks retribution against wrongdoers.',
            ],
            // Ranger subclasses
            [
                'class_id' => 7,
                'name' => 'Hunter',
                'description' => 'Specializes in tracking and hunting foes.',
            ],
            [
                'class_id' => 7,
                'name' => 'Beast Master',
                'description' => 'Forms a bond with a loyal animal companion.',
            ],
            // Rogue subclasses
            [
                'class_id' => 8,
                'name' => 'Thief',
                'description' => 'Masters of stealth and agility, skilled in thievery.',
            ],
            [
                'class_id' => 8,
                'name' => 'Assassin',
                'description' => 'Experts in infiltration and silent takedowns.',
            ],
            // Wizard subclasses
            [
                'class_id' => 9,
                'name' => 'School of Evocation',
                'description' => 'Focuses on powerful elemental spells.',
            ],
            [
                'class_id' => 9,
                'name' => 'School of Necromancy',
                'description' => 'Masters of life and death magic.',
            ],  
            [
                'class_id' => 9,
                'name' => 'School of Abjuration',
                'description' => 'Specializes in protective and defensive magic.',
            ]
        ]);
    }
}