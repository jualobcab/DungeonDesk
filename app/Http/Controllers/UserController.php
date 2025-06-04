<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Characters
    public function listCharacters() {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        $characters = Character::where('id_user', $user->id_user)->get();
        
        return response()->json($characters);
    }
    public function viewCharacter($id, Request $request) {
        $user = Auth::user();
        $character = Character::with(['user', 'c_classes', 'c_equipments', 'c_members', 'diaries'])
            ->where('id_character', $id)
            ->where('id_user', $user->id)
            ->first();

        if (!$character) {
            return response()->json([
                'message' => 'Character not found'
            ], 404);
        }

        return response()->json($character);
    }
    public function createCharacter(Request $request) {}
    public function updateCharacter($id, Request $request) {}
    public function deleteCharacter($id, Request $request) {}
    public function listCharacterEquipment($id, Request $request) {}
    public function addEquipmentToCharacter($id, Request $request) {}
    public function updateEquipmentForCharacter($id, $equipmentId, Request $request) {}
    public function removeEquipmentFromCharacter($id, $equipmentId, Request $request) {}
    public function levelUpCharacter($id, Request $request) {}

    // Campaigns
    public function listCampaigns(Request $request) {}
    public function viewCampaign($id, Request $request) {}
    public function createCampaign(Request $request) {}
    public function updateCampaign($id, Request $request) {}
    public function deleteCampaign($id, Request $request) {}

    // Diary
    public function listCampaignDiary($id, Request $request) {}
    public function viewDiaryEntry($id, $entryId, Request $request) {}
    public function createDiaryEntry($id, Request $request) {}
    public function updateDiaryEntry($id, $entryId, Request $request) {}
    public function deleteDiaryEntry($id, $entryId, Request $request) {}

    // Classes
    public function listClasses(Request $request) {}
    public function viewClass($id, Request $request) {}
    public function listClassTypes(Request $request) {}
    public function listClassFeatures($id, Request $request) {}
    public function viewClassFeature($id, $featureId, Request $request) {}
    public function listClassSubclasses($id, Request $request) {}
    public function viewClassSubclass($id, $subclassId, Request $request) {}
    public function listSubclassTypes($id, Request $request) {}
    public function listSubclassFeatures($id, $subclassId, Request $request) {}
    public function viewSubclassFeature($id, $subclassId, $featureId, Request $request) {}

    // Equipment
    public function listEquipment(Request $request) {}
    public function viewEquipment($id, Request $request) {}
    public function listArmor(Request $request) {}
    public function viewArmor($id, Request $request) {}
    public function listWeapons(Request $request) {}
    public function viewWeapon($id, Request $request) {}
    public function listArtifacts(Request $request) {}
    public function viewArtifact($id, Request $request) {}
}
