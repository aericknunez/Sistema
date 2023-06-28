<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketNum extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function cliente(){
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
    
    public function productos(){
        return $this->hasMany(TicketProductosSave::class, 'orden', 'orden');
    }

}
