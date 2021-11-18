<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PantallaVerified
{

    

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()) {
            return redirect('pantalla');
        }

        return $next($request);
    }
}
