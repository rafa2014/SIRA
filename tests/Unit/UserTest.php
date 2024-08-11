<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $role = Role::factory()->create(['nombre' => 'Aspirante']);

        $user = User::factory()->create([
            'name' => 'Rafael Alvarez Martinez',
            'email' => 'rafael.itsx2018@gmail.com',
            'role_id' => $role->id,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Rafael Alvarez Martinez',
            'email' => 'rafael.itsx2018@gmail.com',
            'role_id' => $role->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create([
            'name' => 'Rafael Alvarez Martinez',
            'email' => 'rafael.itsx2018@gmail.com',
        ]);

        $user->update([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create([
            'name' => 'Rafael Alvarez Martinez',
            'email' => 'rafael.itsx2018@gmail.com',
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'name' => 'Rafael Alvarez Martinez',
            'email' => 'rafael.itsx2018@gmail.com',
        ]);
    }
}
