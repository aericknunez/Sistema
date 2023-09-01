<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // asignacion masiva con este medtodo se ponen los campos que evitamos por aasignacion masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

// relacion uno a muchos inversa
// public function precio(){
//     return $this->belongsTo(ProductoPrecios::class);
// }



// relacion uno a muchos

public function categoria(){
    return $this->hasOne(ProductoCategoria::class, 'id', 'producto_categoria_id');
}

public function paneles(){
    return $this->hasOne(ConfigPaneles::class, 'id', 'panel');
}



// rwlacion muchos a muchos (opciones)
public function opciones(){
    return $this->belongsToMany(Opciones::class, 'opciones_productos', 'producto_id', 'opcion_id');
}



public function asignados(){
    return $this->hasMany(InvAsignado::class, 'producto', 'id');
}



}
