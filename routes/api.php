<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;

// Public routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/register', [AuthController::class, 'register']);


// Protected routes
Route::middleware(['auth'])->group(function () {
    // Admin routes
    //Route::get('/', [AdminController::class, ''])->middleware('role:admin');


    // User routes
    Route::get('/characters', [UserController::class, 'listCharacters'])->middleware('role:user');
    Route::get('/characters/{id}', [UserController::class, 'viewCharacter'])->middleware('role:user');
    Route::post('/characters/create', [UserController::class, 'createCharacter'])->middleware('role:user');
    Route::put('/characters/{id}/update', [UserController::class, 'updateCharacter'])->middleware('role:user');
    Route::delete('/characters/{id}/delete', [UserController::class, 'deleteCharacter'])->middleware('role:user');
    Route::get('/characters/{id}/equipment', [UserController::class, 'listCharacterEquipment'])->middleware('role:user');
    Route::post('/characters/{id}/equipment/add', [UserController::class, 'addEquipmentToCharacter'])->middleware('role:user');
    Route::put('/characters/{id}/equipment/{equipmentId}/update', [UserController::class, 'updateEquipmentForCharacter'])->middleware('role:user');
    Route::delete('/characters/{id}/equipment/{equipmentId}/remove', [UserController::class, 'removeEquipmentFromCharacter'])->middleware('role:user');
    Route::post('/characters/{id}/level-up', [UserController::class, 'levelUpCharacter'])->middleware('role:user');

    Route::get('/campaigns', [UserController::class, 'listCampaigns'])->middleware('role:user');
    Route::get('/campaigns/{id}', [UserController::class, 'viewCampaign'])->middleware('role:user');
    Route::post('/campaigns/create', [UserController::class, 'createCampaign'])->middleware('role:user');
    Route::put('/campaigns/{id}/update', [UserController::class, 'updateCampaign'])->middleware('role:user');
    Route::delete('/campaigns/{id}/delete', [UserController::class, 'deleteCampaign'])->middleware('role:user');

    Route::get('/campaigns/{id}/diary', [UserController::class, 'listCampaignDiary'])->middleware('role:user');
    Route::get('/campaigns/{id}/diary/{entryId}', [UserController::class, 'viewDiaryEntry'])->middleware('role:user');
    Route::post('/campaigns/{id}/diary/create', [UserController::class, 'createDiaryEntry'])->middleware('role:user');
    Route::put('/campaigns/{id}/diary/{entryId}/update', [UserController::class, 'updateDiaryEntry'])->middleware('role:user');
    Route::delete('/campaigns/{id}/diary/{entryId}/delete', [UserController::class, 'deleteDiaryEntry'])->middleware('role:user');

    Route::get('/classes', [UserController::class, 'listClasses'])->middleware('role:user');
    Route::get('/classes/{id}', [UserController::class, 'viewClass'])->middleware('role:user');
    Route::get('/classes/types', [UserController::class, 'listClassTypes'])->middleware('role:user');
    Route::get('/classes/{id}/features', [UserController::class, 'listClassFeatures'])->middleware('role:user');
    Route::get('/classes/{id}/features/{featureId}', [UserController::class, 'viewClassFeature'])->middleware('role:user');
    Route::get('/classes/{id}/subclasses', [UserController::class, 'listClassSubclasses'])->middleware('role:user');
    Route::get('/classes/{id}/subclasses/{subclassId}', [UserController::class, 'viewClassSubclass'])->middleware('role:user');
    Route::get('/classes/{id}/subclasses/types', [UserController::class, 'listSubclassTypes'])->middleware('role:user');
    Route::get('/classes/{id}/subclasses/{subclassId}/features', [UserController::class, 'listSubclassFeatures'])->middleware('role:user');
    Route::get('/classes/{id}/subclasses/{subclassId}/features/{featureId}', [UserController::class, 'viewSubclassFeature'])->middleware('role:user');

    Route::get('/equipment', [UserController::class, 'listEquipment'])->middleware('role:user');
    Route::get('/equipment/{id}', [UserController::class, 'viewEquipment'])->middleware('role:user');
    Route::get('/equipmment/armor', [UserController::class, 'listArmor'])->middleware('role:user');
    Route::get('/equipment/armor/{id}', [UserController::class, 'viewArmor'])->middleware('role:user');
    Route::get('/equipment/weapons', [UserController::class, 'listWeapons'])->middleware('role:user');
    Route::get('/equipment/weapons/{id}', [UserController::class, 'viewWeapon'])->middleware('role:user');
    Route::get('/equipmeent/artifacts', [UserController::class, 'listArtifacts'])->middleware('role:user');
    Route::get('/equipment/artifacts/{id}', [UserController::class, 'viewArtifact'])->middleware('role:user');

});