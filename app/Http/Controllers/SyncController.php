<?php

namespace App\Http\Controllers;
ini_set('memory_limit', 9999999999);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncController extends Controller
{
    public function processSync(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'file' => 'required|json'
        ]);
        
        $fileContent = $request->file;
        
        if (!$fileContent) {
            return response()->json(['message' => 'Error en Contenido de archivo'], 400);
        }
        
        return  $fileContent;
        
        $data = json_decode($fileContent, true);
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

            return response()->json(['message' => 'Transaccion remota exitosa.'], 200);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();
            return response()->json(['error' => 'No se proceso la transaccion remota.', 'message' => $e->getMessage()], 500);
        }

    }
}
