<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPrecios extends Model
{
    use HasFactory;

    protected $fillable = ['producto', 'precio', 'inicio', 'fin', 'tipo']; // asignacion masiva

}
