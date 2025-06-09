<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\EquipmentController;

use App\Models\User;

// Public routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:santum');
Route::post('/register', [AuthController::class, 'register']);

// Classes features
Route::get('/classes', [ClassesController::class, 'listClasses']);
Route::get('/classes/types', [ClassesController::class, 'listClassTypes']);
Route::get('/classes/{id}', [ClassesController::class, 'viewClass']);
Route::get('/classes/{id}/features', [ClassesController::class, 'listClassFeatures']);
Route::get('/classes/{id}/features/{featureId}', [ClassesController::class, 'viewClassFeature']);
Route::get('/classes/{id}/subclasses', [ClassesController::class, 'listClassSubclasses']);
Route::get('/classes/{id}/subclasses/{subclassId}', [ClassesController::class, 'viewClassSubclass']);
Route::get('/classes/{id}/subclasses/types', [ClassesController::class, 'listSubclassTypes']);
Route::get('/classes/{id}/subclasses/{subclassId}/features', [ClassesController::class, 'listSubclassFeatures']);
Route::get('/classes/{id}/subclasses/{subclassId}/features/{featureId}', [ClassesController::class, 'viewSubclassFeature']);

// Equipment routes
Route::get('/equipment', [EquipmentController::class, 'listEquipment']);
Route::get('/equipment/armors', [EquipmentController::class, 'listArmor']);
Route::get('/equipment/armors/{id}', [EquipmentController::class, 'viewArmor']);
Route::get('/equipment/weapons', [EquipmentController::class, 'listWeapons']);
Route::get('/equipment/weapons/{id}', [EquipmentController::class, 'viewWeapon']);
Route::get('/equipment/artifacts', [EquipmentController::class, 'listArtifacts']);
Route::get('/equipment/artifacts/{id}', [EquipmentController::class, 'viewArtifact']);
Route::get('/equipment/{id}', [EquipmentController::class, 'viewEquipment']);

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Characters routes
    Route::get('/characters', [CharacterController::class, 'listCharacters']);
    Route::post('/characters/create', [CharacterController::class, 'createCharacter']);
    Route::get('/characters/{id}', [CharacterController::class, 'viewCharacter']);
    Route::get('/characters/{id}/features', [CharacterController::class, 'listCharacterFeatures']);
    Route::put('/characters/{id}/update', [CharacterController::class, 'updateCharacter']);
    Route::delete('/characters/{id}/delete', [CharacterController::class, 'deleteCharacter']);
    Route::get('/characters/{id}/equipment', [CharacterController::class, 'listCharacterEquipment']);
    Route::post('/characters/{id}/equipment/add', [CharacterController::class, 'addEquipmentToCharacter']);
    Route::put('/characters/{id}/equipment/{equipmentId}/update', [CharacterController::class, 'updateEquipmentForCharacter']);
    Route::delete('/characters/{id}/equipment/{equipmentId}/delete', [CharacterController::class, 'removeEquipmentFromCharacter']);
    Route::post('/characters/{id}/level-up', [CharacterController::class, 'levelUpCharacter']);

    Route::get('/campaigns', [CampaignController::class, 'listCampaigns']);
    Route::post('/campaigns/create', [CampaignController::class, 'createCampaign']);
    Route::get('/campaigns/{id}', [CampaignController::class, 'viewCampaign']);
    Route::put('/campaigns/{id}/update', [CampaignController::class, 'updateCampaign']);
    Route::delete('/campaigns/{id}/delete', [CampaignController::class, 'deleteCampaign']);

    Route::get('/campaigns/{id}/diary', [DiaryController::class, 'listCampaignDiary']);
    Route::post('/campaigns/{id}/diary/create', [DiaryController::class, 'createDiaryEntry']);
    Route::get('/campaigns/{id}/diary/{entryId}', [DiaryController::class, 'viewDiaryEntry']);
    Route::put('/campaigns/{id}/diary/{entryId}/update', [DiaryController::class, 'updateDiaryEntry']);
    Route::delete('/campaigns/{id}/diary/{entryId}/delete', [DiaryController::class, 'deleteDiaryEntry']);
});

Route::middleware(['auth:sanctum', \App\Http\Middleware\AdminOnly::class])->group(function () {
    // Rutas de admin
});