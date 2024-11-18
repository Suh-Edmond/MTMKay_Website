<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\StudentSuccess;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSuccessSeeder extends Seeder
{
    private $programs;
    private $users;

    public function __construct()
    {
        $this->programs = Program::all()->pluck('id');
        $this->users = User::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            StudentSuccess::create([
                'program_id' => $faker->randomElement($this->programs),
                'user_id' => $faker->randomElement($this->users),
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            ]);
        }
    }
}
