<?php

namespace Database\Seeders;

use App\Models\ConfigImpresion;
use Illuminate\Database\Seeder;

use App\Common\Helpers;

class ConfigImpresionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigImpresion::create([
            'ninguno' => 1,
            'ticket' => 0,
            'factura' => 0,
            'credito_fiscal' => 0,
            'no_sujeto' => 0,
            'imprimir_antes' => 1,
            'comanda' => 1,
            'opcional' => 0,
            'seleccionado' => 0,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
