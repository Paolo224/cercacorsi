<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAccess
{
    public function handle($request, Closure $next)
    {
        // Verifica se l'utente ha la colonna id_admin diversa da null
        if (Auth::check() && Auth::user()->id_admin !== 0) {
            // Se l'utente non può accedere, puoi reindirizzarlo o fare altro
            return abort(403);
        }

        return $next($request);
    }
}
