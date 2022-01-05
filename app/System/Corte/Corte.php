<?php
namespace App\System\Corte;

use App\Common\Helpers;
use App\Models\CorteDeCaja;
use App\Models\CuentasPagarAbono;
use App\Models\EfectivoGastos;
use App\Models\EfectivoRemesas;
use App\Models\EntradasSalidas;
use App\Models\NumeroCajas;
use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\User;

trait Corte{




    public function realizaCorte($cajero, $efectivo){ // Realiza las operaciones del corte
        
        $corte = CorteDeCaja::select('clave', 'aperturaT', 'efectivo_inicial', 'numero_caja')
                            ->where('usuario', $cajero)
                            ->where('edo', 1)
                            ->orderBy('tiempo', 'desc')
                            ->first();

                    CorteDeCaja::where('clave', $corte->clave)
                                ->where('usuario', session('config_usuario_id'))
                                ->update(['cierreT' => Helpers::timeId(), 
                                        'cierre' => now(), 
                                        'ordenes' => $this->ordenes($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'productos' => $this->productos($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'clientes' => $this->clientes($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'efectivo_final' => $efectivo,
                                        'total_efectivo' => $this->totalEfectivo($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'total_tarjeta' => $this->totalTarjeta($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'total_btc' => $this->totalBtc($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'total_venta' => $this->totalVenta($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'propina_efectivo' => $this->propinaEfectivo($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'propina_no_efectivo' => $this->propinaNoEfectivo($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'gastos' => $this->gastosEfectivo($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'remesas' => $this->remesas($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'abonos' => $this->abonos($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'efectivo_ingresado' => $this->entradasEfectivo($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'efectivo_retirado' => $this->salidasEfectivo($corte->aperturaT, Helpers::timeId(), $cajero),
                                        'diferencia' => $this->diferencia($corte->efectivo_inicial, $efectivo, $corte->aperturaT, Helpers::timeId(), $cajero),
                                        'usuario_corte' => session('config_usuario_id'),
                                        'edo' => 2,
                                        'tiempo' => Helpers::timeId()
                ]);

                NumeroCajas::where('numero', $corte->numero_caja)
                            ->update(['edo' => 0,
                                    'tiempo' => Helpers::timeId()
                            ]);

        session()->forget('apertura_caja');
        // session()->forget('caja_select');

    }

/** Inicio corte tiempo */
    public function inicioCorte($cajero){
        $corte = CorteDeCaja::select('aperturaT')
                            ->where('usuario', $cajero)
                            ->where('edo', 1)
                            ->orderBy('tiempo', 'desc')
                            ->first();
        return $corte->aperturaT;
    }



    /* ordenes */
    public function ordenes($inicio, $fin, $cajero){
        $ordenes = TicketOrden::where('empleado', $cajero)
                                ->where('edo', 2)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->count();
        return $ordenes;
    }

    /* productos */
    public function productos($inicio, $fin, $cajero){
        $productos = TicketProducto::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('cantidad');
        return $productos;
    }

    /* clientes */
    public function clientes($inicio, $fin, $cajero){
        $clientes = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->count();
        return $clientes;
    }

    /* efectivo final -  Efectivo ingresado o que tiene el cajero */

    
    /* total efectivo  solo de venta en efectivo*/
    public function totalEfectivo($inicio, $fin, $cajero){
        $total = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->where('tipo_pago', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('total');
        return $total;
    }
    /* total tarjeta  solo venta tarjeta*/
    public function totalTarjeta($inicio, $fin, $cajero){
        $total = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->where('tipo_pago', 2)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('total');
        return $total;
    }
    /* total btc solo venta btc */
    public function totalBtc($inicio, $fin, $cajero){
        $total = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->where('tipo_pago', 3)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('total');
        return $total;
    }
    /* total venta */
    public function totalVenta($inicio, $fin, $cajero){
        $total = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('total');
        return $total;
    }
    /* propina efectivo */
    public function propinaEfectivo($inicio, $fin, $cajero){
        $total = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->where('tipo_pago', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('propina_cant');
        return $total;
    }
    /* propina no efectivo */
    public function propinaNoEfectivo($inicio, $fin, $cajero){
        $total = TicketNum::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->where('tipo_pago','!=', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->sum('propina_cant');
        return $total;
    }
    /* gastos en efectivo */
    public function gastosEfectivo($inicio, $fin, $cajero){
        $totalgastos = EfectivoGastos::where('cajero', $cajero)
                        ->whereBetween('tiempo', [$inicio, $fin])
                        ->where('tipo_pago', 1)
                        ->where('edo', 1)
                        ->orderBy('tiempo', 'desc')
                        ->sum('cantidad');

        return $totalgastos;
    }
    /* remesas de caja a cuenta */
    public function remesas($inicio, $fin, $cajero){
        $totalremesa = EfectivoRemesas::where('cajero', $cajero)
                        ->whereBetween('tiempo', [$inicio, $fin])
                        ->where('edo', 1)
                        ->orderBy('tiempo', 'desc')
                        ->sum('cantidad');

        return $totalremesa;
    }  
    /* abonos */
    public function abonos($inicio, $fin, $cajero){
        $totalAbonos = CuentasPagarAbono::where('user', $cajero)
                        ->whereBetween('tiempo', [$inicio, $fin])
                        ->where('edo', 1)
                        ->orderBy('tiempo', 'desc')
                        ->sum('cantidad');

        return $totalAbonos;
    }

    // efectivo ingresado a caja
    public function entradasEfectivo($inicio, $fin, $cajero){
        $total = EntradasSalidas::where('cajero', $cajero)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->where('edo', 1)
                                ->where('tipo_movimiento', 1) // entrada
                                ->where('tipo_pago', 1) // efectivo
                                ->orderBy('tiempo', 'desc')
                                ->sum('cantidad');
        return $total;
    }

    // efectivo retirado de caja
    public function salidasEfectivo($inicio, $fin, $cajero){
        $total = EntradasSalidas::where('cajero', $cajero)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->where('edo', 1)
                                ->where('tipo_movimiento', 2) // salida
                                ->where('tipo_pago', 1) // efectivo
                                ->orderBy('tiempo', 'desc')
                                ->sum('cantidad');
        return $total;
    }

    /* diferencia */
    public function diferencia($efectivo_inicial, $efectivo_ingresado, $inicio, $fin, $cajero){
        $total = $efectivo_inicial 
                + $this->totalEfectivo($inicio, $fin, $cajero) 
                + $this->propinaEfectivo($inicio, $fin, $cajero)
                + $this->entradasEfectivo($inicio, $fin, $cajero)
                - $this->salidasEfectivo($inicio, $fin, $cajero)
                - $this->gastosEfectivo($inicio, $fin, $cajero)
                - $this->remesas($inicio, $fin, $cajero);
                - $this->abonos($inicio, $fin, $cajero);
        $diferencia = $efectivo_ingresado - $total;
        return $diferencia;
    }



    public function getDatosCorte($iden){
        $detalles = [];
        $detalles = CorteDeCaja::where('id', $iden)->first();
                
        $usr = User::select('name')->where('id', $detalles->usuario_corte)
                                   ->first();
        $detalles->cajero = $usr->name;

        return $detalles;
    }



}