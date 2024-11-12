<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        User::create([
            'name' => 'Suh Edmond',
            'email' => 'suh.edmond@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
