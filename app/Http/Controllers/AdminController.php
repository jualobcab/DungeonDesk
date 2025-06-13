<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armor;
use App\Models\Weapon;
use App\Models\Artifact;
use App\Models\Feature;
use App\Models\Subclass;
use App\Models\ClassInfo;
use App\Models\Equipment;

class AdminController extends Controller
{
    /**
     * Crea un Armor y previamente el equipment.
     *
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createArmor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'armor_class' => 'required|integer'
        ]);

        
        $equipment = Equipment::create([
            'name' => $validated['name'],
            'rarity' => $validated['rarity'] ?? null,
            'description' => $validated['description'] ?? null,
            'type' => 'armor'
        ]);

        
        $armor = Armor::create([
            'equipment_id' => $equipment->equipment_id,
            'type' => $validated['type'],
            'armor_class' => $validated['armor_class']
        ]);

        return response()->json([
            'message' => 'Armadura y equipo creados correctamente',
            'armor' => $armor,
            'equipment' => $equipment
        ], 201);
    }

    /**
     * Crea un Weapon y previamente el equipment.
     *
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createWeapon(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'damage_die' => 'required|string|max:50',
            'damage_type' => 'required|string|max:50'
        ]);

        
        $equipment = Equipment::create([
            'name' => $validated['name'],
            'rarity' => $validated['rarity'] ?? null,
            'description' => $validated['description'] ?? null,
            'type' => 'weapon'
        ]);

        
        $weapon = Weapon::create([
            'equipment_id' => $equipment->equipment_id,
            'type' => $validated['type'],
            'damage_die' => $validated['damage_die'],
            'damage_type' => $validated['damage_type']
        ]);

        return response()->json([
            'message' => 'Arma y equipo creados correctamente',
            'weapon' => $weapon,
            'equipment' => $equipment
        ], 201);
    }

    /**
     * Crea un Artifact y previamente el equipment.
     *
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createArtifact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255'
        ]);

        
        $equipment = Equipment::create([
            'name' => $validated['name'],
            'rarity' => $validated['rarity'] ?? null,
            'description' => $validated['description'] ?? null,
            'type' => 'artifact'
        ]);


        $artifact = Artifact::create([
            'equipment_id' => $equipment->equipment_id,
            'type' => $validated['type']
        ]);

        return response()->json([
            'message' => 'Artefacto y equipo creados correctamente',
            'artifact' => $artifact,
            'equipment' => $equipment
        ], 201);
    }

    /**
     * Crea un Feature.
     *
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFeature(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $feature = Feature::create($validated);

        return response()->json([
            'message' => 'Feature creada correctamente',
            'feature' => $feature
        ], 201);
    }

    /**
     * Crea una Subclass.
     *
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubclass(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|integer|exists:classInfo,class_id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $subclass = Subclass::create($validated);

        return response()->json([
            'message' => 'Subclase creada correctamente',
            'subclass' => $subclass
        ], 201);
    }

    /**
     * Crea una Class.
     *
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createClass(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subclass_level' => 'nullable|integer'
        ]);

        $class = ClassInfo::create($validated);

        return response()->json([
            'message' => 'Clase creada correctamente',
            'class' => $class
        ], 201);
    }

    /**
     * Añade una Subclass a una Class existente.
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSubclassToClass(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|integer|exists:classInfo,class_id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $subclass = Subclass::create([
            'class_id' => $validated['class_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null
        ]);

        return response()->json([
            'message' => 'Subclase añadida correctamente a la clase',
            'subclass' => $subclass
        ], 201);
    }

    /**
     * Añade una Feature a una Class o Subclass.
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFeatureToClass(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|integer|exists:classInfo,class_id',
            'feature_id' => 'required|integer|exists:feature,feature_id',
            'level' => 'required|integer'
        ]);

        $class = ClassInfo::find($validated['class_id']);

        // Si ya existe, actualiza el nivel
        if ($class->features()->where('feature.feature_id', $validated['feature_id'])->exists()) {
            $class->features()->updateExistingPivot($validated['feature_id'], [
                'level' => $validated['level']
            ]);
            return response()->json([
                'message' => 'Nivel de feature actualizado en la clase',
                'class_id' => $class->class_id,
                'feature_id' => $validated['feature_id'],
                'level' => $validated['level']
            ]);
        }

        // Si no existe, crea la relación
        $class->features()->attach($validated['feature_id'], [
            'level' => $validated['level']
        ]);

        return response()->json([
            'message' => 'Feature añadida correctamente a la clase',
            'class_id' => $class->class_id,
            'feature_id' => $validated['feature_id'],
            'level' => $validated['level']
        ]);
    }

    /**
     * Añade una Feature a una Subclass.
     * @param none
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFeatureToSubclass(Request $request)
    {
        $validated = $request->validate([
            'subclass_id' => 'required|integer|exists:subclass,subclass_id',
            'feature_id' => 'required|integer|exists:feature,feature_id',
            'level' => 'required|integer'
        ]);

        $subclass = Subclass::find($validated['subclass_id']);

        // Si ya existe, actualiza el nivel
        if ($subclass->features()->where('feature.feature_id', $validated['feature_id'])->exists()) {
            $subclass->features()->updateExistingPivot($validated['feature_id'], [
                'level' => $validated['level']
            ]);
            return response()->json([
                'message' => 'Nivel de feature actualizado en la subclase',
                'subclass_id' => $subclass->subclass_id,
                'feature_id' => $validated['feature_id'],
                'level' => $validated['level']
            ]);
        }

        // Si no existe, crea la relación
        $subclass->features()->attach($validated['feature_id'], [
            'level' => $validated['level']
        ]);

        return response()->json([
            'message' => 'Feature añadida correctamente a la subclase',
            'subclass_id' => $subclass->subclass_id,
            'feature_id' => $validated['feature_id'],
            'level' => $validated['level']
        ]);
    }
    
    /** Actualiza un Armor existente.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateArmor($id, Request $request)
    {
        $armor = Armor::with('equipment')->find($id);
        if (!$armor) {
            return response()->json(['message' => 'Armadura no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'rarity' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'type' => 'sometimes|required|string|max:255',
            'armor_class' => 'sometimes|required|integer'
        ]);

        // Actualiza Equipment
        if ($armor->equipment) {
            if (isset($validated['name'])) $armor->equipment->name = $validated['name'];
            if (array_key_exists('rarity', $validated)) $armor->equipment->rarity = $validated['rarity'];
            if (array_key_exists('description', $validated)) $armor->equipment->description = $validated['description'];
            $armor->equipment->save();
        }

        // Actualiza Armor
        if (isset($validated['type'])) $armor->type = $validated['type'];
        if (isset($validated['armor_class'])) $armor->armor_class = $validated['armor_class'];
        $armor->save();

        return response()->json(['message' => 'Armadura actualizada correctamente', 'armor' => $armor]);
    }

    /**
     * Actualiza un Weapon existente.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateWeapon($id, Request $request)
    {
        $weapon = Weapon::with('equipment')->find($id);
        if (!$weapon) {
            return response()->json(['message' => 'Arma no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'rarity' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'type' => 'sometimes|required|string|max:255',
            'damage_die' => 'sometimes|required|string|max:50',
            'damage_type' => 'sometimes|required|string|max:50'
        ]);

        // Actualiza Equipment
        if ($weapon->equipment) {
            if (isset($validated['name'])) $weapon->equipment->name = $validated['name'];
            if (array_key_exists('rarity', $validated)) $weapon->equipment->rarity = $validated['rarity'];
            if (array_key_exists('description', $validated)) $weapon->equipment->description = $validated['description'];
            $weapon->equipment->save();
        }

        // Actualiza Weapon
        if (isset($validated['type'])) $weapon->type = $validated['type'];
        if (isset($validated['damage_die'])) $weapon->damage_die = $validated['damage_die'];
        if (isset($validated['damage_type'])) $weapon->damage_type = $validated['damage_type'];
        $weapon->save();

        return response()->json(['message' => 'Arma actualizada correctamente', 'weapon' => $weapon]);
    }

    /**
     * Actualiza un Artifact existente.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateArtifact($id, Request $request)
    {
        $artifact = Artifact::with('equipment')->find($id);
        if (!$artifact) {
            return response()->json(['message' => 'Artefacto no encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'rarity' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'type' => 'sometimes|required|string|max:255'
        ]);

        // Actualiza Equipment
        if ($artifact->equipment) {
            if (isset($validated['name'])) $artifact->equipment->name = $validated['name'];
            if (array_key_exists('rarity', $validated)) $artifact->equipment->rarity = $validated['rarity'];
            if (array_key_exists('description', $validated)) $artifact->equipment->description = $validated['description'];
            $artifact->equipment->save();
        }

        // Actualiza Artifact
        if (isset($validated['type'])) $artifact->type = $validated['type'];
        $artifact->save();

        return response()->json(['message' => 'Artefacto actualizado correctamente', 'artifact' => $artifact]);
    }

    /**
     * Actualiza un Equipment existente.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEquipment($id, Request $request)
    {
        $equipment = Equipment::find($id);
        if (!$equipment) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'rarity' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'type' => 'sometimes|required|string|max:255'
        ]);

        // Actualiza Equipment
        if (isset($validated['name'])) $equipment->name = $validated['name'];
        if (array_key_exists('rarity', $validated)) $equipment->rarity = $validated['rarity'];
        if (array_key_exists('description', $validated)) $equipment->description = $validated['description'];
        if (isset($validated['type'])) $equipment->type = $validated['type'];
        $equipment->save();

        return response()->json(['message' => 'Equipo actualizado correctamente', 'equipment' => $equipment]);
    }

    /**
     * Actualiza un Feature existente.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateFeature($id, Request $request)
    {
        $feature = Feature::find($id);
        if (!$feature) {
            return response()->json(['message' => 'Feature no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string'
        ]);

        // Actualiza Feature
        if (isset($validated['name'])) $feature->name = $validated['name'];
        if (array_key_exists('description', $validated)) $feature->description = $validated['description'];
        $feature->save();

        return response()->json(['message' => 'Feature actualizada correctamente', 'feature' => $feature]);
    }

    /**
     * Actualiza una Subclass existente.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSubclass($id, Request $request)
    {
        $subclass = Subclass::find($id);
        if (!$subclass) {
            return response()->json(['message' => 'Subclase no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string'
        ]);

        // Actualiza Subclass
        if (isset($validated['name'])) $subclass->name = $validated['name'];
        if (array_key_exists('description', $validated)) $subclass->description = $validated['description'];
        $subclass->save();

        return response()->json(['message' => 'Subclase actualizada correctamente', 'subclass' => $subclass]);
    }

    /**
     * Actualiza una Class existente.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateClass($id, Request $request)
    {
        $class = ClassInfo::find($id);
        if (!$class) {
            return response()->json(['message' => 'Clase no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'subclass_level' => 'sometimes|nullable|integer'
        ]);

        // Actualiza Class
        if (isset($validated['name'])) $class->name = $validated['name'];
        if (array_key_exists('description', $validated)) $class->description = $validated['description'];
        if (array_key_exists('subclass_level', $validated)) $class->subclass_level = $validated['subclass_level'];
        $class->save();

        return response()->json(['message' => 'Clase actualizada correctamente', 'class' => $class]);
    }
    
    /**
     * Elimina un Armor y su equipo asociado.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteArmor($id)
    {
        $armor = Armor::find($id);
        if (!$armor) {
            return response()->json(['message' => 'Armadura no encontrada'], 404);
        }
        $equipmentId = $armor->equipment_id;
        $armor->delete();
        Equipment::where('equipment_id', $equipmentId)->delete();

        return response()->json(['message' => 'Armadura y equipo asociado eliminados correctamente']);
    }

    /**
     * Elimina un Weapon y su equipo asociado.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteWeapon($id)
    {
        $weapon = Weapon::find($id);
        if (!$weapon) {
            return response()->json(['message' => 'Arma no encontrada'], 404);
        }
        $equipmentId = $weapon->equipment_id;
        $weapon->delete();
        Equipment::where('equipment_id', $equipmentId)->delete();

        return response()->json(['message' => 'Arma y equipo asociado eliminados correctamente']);
    }

    /**
     * Elimina un Artifact y su equipo asociado.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteArtifact($id)
    {
        $artifact = Artifact::find($id);
        if (!$artifact) {
            return response()->json(['message' => 'Artefacto no encontrado'], 404);
        }
        $equipmentId = $artifact->equipment_id;
        $artifact->delete();
        Equipment::where('equipment_id', $equipmentId)->delete();

        return response()->json(['message' => 'Artefacto y equipo asociado eliminados correctamente']);
    }

    /**
     * Elimina un Equipment.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEquipment($id)
    {
        $equipment = Equipment::find($id);
        if (!$equipment) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }
        $equipment->delete();

        return response()->json(['message' => 'Equipo eliminado correctamente']);
    }

    /**
     * Elimina un Feature.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFeature($id)
    {
        $feature = Feature::find($id);
        if (!$feature) {
            return response()->json(['message' => 'Feature no encontrada'], 404);
        }
        $feature->delete();

        return response()->json(['message' => 'Feature eliminada correctamente']);
    }

    /**
     * Elimina una Subclass.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSubclass($id)
    {
        $subclass = Subclass::find($id);
        if (!$subclass) {
            return response()->json(['message' => 'Subclase no encontrada'], 404);
        }
        $subclass->delete();

        return response()->json(['message' => 'Subclase eliminada correctamente']);
    }

    /**
     * Elimina una Class.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteClass($id)
    {
        $class = ClassInfo::find($id);
        if (!$class) {
            return response()->json(['message' => 'Clase no encontrada'], 404);
        }
        $class->delete();

        return response()->json(['message' => 'Clase eliminada correctamente']);
    }

    /**
     * Lista todas las Features.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listFeatures(Request $request)
    {
        $features = Feature::all()->map(function($feature) {
            return [
                'feature_id' => $feature->feature_id,
                'name' => $feature->name,
                'description' => $feature->description
            ];
        });

        return response()->json($features);
    }

    /**
     * Muestra los detalles de una Feature específica.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewFeature($id, Request $request)
    {
        $feature = Feature::with(['classes', 'subclasses'])->find($id);

        if (!$feature) {
            return response()->json(['message' => 'Feature no encontrada'], 404);
        }

        // Mapea las clases y subclases asociadas a la feature
        $classes = $feature->classes->map(function($class) {
            return [
                'class_id' => $class->class_id,
                'name' => $class->name,
                'level' => $class->pivot->level ?? null
            ];
        });

        $subclasses = $feature->subclasses->map(function($subclass) {
            return [
                'subclass_id' => $subclass->subclass_id,
                'name' => $subclass->name,
                'class_id' => $subclass->class_id,
                'level' => $subclass->pivot->level ?? null
            ];
        });

        return response()->json([
            'feature_id' => $feature->feature_id,
            'name' => $feature->name,
            'description' => $feature->description,
            'classes' => $classes,
            'subclasses' => $subclasses
        ]);
    }
}