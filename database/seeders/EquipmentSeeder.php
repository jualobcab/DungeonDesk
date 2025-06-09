<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment')->insert([
            // Light Armor
            [
                'name' => 'Padded Armor',
                'rarity' => 'Common',
                'description' => '11 + Dex modifier, Disadvantage on Stealth.',
                'type' => 'armor',
            ],
            [
                'name' => 'Leather Armor',
                'rarity' => 'Common',
                'description' => '11 + Dex modifier.',
                'type' => 'armor',
            ],
            [
                'name' => 'Studded Leather Armor',
                'rarity' => 'Uncommon',
                'description' => '12 + Dex modifier.',
                'type' => 'armor',
            ],
            // Medium Armor
            [
                'name' => 'Hide Armor',
                'rarity' => 'Common',
                'description' => '12 + Dex modifier (max 2).',
                'type' => 'armor',
            ],
            [
                'name' => 'Chain Shirt',
                'rarity' => 'Uncommon',
                'description' => '13 + Dex modifier (max 2).',
                'type' => 'armor',
            ],
            [
                'name' => 'Scale Mail',
                'rarity' => 'Uncommon',
                'description' => '14 + Dex modifier (max 2), Disadvantage on Stealth.',
                'type' => 'armor',
            ],
            [
                'name' => 'Breastplate',
                'rarity' => 'Rare',
                'description' => '14 + Dex modifier (max 2).',
                'type' => 'armor',
            ],
            [
                'name' => 'Half Plate Armor',
                'rarity' => 'Rare',
                'description' => '15 + Dex modifier (max 2), Disadvantage on Stealth.',
                'type' => 'armor',
            ],
            // Heavy Armor
            [
                'name' => 'Ring Mail',
                'rarity' => 'Common',
                'description' => '14 AC, Disadvantage on Stealth.',
                'type' => 'armor',
            ],
            [
                'name' => 'Chain Mail',
                'rarity' => 'Uncommon',
                'description' => '16 AC, Str 13 required, Disadvantage on Stealth.',
                'type' => 'armor',
            ],
            [
                'name' => 'Splint Armor',
                'rarity' => 'Rare',
                'description' => '17 AC, Str 15 required, Disadvantage on Stealth.',
                'type' => 'armor',
            ],
            [
                'name' => 'Plate Armor',
                'rarity' => 'Very Rare',
                'description' => '18 AC, Str 15 required, Disadvantage on Stealth.',
                'type' => 'armor',
            ],

            // Weapons
            [
                'name' => 'Longsword',
                'rarity' => 'Common',
                'description' => 'A standard sword for warriors.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Dagger',
                'rarity' => 'Common',
                'description' => 'A small, easily concealable blade.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Shortsword',
                'rarity' => 'Common',
                'description' => 'A versatile one-handed sword.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Longbow',
                'rarity' => 'Uncommon',
                'description' => 'A powerful ranged weapon.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Greatsword',
                'rarity' => 'Rare',
                'description' => 'A massive two-handed sword.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Warhammer',
                'rarity' => 'Uncommon',
                'description' => 'A heavy hammer used in combat.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Battleaxe',
                'rarity' => 'Uncommon',     
                'description' => 'A versatile axe used in battle.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Crossbow',
                'rarity' => 'Uncommon',
                'description' => 'A ranged weapon that uses bolts.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Spear',
                'rarity' => 'Common',
                'description' => 'A versatile polearm that can be thrown.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Halberd',
                'rarity' => 'Rare',
                'description' => 'A polearm with an axe blade and a spike.',
                'type' => 'weapon',
            ],
            [
                'name' => 'Flail',
                'rarity' => 'Uncommon',
                'description' => 'A weapon with a spiked ball on a chain.',
                'type' => 'weapon',
            ],

            // Artifacts
            [
                'name' => 'Ring of Protection',
                'rarity' => 'Rare',
                'description' => 'A magical ring that grants a +1 bonus to AC and saving throws.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Amulet of Health',
                'rarity' => 'Rare',
                'description' => 'An amulet that increases the wearer\'s Constitution by 2.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Cloak of Invisibility',
                'rarity' => 'Legendary',
                'description' => 'A cloak that allows the wearer to become invisible.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Staff of Power',
                'rarity' => 'Very Rare',
                'description' => 'A powerful staff that enhances spellcasting abilities.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Boots of Speed',
                'rarity' => 'Rare',
                'description' => 'Boots that double the wearer\'s movement speed.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Belt of Giant Strength',
                'rarity' => 'Very Rare',
                'description' => 'A belt that increases the wearer\'s Strength to 25.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Gauntlets of Ogre Power',
                'rarity' => 'Uncommon',
                'description' => 'Gauntlets that set the wearer\'s Strength to 19.',
                'type' => 'artifact',
            ],
            [
                'name' => 'Helm of Teleportation',
                'rarity' => 'Rare',
                'description' => 'A helm that allows the wearer to teleport short distances.',
                'type' => 'artifact',
            ]
        ]);
    }
}