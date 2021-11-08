<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Siapertura
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('apertura_caja')) {
            return redirect('venta.rapida');
        }

        return $next($request);
    }
}
