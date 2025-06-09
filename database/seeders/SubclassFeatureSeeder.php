<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubclassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subclassfeature')->insert([
            // Berserker (Barbarian)
            ['feature_id' => 56, 'subclass_id' => 1, 'level' => 3],  // Frenzy
            ['feature_id' => 57, 'subclass_id' => 1, 'level' => 6],  // Mindless Rage
            ['feature_id' => 58, 'subclass_id' => 1, 'level' => 10], // Intimidating Presence
            ['feature_id' => 59, 'subclass_id' => 1, 'level' => 14], // Retaliation

            // Totem Warrior (Barbarian)
            ['feature_id' => 60, 'subclass_id' => 2, 'level' => 3],  // Spirit Seeker
            ['feature_id' => 61, 'subclass_id' => 2, 'level' => 3],  // Totem Spirit
            ['feature_id' => 62, 'subclass_id' => 2, 'level' => 6],  // Aspect of the Beast
            ['feature_id' => 63, 'subclass_id' => 2, 'level' => 10], // Spirit Walker
            ['feature_id' => 64, 'subclass_id' => 2, 'level' => 14], // Totemic Attunement

            // College of Lore (Bard)
            ['feature_id' => 65, 'subclass_id' => 3, 'level' => 3],  // Bonus Proficiencies
            ['feature_id' => 66, 'subclass_id' => 3, 'level' => 3],  // Cutting Words
            ['feature_id' => 67, 'subclass_id' => 3, 'level' => 6],  // Additional Magical Secrets
            ['feature_id' => 68, 'subclass_id' => 3, 'level' => 14], // Peerless Skill

            // College of Valor (Bard)
            ['feature_id' => 69, 'subclass_id' => 4, 'level' => 3],  // Bonus Proficiencies
            ['feature_id' => 70, 'subclass_id' => 4, 'level' => 3],  // Combat Inspiration
            ['feature_id' => 4,  'subclass_id' => 4, 'level' => 6],  // Extra Attack (ya existe en features)
            ['feature_id' => 71, 'subclass_id' => 4, 'level' => 14], // Battle Magic

            // Life Domain (Cleric)
            ['feature_id' => 72, 'subclass_id' => 5, 'level' => 1],  // Disciple of Life
            ['feature_id' => 73, 'subclass_id' => 5, 'level' => 2],  // Channel Divinity: Preserve Life
            ['feature_id' => 74, 'subclass_id' => 5, 'level' => 6],  // Blessed Healer
            ['feature_id' => 75, 'subclass_id' => 5, 'level' => 8],  // Divine Strike
            ['feature_id' => 76, 'subclass_id' => 5, 'level' => 17], // Supreme Healing

            // Light Domain (Cleric)
            ['feature_id' => 77, 'subclass_id' => 6, 'level' => 1],  // Warding Flare
            ['feature_id' => 78, 'subclass_id' => 6, 'level' => 2],  // Channel Divinity: Radiance of the Dawn
            ['feature_id' => 79, 'subclass_id' => 6, 'level' => 6],  // Improved Flare
            ['feature_id' => 80, 'subclass_id' => 6, 'level' => 8],  // Corona of Light
            ['feature_id' => 81, 'subclass_id' => 6, 'level' => 17], // Sunburst

            // Circle of the Moon (Druid)
            ['feature_id' => 82, 'subclass_id' => 7, 'level' => 2],  // Combat Wild Shape
            ['feature_id' => 83, 'subclass_id' => 7, 'level' => 2],  // Circle Forms
            ['feature_id' => 84, 'subclass_id' => 7, 'level' => 6],  // Primal Strike
            ['feature_id' => 85, 'subclass_id' => 7, 'level' => 10], // Elemental Wild Shape
            ['feature_id' => 86, 'subclass_id' => 7, 'level' => 14], // Thousand Forms

            // Circle of the Land (Druid)
            ['feature_id' => 87, 'subclass_id' => 8, 'level' => 2],  // Natural Recovery
            ['feature_id' => 88, 'subclass_id' => 8, 'level' => 2],  // Bonus Cantrip
            ['feature_id' => 89, 'subclass_id' => 8, 'level' => 6],  // Land's Stride
            ['feature_id' => 90, 'subclass_id' => 8, 'level' => 10], // Nature's Sanctuary
            ['feature_id' => 91, 'subclass_id' => 8, 'level' => 14], // Natures Ward

            // Champion (Fighter)
            ['feature_id' => 92, 'subclass_id' => 9, 'level' => 3],  // Improved Critical
            ['feature_id' => 93, 'subclass_id' => 9, 'level' => 7],  // Remarkable Athlete
            ['feature_id' => 94, 'subclass_id' => 9, 'level' => 15], // Relentless
            ['feature_id' => 95, 'subclass_id' => 9, 'level' => 18], // Survivor

            // Battle Master (Fighter)
            ['feature_id' => 96, 'subclass_id' => 10, 'level' => 3],  // Combat Superiority
            ['feature_id' => 97, 'subclass_id' => 10, 'level' => 7],  // Student of War
            ['feature_id' => 98, 'subclass_id' => 10, 'level' => 10], // Know Your Enemy
            ['feature_id' => 94, 'subclass_id' => 10, 'level' => 15], // Relentless (compartido)

            // Oath of Devotion (Paladin)
            ['feature_id' => 99,  'subclass_id' => 11, 'level' => 3],  // Sacred Weapon
            ['feature_id' => 100, 'subclass_id' => 11, 'level' => 3],  // Turn the Unholy
            ['feature_id' => 101, 'subclass_id' => 11, 'level' => 7],  // Aura of Devotion
            ['feature_id' => 102, 'subclass_id' => 11, 'level' => 15], // Purity of Spirit
            ['feature_id' => 103, 'subclass_id' => 11, 'level' => 20], // Holy Nimbus

            // Oath of Vengeance (Paladin)
            ['feature_id' => 104, 'subclass_id' => 12, 'level' => 3],  // Abjure Enemy
            ['feature_id' => 105, 'subclass_id' => 12, 'level' => 3],  // Vow of Enmity
            ['feature_id' => 106, 'subclass_id' => 12, 'level' => 7],  // Relentless Avenger
            ['feature_id' => 107, 'subclass_id' => 12, 'level' => 15], // Soul of Vengeance
            ['feature_id' => 108, 'subclass_id' => 12, 'level' => 20], // Avenging Angel

            // Hunter (Ranger)
            ['feature_id' => 109, 'subclass_id' => 13, 'level' => 3],  // Hunter's Prey
            ['feature_id' => 110, 'subclass_id' => 13, 'level' => 7],  // Defensive Tactics
            ['feature_id' => 111, 'subclass_id' => 13, 'level' => 11], // Multiattack
            ['feature_id' => 112, 'subclass_id' => 13, 'level' => 15], // Superior Hunter's Defense

            // Beast Master (Ranger)
            ['feature_id' => 113, 'subclass_id' => 14, 'level' => 3],  // Ranger's Companion
            ['feature_id' => 114, 'subclass_id' => 14, 'level' => 7],  // Exceptional Training
            ['feature_id' => 115, 'subclass_id' => 14, 'level' => 11], // Bestial Fury
            ['feature_id' => 116, 'subclass_id' => 14, 'level' => 15], // Share Spells

            // Thief (Rogue)
            ['feature_id' => 117, 'subclass_id' => 15, 'level' => 3],  // Fast Hands
            ['feature_id' => 118, 'subclass_id' => 15, 'level' => 3],  // Second-Story Work
            ['feature_id' => 119, 'subclass_id' => 15, 'level' => 9],  // Supreme Sneak
            ['feature_id' => 120, 'subclass_id' => 15, 'level' => 13], // Thief's Reflexes
            ['feature_id' => 121, 'subclass_id' => 15, 'level' => 17], // Use Magic Device

            // Assassin (Rogue)
            ['feature_id' => 122, 'subclass_id' => 16, 'level' => 3],  // Assassinate
            ['feature_id' => 123, 'subclass_id' => 16, 'level' => 9],  // Infiltration Expertise
            ['feature_id' => 124, 'subclass_id' => 16, 'level' => 13], // Impostor
            ['feature_id' => 125, 'subclass_id' => 16, 'level' => 17], // Death Strike

            // School of Evocation (Wizard)
            ['feature_id' => 126, 'subclass_id' => 17, 'level' => 2],  // Sculpt Spells
            ['feature_id' => 127, 'subclass_id' => 17, 'level' => 6],  // Potent Cantrip
            ['feature_id' => 128, 'subclass_id' => 17, 'level' => 10], // Empowered Evocation
            ['feature_id' => 129, 'subclass_id' => 17, 'level' => 14], // Overchannel

            // School of Necromancy (Wizard)
            ['feature_id' => 130, 'subclass_id' => 18, 'level' => 2],  // Grim Harvest
            ['feature_id' => 131, 'subclass_id' => 18, 'level' => 6],  // Undead Thralls
            ['feature_id' => 132, 'subclass_id' => 18, 'level' => 10], // Inured to Undeath
            ['feature_id' => 133, 'subclass_id' => 18, 'level' => 14], // Command Undead

            // School of Abjuration (Wizard)
            ['feature_id' => 134, 'subclass_id' => 19, 'level' => 2],  // Arcane Ward
            ['feature_id' => 135, 'subclass_id' => 19, 'level' => 6],  // Projected Ward
            ['feature_id' => 136, 'subclass_id' => 19, 'level' => 10], // Improved Abjuration
            ['feature_id' => 137, 'subclass_id' => 19, 'level' => 14], // Spell Resistance
        ]);
    }
}
