<?php

namespace Database\Seeders;

use App\Models\ConfigApp;
use Illuminate\Database\Seeder;

use App\Common\Helpers;

class ConfigAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigApp::create([
            'sistema' => 'Sistema de Control',
            'cliente' => 'Hibrido',
            'slogan' => 'Soluciones Tecnologicas',
            'direccion' => 'San Salvador', 
            'telefono' => '606623882',
            'email' => 'erick@hibridosv.com',
            'propietario' => 'Erick Nunez',
            'giro' => 'Programacion',
            'nit' => '0207-210386-102-9',
            'imp' => 13,
            'propina' => 0,
            'envio' => 0,
            'multiple_pago' => 0,
            'pais' => 1,
            'skin' => (config('sistema.latam') == true) ? 'latam-skin' : 'mdb-skin',
            'logo' => (config('sistema.latam') == true) ? 'latamPOS.png' : 'hibrido_logo.png',
            'tipo_servicio' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
