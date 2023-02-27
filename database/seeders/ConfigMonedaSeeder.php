<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\ConfigMoneda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigMonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigMoneda::create([
            'moneda' => 'Efectivo',
            'activo' => 1,
            'edo' => 1,
            'extra' => NULL, 
            'tipo' => NULL,
            'icono' => 'fas fa-dollar-sign',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        ConfigMoneda::create([
            'moneda' => 'Tarjeta de Credito',
            'activo' => 0,
            'edo' => 1,
            'extra' => NULL, 
            'tipo' => NULL,
            'icono' => 'fas fa-credit-card',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        ConfigMoneda::create([
            'moneda' => 'BitCoin',
            'activo' => 0,
            'edo' => 0,
            'extra' => NULL, 
            'tipo' => NULL,
            'icono' => 'fab fa-bitcoin',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);


        ConfigMoneda::create([
            'moneda' => 'Cheque',
            'activo' => 0,
            'edo' => 0,
            'extra' => NULL, 
            'tipo' => NULL,
            'icono' => 'fas fa-money-check-alt',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);


        ConfigMoneda::create([
            'moneda' => 'Credito',
            'activo' => 0,
            'edo' => 0,
            'extra' => NULL, 
            'tipo' => NULL,
            'icono' => 'fas fa-dollar-sign',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);


        ConfigMoneda::create([
            'moneda' => 'Pago Mixto',
            'activo' => 0,
            'edo' => 0,
            'extra' => NULL, 
            'tipo' => NULL,
            'icono' => 'fas fa-credit-card',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

    

    }
}
