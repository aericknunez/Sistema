<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketOrden extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function productos(){
        return $this->hasMany(TicketProductosSave::class, 'orden');
    }


    public function deliverys(){
        return $this->hasOne(TicketDelivery::class, 'orden_id', 'id');
    }


    


}
