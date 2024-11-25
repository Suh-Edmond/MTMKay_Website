<?php

namespace Database\Seeders;

use App\Constant\Roles;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => Roles::ADMIN
        ]);

        Role::create([
            'name' => Roles::TRAINER
        ]);

        Role::create([
            'name' => Roles::TRAINEE
        ]);
    }
}
