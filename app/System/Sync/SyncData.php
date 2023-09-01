<?php
namespace App\System\Sync;

use App\Common\Helpers;
use App\Models\SyncDelete;

trait SyncData{



    public function saveDelete($tabla, $iden){
        SyncDelete::create([
            'tabla' => $tabla,
            'iden' => $iden,
            'tiempo' => Helpers::timeId()
        ]);

    }






}