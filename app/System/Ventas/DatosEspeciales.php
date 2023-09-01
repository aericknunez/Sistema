<?php
namespace App\System\Ventas;


use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\TicketNum;
use App\Models\User;

trait DatosEspeciales{


    public function getDatosOrden($iden){
        $detalles = [];
        $detalles['orden'] = TicketOrden::addSelect(['usuario' => User::select('name')
                                                ->whereColumn('ticket_ordens.empleado', 'users.id')])
                                                ->find($iden);
        $detalles['productos'] = TicketProducto::where('orden', $detalles['orden']['id'])
                                        ->where('edo', 1)
                                        ->orderBy('num_fact')
                                        ->with('subOpcion')->get();
                                        
        $detalles['facturas'] = TicketNum::where('orden', $iden)->get();
        return $detalles;
    }

}