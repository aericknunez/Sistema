<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\EfectivoCuentaBancos;
use Illuminate\Database\Seeder;

class EfectivoCuentaBancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EfectivoCuentaBancos::create([
            'tipo' => 4,
            'cuenta' => "Caja Chica",
            'banco' => "Caja Chica",
            'saldo' => 0,
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
