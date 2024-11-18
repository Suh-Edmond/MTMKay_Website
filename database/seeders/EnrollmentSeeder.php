<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Program;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    private $users;
    private $programs;

    public function __construct()
    {
        $this->users = User::all()->pluck('id');
        $this->programs = Program::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            Enrollment::create([
                'program_id' => $faker->randomElement($this->programs),
                'user_id'    => $faker->randomElement($this->users),
                'has_completed_payment' => $faker->randomElement([false, true]),
                'enrollment_date' => $faker->dateTime()
            ]);
        }
    }
}
