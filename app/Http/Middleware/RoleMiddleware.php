<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {

        // The user's role must be determined based on the session token (bearer token)
        // Using the token, we select the user and retrieve their role_id
        // Finally, from the roles table, we fetch the name of the role
        /*$userRole = '';

        if (!in_array($userRole, $roles)) {
            // If the role is different, we can choose to redirect the user to the home page or terminate the session
        }*/

        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'error' => 'No token provided'
            ], 401);
        }

        // Find user by session token
        $user = User::where('session_token', $token)->first();

        if (!$user) {
            return response()->json([
                'error' => 'Invalid token'
            ], 401);
        }

        // Get the role type from the Role model
        $userRole = Role::find($user->role_id);

        if (!$userRole || $userRole->role_type != $role) {
            return response()->json([
                'error' => 'Unauthorized. Insufficient role permissions.'
            ], 403);
        }

        // Set the authenticated user for the request
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $next($request);
    }
}
