<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Role;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_role()
    {
        $role = Role::factory()->create(['nombre' => 'Editor']);

        $this->assertDatabaseHas('roles', ['nombre' => 'Editor']);
    }

    /** @test */
    public function it_can_update_a_role()
    {
        $role = Role::factory()->create(['nombre' => 'Editor']);

        $role->update(['nombre' => 'Admin']);

        $this->assertDatabaseHas('roles', ['nombre' => 'Admin']);
    }

    /** @test */
    public function it_can_delete_a_role()
    {
        $role = Role::factory()->create(['nombre' => 'Editor']);

        $role->delete();

        $this->assertDatabaseMissing('roles', ['nombre' => 'Editor']);
    }
}
