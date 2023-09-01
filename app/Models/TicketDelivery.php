<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketDelivery extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    


    public function orden(){
        return $this->hasOne(TicketOrden::class, 'id', 'orden_id');
    }

    public function cliente(){
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }


}
