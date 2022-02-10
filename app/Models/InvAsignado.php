<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvAsignado extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function dependientes(){
        return $this->hasOne(InvDependiente::class, 'id', 'dependiente');
    }


}
