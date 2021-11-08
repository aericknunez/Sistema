<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketProducto extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function opciones(){
        return $this->hasMany(TicketOpcion::class, 'ticket_producto_id');
    }

    
    public function subOpcion(){
        return $this->belongsToMany(OpcionesSub::class, 'ticket_opcions', 'ticket_producto_id', 'opcion_producto_id');
    }




    
}
