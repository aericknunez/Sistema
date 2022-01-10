<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorteDeCaja extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];





    public function user(){
        return $this->hasOne(User::class, 'id', 'usuario');
    }

    public function user_corte(){
        return $this->hasOne(User::class, 'id', 'usuario_corte');
    }

}
