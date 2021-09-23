<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificarPermissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $arrayPerfil)
    {
        //verificar ser o usuario é administrador
        if (Auth::user()->id_perfil == 1) {
            return $next($request);
        }
        $arrayPerfil = explode(',', $arrayPerfil);
        if (!in_array(Auth::user()->id_perfil, $arrayPerfil)) {
            return redirect()->route('dashboard')->with('alert', "Você não tem permissão para essa ação.");
        }

        return $next($request);
    }
}
