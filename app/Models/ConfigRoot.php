<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigRoot extends Model
{
    use HasFactory;

    protected $table = 'config_root';

    protected $guarded = ['id', 'created_at', 'updated_at'];


}
