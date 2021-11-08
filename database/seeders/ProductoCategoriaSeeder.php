<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\ProductoCategoria;
use Illuminate\Database\Seeder;

class ProductoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductoCategoria::create([
            'nombre' => 'Principal',
            'img' => "default.png",
            'principal' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
