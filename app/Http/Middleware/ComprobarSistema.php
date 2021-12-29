<?php

namespace App\Http\Middleware;

use App\System\Config\Validaciones;
use Closure;
use Illuminate\Http\Request;

class ComprobarSistema
{
    use Validaciones;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($this->validarSistema()) {
            return $next($request);
        } else {
            abort(401);
        }
    }
}