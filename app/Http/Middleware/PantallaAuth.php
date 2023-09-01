<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class PantallaAuth  extends Middleware
{

    

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('pantalla.login');
        } 

    }
}
