<?php

namespace App\Http\Controllers;

use App\Models\ConfigApp;
use Illuminate\Http\Request;

class SetLatamController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $config = ConfigApp::find(1)->update([
            'cliente' => 'LatamPOS',
            'slogan' => 'Ventas sin complicaciones',
            'skin' => 'latam-skin',
            'logo' => 'latamPOS.png',
        ]);

        if ($config) {
            return "Se establecio como latam";
        }
        return "Error al establecer";
    }
}
