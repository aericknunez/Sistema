<?php
namespace App\System\Ventas;

use App\Models\TicketOrden;

trait MesasPropiedades {

    public function ordenesInicio(){
        if (session('config_tipo_usuario') == 5) { // si es mesero
            if (session('principal_ordenes_todo')) { // si tiene activas todas las ordenes
                return $this->notIsMeseroOrdenes();
            } else {
                return $this->isMeseroOrdenes();
            }
        } else {
            return $this->notIsMeseroOrdenes();
        }
    }

    private function isMeseroOrdenes(){
        return TicketOrden::where('tipo_servicio', 2)
                            ->where('edo', 1)
                            ->where('empleado', session('config_usuario_id'))
                            ->get();
    }

    private function notIsMeseroOrdenes(){
       
        return TicketOrden::where('tipo_servicio', 2)
                                ->where('edo', 1)
                                ->get();
    }


    public function cantidadOrdenes(){
        if (session('config_tipo_usuario') == 5) { // si es mesero
            return TicketOrden::where('tipo_servicio', 2)
                            ->where('edo', 1)
                            ->where('empleado', session('config_usuario_id'))
                            ->count();
        } else {
            return TicketOrden::where('tipo_servicio', 2)
                            ->where('edo', 1)
                            ->count();
        }
    }


    public function cantidadClientes(){
        if (session('config_tipo_usuario') == 5) { // si es mesero
            return TicketOrden::where('tipo_servicio', 2)
                                ->where('edo', 1)
                                ->where('empleado', session('config_usuario_id'))
                                ->sum('clientes');
        } else {
            return TicketOrden::where('tipo_servicio', 2)
                                ->where('edo', 1)
                                ->sum('clientes');
        }
    }




}