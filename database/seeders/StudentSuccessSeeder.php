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
        for ($i = 0; $i < 5; $i++) {
            StudentSuccess::create([
                'program_id' => $faker->randomElement($this->programs),
                'user_id' => $faker->randomElement($this->users),
                'message' => "Certification refines your reasoning and your deductive ability when you’re troubleshooting, so you’re not just guessing",
            ]);
        }
    }
}
