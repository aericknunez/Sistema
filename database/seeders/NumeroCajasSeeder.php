<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\NumeroCajas;
use Illuminate\Database\Seeder;

class NumeroCajasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NumeroCajas::create([
            'numero' => 1,
            'edo' => 0,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
