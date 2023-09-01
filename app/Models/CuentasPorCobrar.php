<?php

namespace App\Models;

use App\Models\TicketNum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentasPorCobrar extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    public function factura(){
        return $this->hasOne(TicketNum::class, 'id', 'factura_id');
    }


    public function misabonos(){ // con addSelect para aagregar el usuario
        return $this->hasMany(CuentasPorCobrarAbono::class, 'cuenta_id')
                                                                    ->addSelect(['usuario' => User::select('name')
                                                                    ->whereColumn('user', 'users.id')]);
    }
}
