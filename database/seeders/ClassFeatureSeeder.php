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
            // Barbarian features
            ['feature_id' => 1, 'class_id' => 1, 'level' => 1], // Rage
            ['feature_id' => 2, 'class_id' => 1, 'level' => 1], // Unarmored Defense
            ['feature_id' => 3, 'class_id' => 1, 'level' => 2], // Reckless Attack
            ['feature_id' => 4, 'class_id' => 1, 'level' => 5], // Extra Attack
            ['feature_id' => 5, 'class_id' => 1, 'level' => 7], // Feral Instinct
            ['feature_id' => 6, 'class_id' => 1, 'level' => 9], // Brutal Critical
            ['feature_id' => 7, 'class_id' => 1, 'level' => 11], // Relentless Rage
            ['feature_id' => 8, 'class_id' => 1, 'level' => 15], // Persistent Rage
            ['feature_id' => 9, 'class_id' => 1, 'level' => 18], // Indomitable Might
            ['feature_id' => 10, 'class_id' => 1, 'level' => 20], // Primal Champion

            // Bard features
            ['feature_id' => 11, 'class_id' => 2, 'level' => 1], // Spellcasting
            ['feature_id' => 12, 'class_id' => 2, 'level' => 1], // Bardic Inspiration
            ['feature_id' => 13, 'class_id' => 2, 'level' => 2], // Jack of All Trades
            ['feature_id' => 14, 'class_id' => 2, 'level' => 3], // Expertise
            ['feature_id' => 15, 'class_id' => 2, 'level' => 5], // Font of Inspiration
            ['feature_id' => 16, 'class_id' => 2, 'level' => 10], // Magical Secrets
            ['feature_id' => 17, 'class_id' => 2, 'level' => 20], // Superior Inspiration

            // Cleric features
            ['feature_id' => 18, 'class_id' => 3, 'level' => 1], // Spellcasting
            ['feature_id' => 19, 'class_id' => 3, 'level' => 2], // Channel Divinity
            ['feature_id' => 20, 'class_id' => 3, 'level' => 5], // Destroy Undead
            ['feature_id' => 21, 'class_id' => 3, 'level' => 10], // Divine Intervention

            // Druid features
            ['feature_id' => 22, 'class_id' => 4, 'level' => 1], // Spellcasting
            ['feature_id' => 23, 'class_id' => 4, 'level' => 2], // Wild Shape
            ['feature_id' => 24, 'class_id' => 4, 'level' => 18], // Timeless Body
            ['feature_id' => 25, 'class_id' => 4, 'level' => 18], // Beast Spells
            ['feature_id' => 26, 'class_id' => 4, 'level' => 20], // Archdruid

            // Fighter features
            ['feature_id' => 27, 'class_id' => 5, 'level' => 1], // Fighting Style
            ['feature_id' => 28, 'class_id' => 5, 'level' => 1], // Second Wind
            ['feature_id' => 29, 'class_id' => 5, 'level' => 2], // Action Surge
            ['feature_id' => 4, 'class_id' => 5, 'level' => 5], // Extra Attack
            ['feature_id' => 30, 'class_id' => 5, 'level' => 9], // Indomitable

            // Paladin features
            ['feature_id' => 31, 'class_id' => 6, 'level' => 1], // Lay on Hands
            ['feature_id' => 27, 'class_id' => 6, 'level' => 2], // Fighting Style
            ['feature_id' => 32, 'class_id' => 6, 'level' => 2], // Spellcasting
            ['feature_id' => 33, 'class_id' => 6, 'level' => 2], // Divine Smite
            ['feature_id' => 34, 'class_id' => 6, 'level' => 3], // Divine Health
            ['feature_id' => 4, 'class_id' => 6, 'level' => 5], // Extra Attack
            ['feature_id' => 35, 'class_id' => 6, 'level' => 6], // Aura of Protection
            ['feature_id' => 36, 'class_id' => 6, 'level' => 10], // Aura of Courage
            ['feature_id' => 37, 'class_id' => 6, 'level' => 14], // Cleansing Touch

            // Ranger features
            ['feature_id' => 38, 'class_id' => 7, 'level' => 1], // Natural Explorer
            ['feature_id' => 27, 'class_id' => 7, 'level' => 2], // Fighting Style
            ['feature_id' => 39, 'class_id' => 7, 'level' => 2], // Spellcasting
            ['feature_id' => 4, 'class_id' => 7, 'level' => 1], // Extra Attack
            ['feature_id' => 40, 'class_id' => 7, 'level' => 8], // Land's Stride
            ['feature_id' => 41, 'class_id' => 7, 'level' => 14], // Vanish
            ['feature_id' => 42, 'class_id' => 7, 'level' => 18], // Feral Senses
            ['feature_id' => 43, 'class_id' => 7, 'level' => 20], // Foe Slayer

            // Rogue features
            ['feature_id' => 14, 'class_id' => 8, 'level' => 1], // Expertise
            ['feature_id' => 44, 'class_id' => 8, 'level' => 1], // Sneak Attack
            ['feature_id' => 45, 'class_id' => 8, 'level' => 2], // Cunning Action
            ['feature_id' => 46, 'class_id' => 8, 'level' => 5], // Uncanny Dodge
            ['feature_id' => 47, 'class_id' => 8, 'level' => 7], // Evasion
            ['feature_id' => 48, 'class_id' => 8, 'level' => 14], // Blindsense
            ['feature_id' => 49, 'class_id' => 8, 'level' => 15], // Slipery Mind
            ['feature_id' => 50, 'class_id' => 8, 'level' => 18], // Elusive
            ['feature_id' => 51, 'class_id' => 8, 'level' => 20], // Stroke of Luck

            // Wizard features
            ['feature_id' => 52, 'class_id' => 9, 'level' => 1], // Spellcasting
            ['feature_id' => 53, 'class_id' => 9, 'level' => 1], // Arcane Recovery
            ['feature_id' => 54, 'class_id' => 9, 'level' => 18], // Spell Mastery
            ['feature_id' => 55, 'class_id' => 9, 'level' => 20], // Signature Spells
        ]);
    }
}