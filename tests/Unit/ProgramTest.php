<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Program;
use PHPUnit\Framework\Attributes\Test;

class ProgramTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_program()
    {
        $program = Program::factory()->create([
            'nombre' => 'Maestría en Redes y Sistemas Integrados',
            'clave' => 'MRYSI',
        ]);

        $this->assertDatabaseHas('programs', [
            'nombre' => 'Maestría en Redes y Sistemas Integrados',
            'clave' => 'MRYSI',
        ]);
    }

    #[Test]
    public function it_can_update_a_program()
    {
        $program = Program::factory()->create([
            'nombre' => 'Maestría en Redes y Sistemas Integrados',
            'clave' => 'MRYSI',
        ]);

        $program->update([
            'nombre' => 'Maestría en Computación Aplicada',
            'clave' => 'MCA01',
        ]);

        $this->assertDatabaseHas('programs', [
            'nombre' => 'Maestría en Computación Aplicada',
            'clave' => 'MCA01',
        ]);
    }

    #[Test]
    public function it_can_delete_a_program()
    {
        $program = Program::factory()->create([
            'nombre' => 'Maestría en Redes y Sistemas Integrados',
            'clave' => 'MRYSI',
        ]);

        $program->delete();

        $this->assertDatabaseMissing('programs', [
            'nombre' => 'Maestría en Redes y Sistemas Integrados',
            'clave' => 'MRYSI',
        ]);
    }
}
