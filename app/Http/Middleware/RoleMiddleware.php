<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!in_array(Auth::user()->role, $roles)) {
            return response()->json(['error' => 'Forbidden: Insufficient Permissions'], 403);
        }

        return $next($request);
    }
}
