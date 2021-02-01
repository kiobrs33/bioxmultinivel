<?php

namespace biox2020\Http\Middleware;

use Closure;

class AccessControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $tipo_usuario = Auth()->user()->TipoUsuario->tipo_usuario;

        // if($tipo_usuario == 'admin'){

        // }


        return $next($request);
    }
}