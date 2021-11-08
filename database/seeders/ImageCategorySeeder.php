<?php

namespace Database\Seeders;

use App\Common\Helpers;
use App\Models\ImageCategory;
use Illuminate\Database\Seeder;

class ImageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageCategory::create([
            'categoria' => 'Bebidas',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Comida Rapida',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Snacks',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Frutas',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Helados',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Plato Fuerte',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Otros',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        ImageCategory::create([
            'categoria' => 'Postre',
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        
    }
}