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
                'name' => 'Barbarian',
                'description' => 'Fierce warriors who harness primal rage.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Bard',
                'description' => 'Versatile spellcasters and performers who inspire allies.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Cleric',
                'description' => 'Divine spellcasters who serve a deity and heal the wounded.',
                'subclass_level' => 1
            ],
            [
                'name' => 'Druid',
                'description' => 'Nature-based spellcasters who can shapeshift into animals.',
                'subclass_level' => 2
            ],
            [
                'name' => 'Fighter',
                'description' => 'Skilled combatants with expertise in various weapons and tactics.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Paladin',
                'description' => 'Holy warriors bound by an oath to uphold justice and righteousness.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Ranger',
                'description' => 'Hunters and trackers who excel in wilderness survival and archery.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Rogue',
                'description' => 'Stealthy and cunning characters skilled in deception and thievery.',
                'subclass_level' => 3
            ],
            [
                'name' => 'Wizard',
                'description' => 'Scholarly spellcasters who study arcane magic and cast powerful spells.',
                'subclass_level' => 2
            ]
        ]);
    }
}