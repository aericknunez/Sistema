<?php

namespace Database\Seeders;

use App\Models\ConfigPrincipal;
use Illuminate\Database\Seeder;

use App\Common\Helpers;

class ConfigPrincipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigPrincipal::create([
            'no_mesas' => 10,
            'no_cajas' => 1,
            'ticket_pantalla' => 1,
            'registro_borrar' => 1,
            'comentarios_comanda' => 1,
            'llevar_aqui' => 1,
            'propina_rapida' => NULL,
            'propina_mesa' => NULL,
            'Propina_delivery' => NULL,
            'sonido' => 1,
            'tipo_menu' => 1,
            'otras_ventas' => 0,
            'venta_especial' => 0,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
