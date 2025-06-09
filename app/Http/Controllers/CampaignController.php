<?php

namespace App\Http\Controllers;
use App\Models\Campaign;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * List all campaigns for the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listCampaigns(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Obtiene todas las campañas donde el usuario es el creador o tiene personajes en la campaña
        $campaigns = Campaign::where('id_user', $user->id_user)
            ->withCount('c_members')
            ->get()
            ->map(function ($campaign) {
                return [
                    'id_campaign' => $campaign->id_campaign,
                    'name' => $campaign->name,
                    'description' => $campaign->description,
                    'members_count' => $campaign->c_members_count
                ];
            });

        return response()->json($campaigns);
    }
    /**
     * View a specific campaign by ID.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewCampaign($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // Busca la campaña y carga los miembros y personajes relacionados
        $campaign = Campaign::where('id_campaign', $id)
            ->with(['c_members.character'])
            ->first();

        if (!$campaign) {
            return response()->json([
                'message' => 'Campaña no encontrada'
            ], 404);
        }

        // Lista de personajes en la campaña
        $characters = $campaign->c_members->map(function($member) {
            return [
                'id_character' => $member->character ? $member->character->id_character : null,
                'name' => $member->character ? $member->character->name : null,
                'level' => $member->character ? $member->character->level : null,
            ];
        });

        return response()->json([
            'id_campaign' => $campaign->id_campaign,
            'name' => $campaign->name,
            'description' => $campaign->description,
            'characters' => $characters
        ]);
    }
    /**
     * Create a new campaign for the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCampaign(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $campaign = new Campaign();
        $campaign->id_user = $user->id_user;
        $campaign->name = $validated['name'];
        $campaign->description = $validated['description'] ?? null;
        $campaign->save();

        return response()->json([
            'message' => 'Campaña creada correctamente',
            'campaign' => [
                'id_campaign' => $campaign->id_campaign,
                'name' => $campaign->name,
                'description' => $campaign->description
            ]
        ], 201);
    }
    /**
     * Update an existing campaign for the authenticated user.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCampaign($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $campaign = Campaign::where('id_campaign', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$campaign) {
            return response()->json([
                'message' => 'Campaña no encontrada o no tienes permiso para editarla'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string'
        ]);

        if (array_key_exists('name', $validated)) {
            $campaign->name = $validated['name'];
        }
        if (array_key_exists('description', $validated)) {
            $campaign->description = $validated['description'];
        }

        $campaign->save();

        return response()->json([
            'message' => 'Campaña actualizada correctamente',
            'campaign' => [
                'id_campaign' => $campaign->id_campaign,
                'name' => $campaign->name,
                'description' => $campaign->description
            ]
        ]);
    }
    /**
     * Delete a campaign for the authenticated user.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCampaign($id, Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $campaign = Campaign::where('id_campaign', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$campaign) {
            return response()->json([
                'message' => 'Campaña no encontrada o no tienes permiso para eliminarla'
            ], 404);
        }

        // Elimina los miembros y diarios relacionados si es necesario
        $campaign->c_members()->delete();
        $campaign->diaries()->delete();

        $campaign->delete();

        return response()->json([
            'message' => 'Campaña eliminada correctamente'
        ]);
    }
}
