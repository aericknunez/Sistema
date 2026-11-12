<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * TEMPORAL (migracion a connect): protege las rutas de routes/legacy-import.php.
 * El header x-token debe coincidir con LEGACY_IMPORT_TOKEN; sin token configurado responde 403 siempre.
 * Se borra junto con la importacion (ver connect/docs/pending/plan-migracion-sistema.md).
 */
class LegacyImportToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = config('sistema.legacy_import_token');
        $header = (string) $request->header('x-token');

        if (!$token || !hash_equals($token, $header)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return $next($request);
    }
}
