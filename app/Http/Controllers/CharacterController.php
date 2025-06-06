<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Campaign;
use App\Models\CEquipment;
use App\Models\CClass;
use App\Models\ClassInfo;
use App\Models\Subclass;

class CharacterController extends Controller
{
    /**
     * Lista todos los personajes del usuario autenticado.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listCharacters(Request $request) {
        $user = $request->user();
        
        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        $characters = Character::where('id_user', $user->id_user)
            ->with(['c_members.campaign'])
            ->get()
            ->map(function ($character) {
                return [
                    'id_character' => $character->id_character,
                    'name' => $character->name,
                    'level' => $character->level,
                    'biography' => $character->biography,
                    'campaign_name' => $character->c_members->first() ? 
                        $character->c_members->first()->campaign->name : 
                        null
                ];
            });
        
        return response()->json($characters);
    }
    /**
     * Muestra un personaje específico.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewCharacter($id, Request $request) {
        $user = $request->user();
        
        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->with([
                'c_members.campaign', 
                'c_classes.classInfo', 
                'c_classes.subclass'])
            ->first();
        
        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para verlo'
            ], 404);
        }
        
        // Obtener el nombre de la campaña (solo una)
        $campaign_name = null;
        $cMember = $character->c_members->first();
        if ($cMember && $cMember->campaign) {
            $campaign_name = $cMember->campaign->name;
        }

        // Clases y niveles
        $classes = $character->c_classes->map(function($cClass) {
            return [
                'class_id' => $cClass->class_id,
                'class_name' => $cClass->classInfo ? $cClass->classInfo->name : null,
                'level' => $cClass->level,
                'subclass_id' => $cClass->subclass_id,
                'subclass_name' => $cClass->subclass ? $cClass->subclass->name : null
            ];
        });

        return response()->json([
            'id_character' => $character->id_character,
            'name' => $character->name,
            'level' => $character->level,
            'biography' => $character->biography,
            'campaign_name' => $campaign_name,
            'classes' => $classes
        ]);
    }
    /**
     * Crea un nuevo personaje.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCharacter(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Validar los datos de entrada
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|integer|exists:classInfo,class_id',
            'biography' => 'nullable|string'
        ]);

        // Crear el personaje
        $character = new \App\Models\Character();
        $character->id_user = $user->id_user;
        $character->name = $validated['name'];
        $character->level = 1;
        $character->biography = $validated['biography'] ?? "";
        $character->save();

        // Añadir entrada en c_classes
        $cClass = new \App\Models\CClass();
        $cClass->id_character = $character->id_character;
        $cClass->class_id = $validated['class'];
        $cClass->save();

        return response()->json([
            'message' => 'Personaje creado correctamente',
            'character' => [
                'id_character' => $character->id_character,
                'name' => $character->name,
                'level' => $character->level,
                'biography' => $character->biography,
                'class_id' => $cClass->class_id
            ]
        ], 201);
    }
    /**
     * Actualiza un personaje existente.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCharacter($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para editarlo'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'biography' => 'sometimes|nullable|string'
        ]);

        if (array_key_exists('name', $validated)) {
            $character->name = $validated['name'];
        }
        if (array_key_exists('biography', $validated)) {
            $character->biography = $validated['biography'];
        }

        $character->save();

        return response()->json([
            'message' => 'Personaje actualizado correctamente',
            'character' => [
                'id_character' => $character->id_character,
                'name' => $character->name,
                'level' => $character->level,
                'biography' => $character->biography
            ]
        ]);
    }
    /**
     * Elimina un personaje.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCharacter($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para borrarlo'
            ], 404);
        }

        // Elimina el character encontrado
        $character->delete();

        return response()->json([
            'message' => 'Personaje borrado correctamente'
        ]);
    }
    /**
     * Lista el equipo de un personaje específico.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listCharacterEquipment($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Verifica que el personaje pertenezca al usuario autenticado
        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para ver su equipo'
            ], 404);
        }

        // Obtiene el equipo del personaje
        $equipments = $character->c_equipments()
            ->with('equipment')
            ->get()
            ->map(function ($cEquipment) {
                return [
                    'equipment_id' => $cEquipment->equipment_id,
                    'name' => $cEquipment->equipment->name ?? null,
                    'rarity' => $cEquipment->equipment->rarity ?? null,
                    'description' => $cEquipment->equipment->description ?? null,
                    'type' => $cEquipment->equipment->type ?? null,
                    'quantity' => $cEquipment->quantity,
                ];
            });

        return response()->json($equipments);
    }
    public function addEquipmentToCharacter($id, Request $request) {
        $user = $request->user();

    if (!$user) {
        return response()->json([
            'message' => 'Usuario no autenticado'
        ], 401);
    }

    // Validar que el personaje existe y pertenece al usuario
    $character = Character::where('id_character', $id)
        ->where('id_user', $user->id_user)
        ->first();

    if (!$character) {
        return response()->json([
            'message' => 'Personaje no encontrado o no tienes permiso para modificarlo'
        ], 404);
    }

    // Validar el input
    $validated = $request->validate([
        'equipment_id' => 'required|integer|exists:equipment,equipment_id'
    ]);

    // Comprobar si el personaje ya tiene ese equipo
    $alreadyAssigned = $character->c_equipments()
        ->where('equipment_id', $validated['equipment_id'])
        ->exists();

    if ($alreadyAssigned) {
        return response()->json([
            'message' => 'El personaje ya tiene asignado este equipo'
        ], 409);
    }

    // Asignar el equipo al personaje
    $cEquipment = new \App\Models\CEquipment();
    $cEquipment->id_character = $character->id_character;
    $cEquipment->equipment_id = $validated['equipment_id'];
    $cEquipment->quantity = 1;
    $cEquipment->save();

    return response()->json([
        'message' => 'Equipo asignado correctamente al personaje',
        'equipment_id' => $cEquipment->equipment_id,
        'quantity' => $cEquipment->quantity
    ], 201);
    }
    /**
     * Actualiza la cantidad de un equipo asignado a un personaje.
     *
     * @param int $id
     * @param int $equipmentId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEquipmentForCharacter($id, $equipmentId, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Verifica que el personaje pertenece al usuario
        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para modificarlo'
            ], 404);
        }

        // Verifica que el equipment está asignado al personaje
        $cEquipment = $character->c_equipments()
            ->where('equipment_id', $equipmentId)
            ->first();

        if (!$cEquipment) {
            return response()->json([
                'message' => 'El personaje no tiene asignado este equipo'
            ], 404);
        }

        // Valida la cantidad
        $validated = $request->validate([
            'quantity' => 'required|integer'
        ]);

        if ($validated['quantity'] <= 0) {
            return response()->json([
                'message' => 'La cantidad debe ser un número positivo mayor que cero'
            ], 422);
        }

        $cEquipment->update(['quantity' => $validated['quantity']]);

        return response()->json([
            'message' => 'Cantidad de equipo actualizada correctamente',
            'equipment_id' => $cEquipment->equipment_id,
            'quantity' => $cEquipment->quantity
        ]);
    }
    /**
     * Elimina un equipo asignado a un personaje.
     *
     * @param int $id
     * @param int $equipmentId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeEquipmentFromCharacter($id, $equipmentId, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Verifica que el personaje pertenece al usuario
        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para modificarlo'
            ], 404);
        }

        // Verifica que el equipment está asignado al personaje
        $cEquipment = \App\Models\CEquipment::where('id_character', $character->id_character)
            ->where('equipment_id', $equipmentId)
            ->first();

        if (!$cEquipment) {
            return response()->json([
                'message' => 'El personaje no tiene asignado este equipo'
            ], 404);
        }

        CEquipment::where('id_character', $character->id_character)
            ->where('equipment_id', $equipmentId)
            ->delete();

        return response()->json([
            'message' => 'Equipo eliminado correctamente del personaje'
        ]);
    }
    /**
     * Aumenta el nivel de un personaje.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function levelUpCharacter($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $validated = $request->validate([
            'class_id' => 'required|integer|exists:classInfo,class_id',
            'subclass_id' => 'nullable|integer'
        ]);

        // Buscar personaje
        $character = Character::where('id_character', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Personaje no encontrado o no tienes permiso para modificarlo'
            ], 404);
        }

        // Buscar la clase
        $classInfo = ClassInfo::find($validated['class_id']);
        if (!$classInfo) {
            return response()->json([
                'message' => 'Clase no encontrada'
            ], 404);
        }

        // Buscar si el personaje ya tiene esa clase
        $cClass = CClass::where('id_character', $character->id_character)
            ->where('class_id', $validated['class_id'])
            ->first();

        if ($cClass) {
            // Ya tiene la clase, sube el nivel
            $newClassLevel = $cClass->level + 1;
            $character->level += 1;

            // Si el nuevo nivel es igual a subclass_level, requiere subclass_id
            if ($classInfo->subclass_level && $newClassLevel == $classInfo->subclass_level) {
                if (empty($validated['subclass_id'])) {
                    return response()->json([
                        'message' => 'Debes indicar un subclass_id para este nivel'
                    ], 422);
                }
                // Verifica que el subclass_id pertenezca a la clase
                $subclass = Subclass::where('subclass_id', $validated['subclass_id'])
                    ->where('class_id', $classInfo->class_id)
                    ->first();
                if (!$subclass) {
                    return response()->json([
                        'message' => 'El subclass_id no pertenece a la clase seleccionada'
                    ], 422);
                }
                $cClass->subclass_id = $subclass->subclass_id;
            }

            CClass::where('id_character', $character->id_character)
                ->where('class_id', $classInfo->class_id)
                ->update([
                    'level' => $newClassLevel,
                    'subclass_id' => $cClass->subclass_id ?? null
                ]);
            $character->save();

            // Vuelve a consultar el registro actualizado
            $cClass = CClass::where('id_character', $character->id_character)
                ->where('class_id', $classInfo->class_id)
                ->first();

            return response()->json([
                'message' => 'Nivel aumentado en la clase existente',
                'character_level' => $character->level,
                'class_level' => $cClass->level,
                'subclass_id' => $cClass->subclass_id ?? null
            ]);
        } else {
            // No tiene la clase, crea la entrada en c_classes
            $newClassLevel = 1;
            // Si el nivel al que sube es igual a subclass_level, requiere subclass_id
            if ($classInfo->subclass_level && $newClassLevel == $classInfo->subclass_level) {
                if (empty($validated['subclass_id'])) {
                    return response()->json([
                        'message' => 'Debes indicar un subclass_id para este nivel'
                    ], 422);
                }
                $subclass = Subclass::where('subclass_id', $validated['subclass_id'])
                    ->where('class_id', $classInfo->class_id)
                    ->first();
                if (!$subclass) {
                    return response()->json([
                        'message' => 'El subclass_id no pertenece a la clase seleccionada'
                    ], 422);
                }
            }

            $character->level += 1;
            $character->save();

            $cClass = new CClass();
            $cClass->id_character = $character->id_character;
            $cClass->class_id = $classInfo->class_id;
            $cClass->level = 1;
            if ($classInfo->subclass_level && $newClassLevel == $classInfo->subclass_level) {
                $cClass->subclass_id = $validated['subclass_id'];
            }
            $cClass->save();

            return response()->json([
                'message' => 'Clase añadida y nivel aumentado',
                'character_level' => $character->level,
                'class_level' => $cClass->level,
                'subclass_id' => $cClass->subclass_id ?? null
            ]);
        }
    }
}
