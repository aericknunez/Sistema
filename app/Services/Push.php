<?php
namespace App\Services;
ini_set('memory_limit', 9999999999);

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\SyncDelete;
use App\Models\SyncUp;
use App\Models\SyncTable;

class Push {

    public function __construct() {}

    public function execute() {
        $archivo = [];
        $data = [];

        Session::put('now', $this->now());
        Session::put('last_update', $this->lastUpdate());

        $this->iniciando();

        $data = array_merge($data, $this->createDeleteIds(Session::get('last_update'), Session::get('now')));
        $data = array_merge($data, $this->createUploads(Session::get('last_update'), Session::get('now')));

        if (!empty($data)) {
            $archivo["foreign_key_checks"] = 0;
            $archivo["uploads_all"] = $this->createUploadsAll();
            $archivo["data"] = $data;
            $archivo["foreign_key_checks"] = 1;
        }

        $this->borrarViejos(Session::get('last_update'));
        
        $result = $this->sendSync($archivo);
        $this->borroSession();

        return $result;
    }

    public function borrarViejos($inicio) {
        $iniciar = $inicio - 864000; // - 15 días
        SyncDelete::where('tiempo', '<', $iniciar)->delete();
    }

    public function now() {
        return strtotime(date("H:i:s"));
    }

    public function lastUpdate() {
        $lastUpdate = SyncUp::where('edo', 3)
                            ->orderBy('final', 'desc')
                            ->first();

        return $lastUpdate->final;
    }

    public function createDeleteIds($inicio, $final) {
        $archivo = [];

        $deletes = SyncDelete::whereBetween('tiempo', [$inicio, $final])->get();
        foreach ($deletes as $delete) {
            $archivo[] = [
                'action' => 'delete',
                'table' => $delete->tabla,
                'id' => $delete->iden
            ];
        }

        return $archivo;
    }

    public function createUploads($inicio, $final) {
        $archivo = [];

        $tables = SyncTable::where('tipo', 1)->get();
        foreach ($tables as $table) {
            $tabla = $table->tabla;
            echo "Obteniendo nuevos datos de " . $tabla . PHP_EOL;

            $records = DB::table($tabla)->whereBetween('tiempo', [$inicio, $final])->get();
            $count = $records->count();
            $registro = 0;

            foreach ($records as $record) {
                $archivo[] = [
                    'action' => 'delete',
                    'table' => $tabla,
                    'id' => $record->id
                ];

                $archivo[] = [
                    'action' => 'insert',
                    'table' => $tabla,
                    'values' => (array) $record
                ];

                $registro++;
                echo $record->id . " | Registro " . $registro . " / " . $count . PHP_EOL;
            }
        }

        return $archivo;
    }

    public function createUploadsAll() {
        $archivo = [];

        $tables = SyncTable::where('tipo', 2)->get();
        foreach ($tables as $table) {
            $tabla = $table->tabla;

            $records = DB::table($tabla)->get();
            $count = $records->count();
            $registro = 0;

            foreach ($records as $record) {
                $archivo[] = [
                    'action' => 'delete',
                    'table' => $tabla,
                    'id' => $record->id
                ];

                $archivo[] = [
                    'action' => 'insert',
                    'table' => $tabla,
                    'values' => (array) $record
                ];

                $registro++;
                echo "Registro Usuario " . $registro . " / " . $count . PHP_EOL;
            }
        }

        return $archivo;
    }

    public function iniciando() {
        $hora = Carbon::now()->format('H:i:s');
        $fecha = Carbon::now()->format('d-m-Y');
        $hash = md5($fecha . "-" . $hora . "-" . Session::get('temporal_td'));
        $hashName = Session::get('now') . "-" . Session::get('temporal_td') . "-" . $hash;
        Session::put('hash_name', $hashName);
        echo "Creando archivo " . Session::get('hash_name') . PHP_EOL;

        Session::put('hashid', substr(sha1(date("d-m-Y-H:i:s") . rand(1,999999999)),0,10));
        Session::put('timeid', strtotime(date("H:i:s")));
        
        $datos = [
            'comprobacion' => Session::get('hash_name'),
            'inicio' => Session::get('last_update'),
            'final' => Session::get('now'),
            'edo' => 0,
            'clave' => Session::get('hashid'),
            'tiempo' => Session::get('timeid'),
            'td' => Session::get('temporal_td'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        SyncUp::create($datos);
    }

    public function sendSync($archivo) {
        try {
            $response = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json'
                            ])->post(env('URL_SYNC'), [
                                'file' => json_encode($archivo)
                            ]);

            if ($response->successful()) {
                Log::info('Sync process completed successfully.');
                SyncUp::where('comprobacion', Session::get('hash_name'))->update(['edo' => 3]);
                return $response["message"];
            } else {
                Log::error('Sync process failed.', ['response' => $response->body()]);
                return $response->body();
            }
        } catch (\Exception $e) {
            Log::error('Sync process failed.', ['message' => $e->getMessage()]);
            return 'Sync process failed....';
        }
    }

    public function borroSession() {
        Session::forget(['last_update', 'now', 'hash_name', 'hashid', 'timeid']);
    }
}