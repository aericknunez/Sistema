<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\EfectivoGastosCategorias;
use Illuminate\Database\Seeder;

class EfectivoGastosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EfectivoGastosCategorias::create([
            'categoria' => "Gastos Varios",
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
