<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionesProducto extends Model
{
    use HasFactory;

    protected $table = 'opciones_productos';
    protected $guarded = ['id', 'created_at', 'updated_at'];



}
