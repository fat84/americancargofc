<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\SesionActivaController;
use Illuminate\Support\Facades\Session;

class SesionActiva
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
        $secactiva = new SesionActivaController();
        if(! $secactiva->isCodigoSesion(session('codigosesion'))) {
            return redirect()->guest('logout');
        }
        return $next($request);
    }
}
