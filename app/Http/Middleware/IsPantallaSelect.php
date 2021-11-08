<?php

namespace App\Http\Middleware;

use App\Models\ConfigPrincipal;
use Closure;
use Illuminate\Http\Request;

class IsPantallaSelect
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
        //1 pantalla, 2 ticket
        $pantalla = ConfigPrincipal::select('ticket_pantalla')->where('id', 1)->first();

        if ($pantalla->ticket_pantalla == 1) {
            return $next($request);
        } else {
            abort(401);
        }

    }
}
