<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NoAperturaCaja
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
        if (!session('apertura_caja')) {
            return redirect('error-apertura');
        }

        return $next($request);
    }
}
