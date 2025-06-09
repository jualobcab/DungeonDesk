<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\CMember;

class DiaryController extends Controller
{
    public function listCampaignDiary($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Busca los diarios de la campaña con el personaje relacionado
        $diaryEntries = Diary::where('id_campaign', $id)
            ->with('character')
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($entry) {
                return [
                    'entry_id' => $entry->entry_id,
                    'character_name' => $entry->character ? $entry->character->name : null,
                    'entry' => $entry->entry,
                    'date' => $entry->date ? $entry->date->format('Y-m-d') : null
                ];
            });

        return response()->json($diaryEntries);
    }
    public function viewDiaryEntry($id, $entryId, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Busca la entrada del diario con el personaje relacionado
        $diary = Diary::where('id_campaign', $id)
            ->where('entry_id', $entryId)
            ->with('character')
            ->first();

        if (!$diary) {
            return response()->json([
                'message' => 'Entrada de diario no encontrada'
            ], 404);
        }

        return response()->json([
            'entry_id' => $diary->entry_id,
            'character_name' => $diary->character ? $diary->character->name : null,
            'entry' => $diary->entry,
            'date' => $diary->date ? $diary->date->format('Y-m-d') : null
        ]);
    }
    public function createDiaryEntry($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $validated = $request->validate([
            'id_character' => 'required|integer|exists:characters,id_character',
            'entry' => 'required|string',
            'date' => 'required|date'
        ]);

        // Comprobar que el personaje está en la campaña
        $isMember = CMember::where('id_campaign', $id)
            ->where('id_character', $validated['id_character'])
            ->exists();

        if (!$isMember) {
            return response()->json([
                'message' => 'El personaje no pertenece a esta campaña'
            ], 403);
        }

        $diary = new Diary();
        $diary->id_campaign = $id;
        $diary->id_character = $validated['id_character'];
        $diary->entry = $validated['entry'];
        $diary->date = $validated['date'];
        $diary->save();

        return response()->json([
            'message' => 'Entrada de diario creada correctamente',
            'diary_entry' => [
                'entry_id' => $diary->entry_id,
                'id_character' => $diary->id_character,
                'entry' => $diary->entry,
                'date' => $diary->date ? $diary->date->format('Y-m-d') : null
            ]
        ], 201);
    }
    public function updateDiaryEntry($id, $entryId, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Busca la entrada del diario
        $diary = Diary::where('id_campaign', $id)
            ->where('entry_id', $entryId)
            ->first();

        if (!$diary) {
            return response()->json([
                'message' => 'Entrada de diario no encontrada'
            ], 404);
        }

        $validated = $request->validate([
            'id_character' => 'sometimes|required|integer|exists:characters,id_character',
            'entry' => 'sometimes|required|string',
            'date' => 'sometimes|required|date'
        ]);

        // Si se va a cambiar el personaje, comprobar que pertenece a la campaña
        if (isset($validated['id_character'])) {
            $isMember = CMember::where('id_campaign', $id)
                ->where('id_character', $validated['id_character'])
                ->exists();

            if (!$isMember) {
                return response()->json([
                    'message' => 'El personaje no pertenece a esta campaña'
                ], 403);
            }
            $diary->id_character = $validated['id_character'];
        }

        if (isset($validated['entry'])) {
            $diary->entry = $validated['entry'];
        }

        if (isset($validated['date'])) {
            $diary->date = $validated['date'];
        }

        $diary->save();

        return response()->json([
            'message' => 'Entrada de diario actualizada correctamente',
            'diary_entry' => [
                'entry_id' => $diary->entry_id,
                'id_character' => $diary->id_character,
                'entry' => $diary->entry,
                'date' => $diary->date ? $diary->date->format('Y-m-d') : null
            ]
        ]);
    }
    public function deleteDiaryEntry($id, $entryId, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Busca la entrada del diario por campaña y entry_id
        $diary = Diary::where('id_campaign', $id)
            ->where('entry_id', $entryId)
            ->first();

        if (!$diary) {
            return response()->json([
                'message' => 'Entrada de diario no encontrada'
            ], 404);
        }

        $diary->delete();

        return response()->json([
            'message' => 'Entrada de diario eliminada correctamente'
        ]);
    }
}
