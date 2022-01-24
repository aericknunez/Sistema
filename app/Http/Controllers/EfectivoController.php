<?php

namespace App\Http\Controllers;

use App\Models\EfectivoCuentaBancos;
use App\Models\EfectivoTransferenciasHistorial;
use App\Models\User;

class EfectivoController extends Controller
{
    public function transacciones(){

        $datos = EfectivoTransferenciasHistorial::addSelect(['origen' => EfectivoCuentaBancos::select('cuenta')
                                                ->whereColumn('origen_id', 'efectivo_cuenta_bancos.id')])
                                                ->addSelect(['destino' => EfectivoCuentaBancos::select('cuenta')
                                                ->whereColumn('destino_id', 'efectivo_cuenta_bancos.id')])
                                                ->addSelect(['usuario' => User::select('name')
                                                ->whereColumn('cajero', 'users.id')])
                                                ->orderBy('id','DESC')
                                                ->paginate(10);
        return view('efectivo.transacciones', compact('datos'));
    }




}
