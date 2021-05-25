<?php

namespace Database\Factories;

use App\Models\ClimaLaboral;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClimaLaboralFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClimaLaboral::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pregunta' => $this->faker->text(20)
        ];
    }
}
