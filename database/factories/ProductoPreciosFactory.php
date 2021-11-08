<?php

namespace Database\Factories;

use App\Models\ProductoPrecios;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Common\Helpers;
use App\Models\Producto;

class ProductoPreciosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductoPrecios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producto' => Producto::all()->random()->cod,
            'precio' => $this->faker->randomFloat(2, 2, 30),
            'inicio' => NULL,
            'fin' => NULL,
            'tipo' => NULL,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ];
    }
}
