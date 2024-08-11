<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create(['nombre' => 'Admin']);
        Role::factory()->create(['nombre' => 'Aspirante']);
        Role::factory()->create(['nombre' => 'Coordinador']);
    }
}
