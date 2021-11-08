<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    use HasFactory;

    protected $table = 'producto_categorias';


    protected $guarded = ['id', 'created_at', 'updated_at'];



    // relacion uno a muchos
    public function productos(){
        return $this->hasMany(Producto::class);
    }

}
