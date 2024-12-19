<?php

namespace Database\Seeders;

use App\Constant\Roles;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    private $roles;

    public function __construct()
    {
        $this->roles = Role::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        $role = Role::where('name', Roles::ADMIN)->firstOrFail();
        User::create([
            'name' => "Suh Edmond",
            'email' => "suhedmond11@gmail.com",
            'password' => Hash::make('password'),
            'telephone'  => "+237673660071",
            'address' => "Upper Bonduma, Buea",
            'role_id' => $role->id,
            'email_verified_at' => Carbon::now(),
            'profile_pic' => $generator->randomElement(['img/testimonials/testi-1.png', 'img/testimonials/testi-2.png', 'img/testimonials/testi-3.png',])
        ]);
    }
}
