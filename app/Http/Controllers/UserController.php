<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the authenticated user's information.
     * This method retrieves the user's name and type and returns them in a JSON response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'success' => true,
            'data' => [
                'username' => $user->username,
                'role' => $user->role,
                'is_admin' => $user->role === 'admin' ? true : false
            ]
        ]);
    }
}