<?php

namespace Database\Factories;

use App\Models\Opciones;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Common\Helpers;


class OpcionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opciones::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ];
    }
}
