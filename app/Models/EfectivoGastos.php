<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EfectivoGastos extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function banco(){
        return $this->hasOne(EfectivoCuentaBancos::class, 'id', 'efectivo_cuenta_bancos_id');
    }

    public function categoria(){
        return $this->hasOne(EfectivoGastosCategorias::class, 'id', 'efectivo_gastos_categorias_id');
    }

}
