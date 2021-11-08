<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Common\Helpers;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cod' => $this->faker->randomNumber(5, true),
            'nombre' => $this->faker->name(),
            'cant' => $this->faker->randomFloat(2, 2, 30),
            'gravado' => 0,
            'especial' => 0,
            'panel' => $this->faker->numberBetween(0, 1),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ];
    }
}
