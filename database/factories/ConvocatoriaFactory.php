<?php

namespace Database\Factories;

use App\Models\Convocatoria;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConvocatoriaFactory extends Factory
{
    protected $model = Convocatoria::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'fecha_inicio' => $this->faker->dateTimeBetween('now', '+1 month'),
            'fecha_termino' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'id_programa_educativo' => Program::factory(),
            'cantidad_aspirantes' => $this->faker->numberBetween(10, 100),
            'fecha_examen' => $this->faker->date,
            'hora_examen' => $this->faker->time,
        ];
    }
}
