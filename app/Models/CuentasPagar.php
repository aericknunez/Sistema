<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentasPagar extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    public function proveedor(){
        return $this->hasOne(Proveedor::class, 'id', 'proveedor_id');
    }


    public function misabonos(){ // con addSelect para aagregar el usuario
        return $this->hasMany(CuentasPagarAbono::class, 'cuenta_id')
                                                                    ->addSelect(['usuario' => User::select('name')
                                                                    ->whereColumn('user', 'users.id')]);
    }

}
