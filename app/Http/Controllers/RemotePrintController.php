<?php

namespace App\Http\Controllers;

use App\Models\RemotePrint;
use Illuminate\Http\Request;

class RemotePrintController extends Controller
{
    
    public function index(){
        $impresiones = RemotePrint::first();

        if ($impresiones) {
            $impresion = json_decode($impresiones->impresion, true);
            $impresiones->delete();
            return response()->json($impresion, 200);
        } else {
            return response()->json(['error' => 'No se encuentran documentos pendientes'], 404);
        }
    }


    public function store(Request $request){
        
        if ($request) {
            RemotePrint::create([
                'impresion' => json_encode($request)
            ]);
            return response()->json(['mensaje' => 'Guardado correctamente'], 200);
        } else {
            return response()->json(['error' => 'No se encuentran documentos pendientes'], 404);
        }
    }

    
    public function destroy(RemotePrint $role){

    }



}
