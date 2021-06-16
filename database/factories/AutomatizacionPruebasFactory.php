<?php

namespace Database\Factories;

use App\Models\AutomatizacionPruebas;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutomatizacionPruebasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AutomatizacionPruebas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pregunta' => $this->faker->text(20),
            'category_id' => function () {
                if ($category = Categoria::inRandomOrder()->first()) {
                    return $category->id;
                }
            },
        ];
    }
}
