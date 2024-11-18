<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\StudentSuccess;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSuccessSeeder extends Seeder
{
    private $programs;

    public function __construct()
    {
        $this->programs = Program::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            StudentSuccess::create([
                'program_id' => $faker->randomElement($this->programs),
                'email' => $faker->email,
                'full_name' => $faker->name,
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            ]);
        }
    }
}
