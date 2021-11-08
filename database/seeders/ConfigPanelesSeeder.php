<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\ConfigPaneles;
use Illuminate\Database\Seeder;

class ConfigPanelesSeeder extends Seeder
{

    public function run()
    {
        ConfigPaneles::create([
            'nombre' => 'Cocina',
            'edo' => 0,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        ConfigPaneles::create([
            'nombre' => 'Bar',
            'edo' => 0,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        ConfigPaneles::create([
            'nombre' => 'Preparación',
            'edo' => 0,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);


    }
}
