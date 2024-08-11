<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Convocatoria;
use App\Models\Program;
use PHPUnit\Framework\Attributes\Test;

class ConvocatoriaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_convocatoria()
    {
        $program = Program::factory()->create();

        $convocatoria = Convocatoria::factory()->create([
            'nombre' => 'Convocatoria 2024',
            'id_programa_educativo' => $program->id,
        ]);

        $this->assertDatabaseHas('convocatorias', [
            'nombre' => 'Convocatoria 2024',
            'id_programa_educativo' => $program->id,
        ]);
    }

    #[Test]
    public function it_can_update_a_convocatoria()
    {
        $convocatoria = Convocatoria::factory()->create([
            'nombre' => 'Convocatoria 2024',
        ]);

        $convocatoria->update([
            'nombre' => 'Convocatoria 2025',
        ]);

        $this->assertDatabaseHas('convocatorias', [
            'nombre' => 'Convocatoria 2025',
        ]);
    }

    #[Test]
    public function it_can_delete_a_convocatoria()
    {
        $convocatoria = Convocatoria::factory()->create([
            'nombre' => 'Convocatoria 2024',
        ]);

        $convocatoria->delete();

        $this->assertDatabaseMissing('convocatorias', [
            'nombre' => 'Convocatoria 2024',
        ]);
    }
}
