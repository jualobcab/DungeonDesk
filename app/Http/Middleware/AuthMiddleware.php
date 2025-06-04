<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Carbon;
use App\Models\User;

use App\Helpers\ResponseBuilder;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionToken = $request->bearerToken();

		if (is_null($sessionToken)) {
			return ResponseBuilder::create()
                ->status(Response::HTTP_UNAUTHORIZED)
                ->error('INVALID SESSION')
				->build();
		}

        if (!User::where('session_token', $sessionToken)->exists()) {
            return ResponseBuilder::create()
				->status(Response::HTTP_NOT_FOUND)
				->error('INVALID TOKEN')
				->build();
        }

        $user = User::where('session_token', $sessionToken)->first();

        $user->last_activity = Carbon::now()->toDateTimeString();
        $user->save();

        return $next($request);
    }
}
