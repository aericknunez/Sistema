<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{
    public function processSync(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'file' => 'required|file|mimes:json'
        ]);

        // Obtener el archivo
        $file = $request->file('file');
        $content = file_get_contents($file->getRealPath());
        $data = json_decode($content, true);

        // Comenzar una transacción
        DB::beginTransaction();

        try {
            // Desactivar las comprobaciones de claves foráneas
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Procesar las eliminaciones
            foreach ($data['data'] as $item) {
                if ($item['action'] === 'delete') {
                    DB::table($item['table'])->where('id', $item['id'])->delete();
                } elseif ($item['action'] === 'insert') {
                    DB::table($item['table'])->insert($item['values']);
                }
            }

            // Procesar las subidas completas
            foreach ($data['uploads_all'] as $item) {
                if ($item['action'] === 'delete') {
                    DB::table($item['table'])->where('id', $item['id'])->delete();
                } elseif ($item['action'] === 'insert') {
                    DB::table($item['table'])->insert($item['values']);
                }
            }

            // Reactivar las comprobaciones de claves foráneas
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            // Confirmar la transacción
            DB::commit();

            return response()->json(['message' => 'Sync process completed successfully.'], 200);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();
            return response()->json(['error' => 'Sync process failed.', 'message' => $e->getMessage()], 500);
        }
    }
}
