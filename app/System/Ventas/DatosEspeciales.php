<?php
namespace App\System\Ventas;


use App\Models\TicketOrden;
use App\Models\TicketNum;
use App\Models\TicketProducto;
use App\Models\TicketProductosSave;
use App\Models\User;

trait DatosEspeciales{


    public function getDatosOrden($iden){
        $detalles = [];
        $detalles['orden'] = $orden = TicketOrden::addSelect(['usuario' => User::select('name')
                                                ->whereColumn('ticket_ordens.empleado', 'users.id')])
                                                ->find($iden);

        if ($orden->edo == 2) {
            $detalles['productos'] = TicketProductosSave::where('orden', $detalles['orden']['id'])
            ->where('edo', 1)
            ->orderBy('num_fact')
            ->with('subOpcion')->get();
        } else {
            $detalles['productos'] = TicketProducto::where('orden', $detalles['orden']['id'])
            ->where('edo', 1)
            ->orderBy('num_fact')
            ->with('subOpcion')->get();
        }

                                        
        $detalles['facturas'] = TicketNum::where('orden', $iden)->get();
        return $detalles;
    }

}