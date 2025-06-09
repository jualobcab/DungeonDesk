<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feature')->insert([
            // Barbarian Features
            [
                'name' => 'Rage',
                'description' => 'In battle, you fight with primal ferocity. On your turn, you can enter a rage as a bonus action. While raging, you gain the following benefits if you aren\'t wearing heavy armor: Advantage on Strenght checks and Strength saving throws; when you make a melee weapon attack using Strength, you gain a bonus to the damage roll that increases as you gain levels in this class, and you have resistance to bludgeoning, piercing, and slashing damage.',
            ],
            [
                'name' => 'Unnarmored Defense',
                'description' => 'While you are not wearing any armor, your armor class equals 10 + your Dexterity modifier + your Constitution modifier. You can use a shield and still gain this benefit.',
            ],
            [
                'name' => 'Reckless Attack',
                'description' => 'Starting at 2nd level, you can throw aside all concern for defense to attack with fierce desperation. When you make your first attack on your turn, you can decide to attack recklessly. Doing so gives you advantage on melee weapon attack rolls using Strength during this turn, but attack rolls against you have advantage until your next turn.',
            ],
            [
                'name' => 'Extra Attack',
                'description' => 'Beginning at 5th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.',
            ],
            [
                'name' => 'Feral Instinct',
                'description' => 'By 7th level, your instincts are so honed that you have advantage on initiative rolls.',
            ],
            [
                'name' => 'Brutal Critical',
                'description' => 'Beginning at 9th level, you can roll one additional weapon damage die when determining the extra damage for a critical hit with a melee attack.',
            ],
            [
                'name' => 'Relentless Rage',
                'description' => 'Starting at 11th level, your rage can keep you fighting despite grievous wounds. If you drop to 0 hit points while you\'re raging and don\'t die outright, you can make a DC 10 Constitution saving throw. If you succeed, you drop to 1 hit point instead.',
            ],
            [
                'name' => 'Persistent Rage',
                'description' => 'Beginning at 15th level, your rage is so fierce that it ends early only if you fall unconscious or if you choose to end it.',
            ],
            [
                'name' => 'Indomitable Might',
                'description' => 'Beginning at 18th level, if your total for a Strength check is less than your Strength score, you can use that score in place of the total.',
            ],
            [
                'name' => 'Primal Champion',
                'description' => 'At 20th level, you embody the power of the wilds. Your Strength and Constitution scores increase by 4. Your maximum for those scores is now 24.',
            ],

            // Bard Features
            [
                'name' => 'Spellcasting',
                'description' => 'You have learned to cast spells through your study of magic and performance. You can cast bard spells using Charisma as your spellcasting ability.',
            ],
            [
                'name' => 'Bardic Inspiration',
                'description' => 'You can inspire others through stirring words or music. To do so, you use a bonus action on your turn to choose one creature other than yourself within 60 feet of you who can hear you. That creature gains one Bardic Inspiration die, a d6. Once within the next 10 minutes, the creature can roll the die and add the number rolled to one ability check, attack roll, or saving throw it makes. The creature can wait until after it rolls the d20 before deciding to use the Bardic Inspiration die, but must decide before the DM says whether the roll succeeds or fails.',
            ],
            [
                'name' => 'Jack of All Trades',
                'description' => 'Starting at 2nd level, you can add half your proficiency bonus, rounded down, to any ability check you make that doesn\'t already include your proficiency bonus.',
            ],
            [
                'name' => 'Expertise',
                'description' => 'At 3rd level, choose two of your skill proficiencies or one of your skill proficiencies and your proficiency with a musical instrument. Your proficiency bonus is doubled for any ability check you make that uses either of the chosen proficiencies.',
            ],
            [
                'name' => 'Font of Inspiration',
                'description' => 'Starting at 5th level, when you finish a short rest, you regain all expended uses of your Bardic Inspiration feature.',
            ],
            [
                'name' => 'Magical Secrets',
                'description' => 'At 10th level, you learn two spells from any class\'s spell list. The spells must be of a level for which you have spell slots. You can cast these spells using your Charisma as your spellcasting ability.',
            ],
            [
                'name' => 'Superior Inspiration',
                'description' => 'At 20th level, when you roll initiative and have no uses of Bardic Inspiration left, you regain one use.',
            ],
        
            // Cleric features
            [
                'name' => 'Spellcasting',
                'description' => 'You have learned to cast spells through your devotion to your deity. You can cast cleric spells using Wisdom as your spellcasting ability.',
            ],
            [
                'name' => 'Channel Divinity',
                'description' => 'Starting at 2nd level, you can use Channel Divinity to fuel magical effects. You gain two Channel Divinity options: Turn Undead and an option granted by your domain.',
            ],
            [
                'name' => 'Destroy Undead',
                'description' => 'Starting at 5th level, when an undead fails its saving throw against your Turn Undead feature, it is instantly destroyed if its CR is equal to or less than 1/2 your cleric level.',
            ],
            [
                'name' => 'Divine Intervention',
                'description' => 'At 10th level, you can call on your deity for aid. As an action, you can request your deity\'s intervention. If your deity intervenes, it will help you in a way that is appropriate to the situation.',
            ],
            
            // Druid features
            [
                'name' => 'Spellcasting',
                'description' => 'You have learned to cast spells through your study of nature. You can cast druid spells using Wisdom as your spellcasting ability.',
            ],
            [
                'name' => 'Wild Shape',
                'description' => 'Starting at 2nd level, you can use your action to magically assume the shape of a beast that you have seen before. You can use this feature twice per short or long rest.',
            ],
            [
                'name' => 'Timeless Body',
                'description' => 'Starting at 18th level, the magic of the druids allows you to stop aging. You can no longer be aged magically or non-magically, and you no longer need to eat or drink.',
            ],
            [
                'name' => 'Beast Spells',
                'description' => 'Beginning at 18th level, you can cast druid spells while in your Wild Shape form. The spell\'s casting time must be 1 action, and the spell must not have a range of self.',
            ],
            [
                'name' => 'Archdruid',
                'description' => 'At 20th level, you can use your Wild Shape an unlimited number of times. Additionally, you can ignore verbal and somatic components of druid spells, as long as the spells do not have a material component.',
            ],
            
            // Fighter features
            [
                'name' => 'Fighting Style',
                'description' => 'At 1st level, you adopt a particular style of fighting as your specialty. Choose one of the following options: Archery, Defense, Dueling, Great Weapon Fighting, Protection, or Two-Weapon Fighting.',
            ],
            [
                'name' => 'Second Wind',
                'description' => 'Starting at 1st level, you can use a bonus action to regain hit points equal to 1d10 + your fighter level. You can use this feature once per short or long rest.',
            ],
            [
                'name' => 'Action Surge',
                'description' => 'Starting at 2nd level, you can push yourself beyond your normal limits for a moment. On your turn, you can take one additional action on top of your regular action and a possible bonus action. You can use this feature once per short or long rest.',
            ],
            [
                'name' => 'Indomitable',
                'description' => 'Starting at 9th level, you can reroll a saving throw that you fail. If you do so, you must use the new roll. You can use this feature once per long rest.',
            ],

            // Paladin features
            [
                'name' => 'Lay on Hands',
                'description' => 'You have a pool of healing power that replenishes when you take a long rest. You can use an action to touch a creature and restore a number of hit points equal to your paladin level × 5.',
            ],
            [
                'name' => 'Spellcasting',
                'description' => 'You have learned to cast spells through your devotion to your deity. You can cast paladin spells using Charisma as your spellcasting ability.',
            ],
            [
                'name' => 'Divine Smite',
                'description' => 'When you hit a creature with a melee weapon attack, you can expend one spell slot to deal radiant damage in addition to the weapon\'s damage. The extra damage is 2d8 for a 1st-level spell slot, plus 1d8 for each level above 1st.',
            ],
            [
                'name' => 'Divine Health',
                'description' => 'By 3rd level, your divine magic makes you immune to disease.',
            ],
            [
                'name' => 'Aura of Protection',
                'description' => 'Starting at 6th level, whenever you or a friendly creature within 10 feet of you makes a saving throw, the creature gains a bonus equal to your Charisma modifier (minimum +1).',
            ],
            [
                'name' => 'Aura of Courage',
                'description' => 'Starting at 10th level, you and friendly creatures within 10 feet of you can\'t be frightened while you are conscious.',
            ],
            [
                'name' => 'Cleansing Touch',
                'description' => 'Starting at 14th level, you can use your action to end one spell on yourself or on one willing creature that you touch. You can use this feature a number of times equal to your Charisma modifier (minimum of once). You regain all expended uses when you finish a long rest.',
            ],
            
            // Ranger features
            [
                'name' => 'Natural Explorer',
                'description' => 'You are a master of navigating the natural world and can find food and fresh water for yourself and up to five other people each day, provided that the land offers it.',
            ],
            [
                'name' => 'Spellcasting',
                'description' => 'You have learned to cast spells through your study of nature. You can cast ranger spells using Wisdom as your spellcasting ability.',
            ],
            [
                'name' => 'Land\'s Stride',
                'description' => 'Starting at 8th level, moving through nonmagical difficult terrain costs you no extra movement. You can also pass through nonmagical plants without being slowed by them and without taking damage from them if they have thorns, spines, or a similar hazard.',
            ],
            [
                'name' => 'Vanish',
                'description' => 'Starting at 14th level, you can use your action to become invisible until the end of your next turn. You can use this feature once per long rest.',
            ],
            [
                'name' => 'Feral Senses',
                'description' => 'At 18th level, you gain the ability to see invisible creatures and objects as if they were visible, and you can pinpoint their location in relation to you. You can also see into the Ethereal Plane.',
            ],
            [
                'name' => 'Foe Slayer',
                'description' => 'At 20th level, you can add your Wisdom modifier to the damage of one weapon attack you make against a creature you can see within 60 feet of you. You can use this feature once per long rest.',
            ],
            
            // Rogue features
            [
                'name' => 'Sneak Attack',
                'description' => 'Beginning at 1st level, you know how to strike subtly and exploit a foe\'s distraction. Once per turn, you can deal extra damage to one creature you hit with an attack if you have advantage on the attack roll or if an ally is within 5 feet of the target and isn\'t incapacitated.',
            ],
            [
                'name' => 'Cunning Action',
                'description' => 'Starting at 2nd level, you can use your bonus action to take the Dash, Disengage, or Hide action.',
            ],
            [
                'name' => 'Uncanny Dodge',
                'description' => 'Starting at 5th level, when an attacker that you can see hits you with an attack, you can use your reaction to halve the attack\'s damage against you.',
            ],
            [
                'name' => 'Evasion',
                'description' => 'At 7th level, you can nimbly dodge out of the way of certain area effects, such as a red dragon\'s fiery breath or an ice storm spell. If you succeed on a Dexterity saving throw against an effect that deals half damage on a success, you take no damage instead.',
            ],
            [
                'name' => 'Blindsense',
                'description' => 'Starting at 14th level, if you are able to hear, you are aware of the location of any hidden or invisible creature within 10 feet of you, provided that the creature isn\'t hidden behind total cover.',
            ],
            [
                'name' => 'Slipery Mind',
                'description' => 'By 15th level, you have acquired greater mental strength. You gain proficiency in Wisdom saving throws.',
            ],
            [
                'name' => 'Elusive',
                'description' => 'Beginning at 18th level, no attack roll has advantage against you while you aren\'t incapacitated.',
            ],
            [
                'name' => 'Stroke of Luck',
                'description' => 'At 20th level, you have an uncanny knack for succeeding when you need to. If your attack misses a target within 5 feet of you, you can turn the miss into a hit. Alternatively, if you fail an ability check, you can treat the d20 roll as a 20.',
            ],
            
            // Wizard features
            [
                'name' => 'Spellcasting',
                'description' => 'You have learned to cast spells through your study of magic. You can cast wizard spells using Intelligence as your spellcasting ability.',
            ],
            [
                'name' => 'Arcane Recovery',
                'description' => 'Starting at 1st level, you can regain some of your magical energy by studying your spellbook. When you finish a short rest, you can choose expended spell slots to recover. The spell slots can have a combined level that is equal to or less than half your wizard level (rounded up), and none of the slots can be 6th level or higher.',
            ],
            [
                'name' => 'Spell Mastery',
                'description' => 'At 18th level, you have achieved such mastery over certain spells that you can cast them at will. Choose a 1st-level and a 2nd-level spell from the wizard spell list. You can cast those spells at their lowest level without expending a spell slot.',
            ],
            [
                'name' => 'Signature Spells',
                'description' => 'At 20th level, you can choose two 3rd-level spells from the wizard spell list as your signature spells. You can cast each of them once without expending a spell slot. You regain the ability to do so when you finish a long rest.',
            ],


            ////////////////    SUBCLASS FEATURES    ////////////////
            // Path of the Berserker Features
            [
                'name' => 'Frenzy',
                'description' => 'Starting when you choose this path at 3rd level, you can go into a frenzy when you rage. If you do so, for the duration of your rage, you can make a single melee weapon attack as a bonus action on each of your turns after this one.',
            ],
            [
                'name' => 'Mindless Rage',
                'description' => 'Beginning at 6th level, you can’t be charmed or frightened while raging.',
            ],
            [
                'name' => 'Intimidating Presence',
                'description' => 'At 10th level, you can use your action to frighten someone with your menacing presence. The target must make a Wisdom saving throw against your spell save DC or become frightened for 1 minute.',
            ],
            [
                'name' => 'Retaliation',
                'description' => 'At 14th level, when a creature hits you with an attack while you are raging, you can use your reaction to make a melee weapon attack against that creature.',
            ],

            // Path of the Totem Warrior Features
            [
                'name' => 'Spirit Seeker',
                'description' => 'At 3rd level, you gain the ability to cast the beast sense and speak with animals spells, but only as rituals.',
            ],
            [
                'name' => 'Totem Spirit',
                'description' => 'At 3rd level, you choose a totem spirit that grants you a benefit while raging. You can choose from the Bear, Eagle, or Wolf totems.',
            ],
            [
                'name' => 'Aspect of the Beast',
                'description' => 'At 6th level, you gain a feature based on your totem spirit. For example, if you chose the Bear totem, you gain resistance to all damage except psychic damage.',
            ],
            [
                'name' => 'Spirit Walker',
                'description' => 'At 10th level, you can cast commune with nature as a ritual.',
            ],
            [
                'name' => 'Totemic Attunement',
                'description' => 'At 14th level, you gain an additional benefit based on your totem spirit. For example, if you chose the Eagle totem, you gain a flying speed equal to your walking speed while raging.',
            ],

            // College of Lore Features
            [
                'name' => 'Bonus Proficiencies',
                'description' => 'When you join the College of Lore at 3rd level, you gain proficiency with three skills of your choice.',
            ],
            [
                'name' => 'Cutting Words',
                'description' => 'Starting at 3rd level, you can use your reaction to subtract a Bardic Inspiration die from an enemy\'s attack roll, ability check, or damage roll.',
            ],
            [
                'name' => 'Peerless Skill',
                'description' => 'At 14th level, when you make an ability check, you can expend one use of Bardic Inspiration to add the number rolled to the check.',
            ],

            // College of Valor Features
            [
                'name' => 'Bonus Proficiencies',
                'description' => 'When you join the College of Valor at 3rd level, you gain proficiency with medium armor, shields, and martial weapons.',
            ],
            [
                'name' => 'Combat Inspiration',
                'description' => 'Starting at 3rd level, when you use your Bardic Inspiration feature, you can choose to inspire an ally to add the die to their damage roll.',
            ],
            [
                'name' => 'Extra Attack',
                'description' => 'Beginning at 6th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.',
            ],
            [
                'name' => 'Battle Magic',
                'description' => 'At 14th level, when you use your action to cast a bard spell, you can make one weapon attack as a bonus action.',
            ],

            // Life Domain Features
            [
                'name' => 'Disciple of Life',
                'description' => 'When you use a spell of 1st level or higher to restore hit points to a creature, the creature regains additional hit points equal to 2 + the spell\'s level.',
            ],
            [
                'name' => 'Channel Divinity: Preserve Life',
                'description' => 'Starting at 2nd level, you can use your Channel Divinity to heal the badly injured. As an action, you can restore a number of hit points equal to five times your cleric level, divided among any creatures within 30 feet of you.',
            ],
            [
                'name' => 'Blessed Healer',
                'description' => 'Beginning at 6th level, when you cast a spell of 1st level or higher that restores hit points to a creature other than yourself, you regain hit points equal to 2 + the spell\'s level.',
            ],
            [
                'name' => 'Divine Strike',
                'description' => 'At 8th level, you gain the ability to infuse your weapon strikes with divine energy. Once on each of your turns when you hit a creature with a weapon attack, you can cause the attack to deal an extra 1d8 radiant damage.',
            ],
            [
                'name' => 'Supreme Healing',
                'description' => 'At 17th level, when you would roll one or more dice to restore hit points with a spell, you instead use the highest number possible for each die.',
            ],

            // Light Domain Features
            [
                'name' => 'Warding Flare',
                'description' => 'Starting at 1st level, you can use your reaction to impose disadvantage on an attack roll made against you. You can use this feature a number of times equal to your Wisdom modifier (minimum of once). You regain all expended uses when you finish a long rest.',
            ],
            [
                'name' => 'Channel Divinity: Radiance of the Dawn',
                'description' => 'Starting at 2nd level, you can use your Channel Divinity to harness sunlight, dispelling darkness and dealing radiant damage to enemies.',
            ],
            [
                'name' => 'Improved Flare',
                'description' => 'At 6th level, when you use your Warding Flare feature, the attacker is also blinded until the end of its next turn.',
            ],
            [
                'name' => 'Corona of Light',
                'description' => 'At 8th level, you emit bright light in a 30-foot radius and dim light for an additional 30 feet. You can suppress or activate this light as a bonus action.',
            ],
            [
                'name' => 'Sunburst',
                'description' => 'At 17th level, you can cast the sunburst spell without expending a spell slot. You can do so once per long rest.',
            ],

            // Circle of the Moon Features
            [
                'name' => 'Combat Wild Shape',
                'description' => 'Starting at 2nd level, you can use a bonus action to expend a spell slot to regain 1d8 hit points per level of the spell slot expended.',
            ],
            [
                'name' => 'Circle Forms',
                'description' => 'At 2nd level, you can use your Wild Shape to transform into more powerful beasts, such as a dire wolf or a giant eagle.',
            ],
            [
                'name' => 'Primal Strike',
                'description' => 'At 6th level, your attacks in beast form count as magical for overcoming resistance and immunity to nonmagical attacks and damage.',
            ],
            [
                'name' => 'Elemental Wild Shape',
                'description' => 'At 10th level, you can expend two uses of Wild Shape at the same time to transform into an elemental.',
            ],
            [
                'name' => 'Thousand Forms',
                'description' => 'At 14th level, you can cast alter self at will, without expending a spell slot. You can also use your Wild Shape to transform into any beast you have seen before, regardless of its CR.',
            ],

            // Circle of the Land Features
            [
                'name' => 'Natural Recovery',
                'description' => 'Starting at 2nd level, you can regain some of your magical energy by resting. During a short rest, you can recover a number of spell slots equal to half your druid level (rounded up).',
            ],
            [
                'name' => 'Bonus Cantrip',
                'description' => 'At 2nd level, you learn one additional druid cantrip of your choice.',
            ],
            [
                'name' => 'Land\'s Stride',
                'description' => 'Starting at 6th level, moving through nonmagical difficult terrain costs you no extra movement. You can also pass through nonmagical plants without being slowed by them and without taking damage from them if they have thorns, spines, or a similar hazard.',
            ],
            [
                'name' => 'Nature\'s Sanctuary',
                'description' => 'At 10th level, creatures of the natural world sense your connection to nature and are less likely to attack you. You have advantage on saving throws against being frightened or charmed by beasts and plants.',
            ],
            [
                'name' => 'Natures Ward',
                'description' => 'At 14th level, you can cast commune with nature as a ritual. Additionally, you can use your Wild Shape to transform into any beast you have seen before, regardless of its CR.',
            ],

            // Champion Features
            [
                'name' => 'Improved Critical',
                'description' => 'Beginning at 3rd level, your weapon attacks score a critical hit on a roll of 19 or 20.',
            ],
            [
                'name' => 'Remarkable Athlete',
                'description' => 'Starting at 7th level, you can add half your proficiency bonus (rounded down) to any Strength, Dexterity, or Constitution check you make that doesn\'t already use your proficiency bonus.',
            ],
            [
                'name' => 'Superior Critical',
                'description' => 'Beginning at 15th level, your weapon attacks score a critical hit on a roll of 18-20.',
            ],
            [
                'name' => 'Survivor',
                'description' => 'At 18th level, you can regain hit points equal to 5 + your Constitution modifier at the start of each of your turns if you have no more than half of your hit points left.',
            ],

            // Battle Master Features
            [
                'name' => 'Combat Superiority',
                'description' => 'At 3rd level, you learn maneuvers that enhance your combat abilities. You gain a number of superiority dice, which are d8s, and you can use them to fuel your maneuvers.',
            ],
            [
                'name' => 'Student of War',
                'description' => 'At 7th level, you gain proficiency with one type of artisan\'s tools of your choice.',
            ],
            [
                'name' => 'Know Your Enemy',
                'description' => 'At 10th level, you can spend 1 minute observing or interacting with another creature outside combat to learn information about its capabilities.',
            ],
            [
                'name' => 'Relentless',
                'description' => 'At 15th level, if you roll initiative and have no superiority dice left, you regain one superiority die.',
            ],

            // Oath of Devotion Features
            [
                'name' => 'Sacred Weapon',
                'description' => 'At 3rd level, you can imbue one weapon with positive energy, adding your Charisma modifier to attack rolls made with it for 1 minute.',
            ],
            [
                'name' => 'Turn the Unholy',
                'description' => 'Starting at 3rd level, you can use your Channel Divinity to turn fiends and undead.',
            ],
            [
                'name' => 'Aura of Devotion',
                'description' => 'At 7th level, you and friendly creatures within 10 feet of you can\'t be charmed while you are conscious.',
            ],
            [
                'name' => 'Purity of Spirit',
                'description' => 'At 15th level, you are always under the effects of a protection from evil and good spell.',
            ],
            [
                'name' => 'Holy Nimbus',
                'description' => 'At 20th level, you can radiate an aura of light that lasts for 1 minute. While active, you emit bright light in a 30-foot radius and dim light for an additional 30 feet.',
            ],

            // Oath of Vengeance Features
            [
                'name' => 'Abjure Enemy',
                'description' => 'At 3rd level, you can use your Channel Divinity to compel a creature to flee or to fight you.',
            ],
            [
                'name' => 'Vow of Enmity',
                'description' => 'At 3rd level, you can use your Channel Divinity to gain advantage on attack rolls against a creature for 1 minute.',
            ],
            [
                'name' => 'Relentless Avenger',
                'description' => 'At 7th level, when you hit a creature with an opportunity attack, you can move up to half your speed immediately after the attack as part of the same reaction.',
            ],
            [
                'name' => 'Soul of Vengeance',
                'description' => 'At 15th level, when a creature hits you with an attack, you can use your reaction to make a melee weapon attack against that creature.',
            ],
            [
                'name' => 'Avenging Angel',
                'description' => 'At 20th level, you can transform into an angelic form for 1 hour. While transformed, you have flying speed and can emit bright light in a 30-foot radius and dim light for an additional 30 feet.',
            ],

            // Hunter Features
            [
                'name' => 'Hunter\'s Prey',
                'description' => 'At 3rd level, you gain one of the following features: Colossus Slayer, Giant Killer, or Horde Breaker.',
            ],
            [
                'name' => 'Defensive Tactics',
                'description' => 'At 7th level, you gain one of the following features: Escape the Horde, Multiattack Defense, or Steel Will.',
            ],
            [
                'name' => 'Multiattack',
                'description' => 'At 11th level, you can use your action to make two attacks with a weapon you are holding.',
            ],
            [
                'name' => 'Superior Hunter\'s Defense',
                'description' => 'At 15th level, you gain one of the following features: Evasion, Stand Against the Tide, or Uncanny Dodge.',
            ],

            // Beast Master Features
            [
                'name' => 'Ranger\'s Companion',
                'description' => 'At 3rd level, you gain a beast companion that accompanies you on your adventures and fights alongside you.',
            ],
            [
                'name' => 'Exceptional Training',
                'description' => 'At 7th level, your beast companion gains additional hit points and can take the Attack action on its turn.',
            ],
            [
                'name' => 'Bestial Fury',
                'description' => 'At 11th level, when you take the Attack action on your turn, your beast companion can make one attack as a bonus action.',
            ],
            [
                'name' => 'Share Spells',
                'description' => 'At 15th level, when you cast a spell that targets only yourself, you can also affect your beast companion with the spell if it is within 30 feet of you.',
            ],

            // Thief features
            [
                'name' => 'Fast Hands',
                'description' => 'Starting at 3rd level, you can use the bonus action granted by your Cunning Action to make a Dexterity (Sleight of Hand) check, use your thieves\' tools to disarm a trap or open a lock, or take the Use an Object action.',
            ],
            [
                'name' => 'Second-Story Work',
                'description' => 'At 3rd level, climbing doesn\'t cost you extra movement, and you can make a running jump.',
            ],
            [
                'name' => 'Supreme Sneak',
                'description' => 'At 9th level, you have advantage on Dexterity (Stealth) checks if you move no more than half your speed on the same turn.',
            ],
            [
                'name' => 'Thief\'s Reflexes',
                'description' => 'At 13th level, you can take the Use an Object action as a bonus action.',
            ],
            [
                'name' => 'Use Magic Device',
                'description' => 'At 17th level, you can attune to magic items even if you don\'t meet their requirements.',
            ],

            // Assassin features
            [
                'name' => 'Assassinate',
                'description' => 'Starting at 3rd level, you are at your deadliest when you get the drop on your enemies. You have advantage on attack rolls against any creature that hasn\'t taken a turn in the combat yet.',
            ],
            [
                'name' => 'Infiltration Expertise',
                'description' => 'At 9th level, you can unerringly mimic speech and writing.',
            ],
            [
                'name' => 'Impostor',
                'description' => 'At 13th level, you can unerringly mimic speech and writing.',
            ],
            [
                'name' => 'Death Strike',
                'description' => 'At 17th level, when you hit a surprised creature with an attack, it must make a Constitution saving throw or be reduced to 0 hit points.',
            ],

            // School of Evocation Features
            [
                'name' => 'Sculpt Spells',
                'description' => 'Starting at 2nd level, you can create pockets of relative safety within the effects of your evocation spells.',
            ],
            [
                'name' => 'Potent Cantrip',
                'description' => 'At 6th level, your damaging cantrips affect even creatures that avoid the brunt of the effect.',
            ],
            [
                'name' => 'Empowered Evocation',
                'description' => 'At 10th level, you can add your Intelligence modifier to the damage you deal with any wizard evocation spell.',
            ],
            [
                'name' => 'Overchannel',
                'description' => 'At 14th level, you can increase the power of your lower-level evocation spells.',
            ],

            // School of Necromancy Features
            [
                'name' => 'Grim Harvest',
                'description' => 'Starting at 2nd level, you can regain hit points when you kill one or more creatures with a spell of 1st level or higher.',
            ],
            [
                'name' => 'Undead Thralls',
                'description' => 'At 6th level, your necromancy spells are more potent, and you can animate additional undead creatures.',
            ],
            [
                'name' => 'Inured to Undeath',
                'description' => 'At 10th level, you gain resistance to necrotic damage, and your hit point maximum increases by an amount equal to your wizard level.',
            ],
            [
                'name' => 'Command Undead',
                'description' => 'At 14th level, you can use your action to take control of an undead creature that has failed its saving throw against one of your necromancy spells.',
            ],

            // School of Abjuration Features
            [
                'name' => 'Arcane Ward',
                'description' => 'At 2nd level, you can create a magical ward that absorbs damage.',
            ],
            [
                'name' => 'Projected Ward',
                'description' => 'At 6th level, you can project your arcane ward to protect an ally.',
            ],
            [
                'name' => 'Improved Abjuration',
                'description' => 'At 10th level, when you cast an abjuration spell of 1st level or higher, you can add your Intelligence modifier to the spell\'s saving throw DC.',
            ],
            [
                'name' => 'Spell Resistance',
                'description' => 'At 14th level, you gain resistance to damage from spells.',
            ],
        ]);
    }
}