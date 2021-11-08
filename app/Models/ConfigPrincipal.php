<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigPrincipal extends Model
{
    use HasFactory;

    protected $table = 'config_principal';

    protected $guarded = ['id', 'created_at', 'updated_at'];


}
