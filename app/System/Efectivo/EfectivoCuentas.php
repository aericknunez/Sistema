<?php
namespace App\System\Efectivo;

use App\Common\Helpers;
use App\Models\EfectivoCuentaBancos;
use App\Models\EfectivoTransferenciasHistorial;

trait EfectivoCuentas{


    public function updateDataOrigenDestino($iden){ // obtiene el efectivo de la cuenta

        $data =  EfectivoCuentaBancos::select('saldo')
                                    ->where('id', $iden)
                                    ->get();
        
        return $data;
    }

    public function updateSaldo($origen, $destino, $salOrigen, $salDestino, $cantidad){ // actualiza el saldo de las cuentas
        
        $saldoOrigen = $salOrigen - $cantidad;
        $saldoDestino = $salDestino + $cantidad;

        $this->updateCta($origen, $saldoOrigen);
        $this->updateCta($destino, $saldoDestino);
                    
    }

    public function updateCta($cuenta, $saldo){

        EfectivoCuentaBancos::where('id', $cuenta)
                            ->update(['saldo' => $saldo,
                                    'tiempo' => Helpers::timeId()
                            ]);    
    }


    public function crearHistorialTransferencias($origen, $destino, $salOrigen, $salDestino, $cantidad, $descripcion){
   
        
        $saldoOrigen = $salOrigen - $cantidad;
        $saldoDestino = $salDestino + $cantidad;

    EfectivoTransferenciasHistorial::create([
            'origen_id' => $origen, 
            'destino_id' => $destino,
            'cantidad' => $cantidad,
            'saldo_origen_anterior' => $salOrigen,
            'saldo_origen' => $saldoOrigen,
            'saldo_destino_anterior' => $salDestino,
            'saldo_destino' => $saldoDestino,
            'transferencia' => $descripcion,
            'fechaT' => Helpers::timeId(),
            'fecha' => now(), 
            'cajero' => session('config_usuario_id'), //usuario
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

    }





    public function crearHistorialUnico($destino, $saldoant, $salDestino, $cantidad, $descripcion){
   

    EfectivoTransferenciasHistorial::create([
            'origen_id' => NULL, 
            'destino_id' => $destino,
            'cantidad' => $cantidad,
            'saldo_origen_anterior' => NULL,
            'saldo_origen' => NULL,
            'saldo_destino_anterior' => $saldoant,
            'saldo_destino' => $salDestino,
            'transferencia' => $descripcion,
            'fechaT' => Helpers::timeId(),
            'fecha' => now(), 
            'cajero' => session('config_usuario_id'), //usuario
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

    }



}