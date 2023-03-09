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
            'cliente' => (config('sistema.latam') == true) ? 'LatamPOS' : 'Hibrido',
            'slogan' => (config('sistema.latam') == true) ? 'Ventas sin complicaciones' : 'Soluciones Tecnológicas',
            'direccion' => 'San Salvador', 
            'telefono' => '60627845',
            'email' => 'erick@hibridosv.com',
            'propietario' => 'Erick Nunez',
            'giro' => 'Restaurante',
            'nit' => '0207-210396-102-9',
            'imp' => 13,
            'propina' => 10,
            'envio' => 0,
            'multiple_pago' => 0,
            'pais' => 1,
            'skin' => (config('sistema.latam') == true) ? 'atam-skin' : 'mdb-skin',
            'logo' => (config('sistema.latam') == true) ? 'latamPOS.png' : 'hibrido_logo.png',
            'tipo_servicio' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
