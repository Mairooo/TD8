<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            abort(403, 'Accès refusé');
        }

        $user = auth()->user();
        
        // Les admins ont accès à tout
        if ($user->role === 'admin') {
            return $next($request);
        }
        
        // Sinon, vérifier le rôle spécifique
        if ($user->role !== $role) {
            abort(403, 'Accès refusé');
        }

        return $next($request);
    }
}
