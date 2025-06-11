<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Armor;
use App\Models\Weapon;
use App\Models\Artifact;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the equipment.
     *
     * @return \Illuminate\Http\Response
     */
    public function listEquipment(Request $request) {
        // Obtiene todo el equipo con información básica y su id específico
        $equipment = Equipment::all()->map(function($item) {
            // Buscar si existe armor, weapon o artifact asociado
            $armor = Armor::where('equipment_id', $item->equipment_id)->first();
            $weapon = Weapon::where('equipment_id', $item->equipment_id)->first();
            $artifact = Artifact::where('equipment_id', $item->equipment_id)->first();

            return [
                'equipment_id' => $item->equipment_id,
                'name' => $item->name,
                'type' => $item->type,
                'rarity' => $item->rarity,
                'description' => $item->description,
                'armor_id' => $armor ? $armor->armor_id : null,
                'weapon_id' => $weapon ? $weapon->weapon_id : null,
                'artifact_id' => $artifact ? $artifact->artifact_id : null,
            ];
        });

        return response()->json($equipment);
    }
    public function viewEquipment($id, Request $request) {
        // Busca el equipo por su ID
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json([
                'message' => 'Equipo no encontrado'
            ], 404);
        }

        // Buscar si existe armor, weapon o artifact asociado
        $armor = Armor::where('equipment_id', $equipment->equipment_id)->first();
        $weapon = Weapon::where('equipment_id', $equipment->equipment_id)->first();
        $artifact = Artifact::where('equipment_id', $equipment->equipment_id)->first();

        return response()->json([
            'equipment_id' => $equipment->equipment_id,
            'name' => $equipment->name,
            'type' => $equipment->type,
            'rarity' => $equipment->rarity,
            'description' => $equipment->description,
            'armor_id' => $armor ? $armor->armor_id : null,
            'weapon_id' => $weapon ? $weapon->weapon_id : null,
            'artifact_id' => $artifact ? $artifact->artifact_id : null,
        ]);
    }
    /**
     * Display a listing of the armors.
     *
     * @return \Illuminate\Http\Response
     */
    public function listArmor(Request $request) {
        // Obtiene todas las armaduras junto con la información básica del equipo asociado
        $armors = Armor::with('equipment')->get()->map(function($armor) {
            return [
                'armor_id' => $armor->armor_id,
                'equipment_id' => $armor->equipment_id,
                'name' => $armor->equipment ? $armor->equipment->name : null,
                'type' => $armor->type,
                'armor_class' => $armor->armor_class,
                'rarity' => $armor->equipment ? $armor->equipment->rarity : null,
                'description' => $armor->equipment ? $armor->equipment->description : null
            ];
        });

        return response()->json($armors);
    }
    public function viewArmor($id, Request $request) {
        // Busca la armadura junto con la información básica del equipo asociado
        $armor = Armor::with('equipment')->find($id);

        if (!$armor) {
            return response()->json([
                'message' => 'Armadura no encontrada'
            ], 404);
        }

        return response()->json([
            'armor_id' => $armor->armor_id,
            'equipment_id' => $armor->equipment_id,
            'name' => $armor->equipment ? $armor->equipment->name : null,
            'type' => $armor->type,
            'armor_class' => $armor->armor_class,
            'rarity' => $armor->equipment ? $armor->equipment->rarity : null,
            'description' => $armor->equipment ? $armor->equipment->description : null
        ]);
    }
    /**
     * Display a listing of the weapons.
     *
     * @return \Illuminate\Http\Response
     */
    public function listWeapons(Request $request) {
        // Obtiene todas las armas junto con la información básica del equipo asociado
        $weapons = Weapon::with('equipment')->get()->map(function($weapon) {
            return [
                'weapon_id' => $weapon->weapon_id,
                'equipment_id' => $weapon->equipment_id,
                'name' => $weapon->equipment ? $weapon->equipment->name : null,
                'type' => $weapon->type,
                'damage_die' => $weapon->damage_die,
                'damage_type' => $weapon->damage_type,
                'rarity' => $weapon->equipment ? $weapon->equipment->rarity : null,
                'description' => $weapon->equipment ? $weapon->equipment->description : null
            ];
        });

        return response()->json($weapons);
    }
    public function viewWeapon($id, Request $request) {
        // Busca el arma junto con la información básica del equipo asociado
        $weapon = Weapon::with('equipment')->find($id);

        if (!$weapon) {
            return response()->json([
                'message' => 'Arma no encontrada'
            ], 404);
        }

        return response()->json([
            'weapon_id' => $weapon->weapon_id,
            'equipment_id' => $weapon->equipment_id,
            'name' => $weapon->equipment ? $weapon->equipment->name : null,
            'type' => $weapon->type,
            'damage_die' => $weapon->damage_die,
            'damage_type' => $weapon->damage_type,
            'rarity' => $weapon->equipment ? $weapon->equipment->rarity : null,
            'description' => $weapon->equipment ? $weapon->equipment->description : null
        ]);
    }
    /**
     * Display a listing of the artifacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function listArtifacts(Request $request) {
        // Obtiene todos los artefactos junto con la información básica del equipo asociado
        $artifacts = Artifact::with('equipment')->get()->map(function($artifact) {
            return [
                'artifact_id' => $artifact->artifact_id,
                'equipment_id' => $artifact->equipment_id,
                'name' => $artifact->equipment ? $artifact->equipment->name : null,
                'type' => $artifact->type,
                'rarity' => $artifact->equipment ? $artifact->equipment->rarity : null,
                'description' => $artifact->equipment ? $artifact->equipment->description : null
            ];
        });

        return response()->json($artifacts);
    }
    public function viewArtifact($id, Request $request) {
        // Busca el artefacto junto con la información básica del equipo asociado
        $artifact = \App\Models\Artifact::with('equipment')->find($id);

        if (!$artifact) {
            return response()->json([
                'message' => 'Artefacto no encontrado'
            ], 404);
        }

        return response()->json([
            'artifact_id' => $artifact->artifact_id,
            'equipment_id' => $artifact->equipment_id,
            'name' => $artifact->equipment ? $artifact->equipment->name : null,
            'type' => $artifact->type,
            'rarity' => $artifact->equipment ? $artifact->equipment->rarity : null,
            'description' => $artifact->equipment ? $artifact->equipment->description : null
        ]);
    }
}
