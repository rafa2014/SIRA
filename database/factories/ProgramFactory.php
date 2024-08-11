<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'clave' => $this->faker->unique()->word,
            'descripcion' => $this->faker->sentence,
            'vigencia' => $this->faker->dateTimeBetween('now', '+1 year'),
            'abreviatura' => strtoupper($this->faker->lexify('???')),
            'tipo' => $this->faker->randomElement(['A', 'B', 'C']),
        ];
    }
}
