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
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $generator->name,
                'email' => $generator->email,
                'password' => Hash::make('password'),
                'telephone'  => $generator->phoneNumber(),
                'address' => $generator->address,
                'profile_pic' => $generator->randomElement(['img/testimonials/testi-1.png', 'img/testimonials/testi-2.png', 'img/testimonials/testi-3.png',])
            ]);
        }
    }
}
