<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opciones extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];



        // relacion muchos a muchos ([productos])
        public function productos(){
            return $this->belongsToMany(Producto::class, 'opciones_productos', 'opcion_id', 'producto_id');
        }

        // uno a muchos
        public function sub(){
            return $this->hasMany(OpcionesSub::class, 'opcion_id');
        }
    

}
