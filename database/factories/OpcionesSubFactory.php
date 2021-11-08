<?php

namespace Database\Factories;

use App\Models\OpcionesSub;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Common\Helpers;
use App\Models\Opciones;

class OpcionesSubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpcionesSub::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nombre' => $this->faker->name(),
            'precio' => 0,
            'opcion_id' => Opciones::all()->random()->id,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ];

    }
}
