<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\InvUnidades;
use Illuminate\Database\Seeder;

class InvUnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvUnidades::create([
            'unidad' => "Unidad",
            'abreviacion' => "U",
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        InvUnidades::create([
            'unidad' => "Libra",
            'abreviacion' => "Lb",
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        InvUnidades::create([
            'unidad' => "Kilogramo",
            'abreviacion' => "Kg",
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        InvUnidades::create([
            'unidad' => "Botella",
            'abreviacion' => "Bot",
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        InvUnidades::create([
            'unidad' => "Caja",
            'abreviacion' => "Caj",
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        InvUnidades::create([
            'unidad' => "Galon",
            'abreviacion' => "Gal",
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
