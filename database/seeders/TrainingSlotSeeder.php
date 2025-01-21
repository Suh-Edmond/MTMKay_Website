<?php

namespace Database\Seeders;

use App\Constant\ProgramEnrollmentStatus;
use App\Models\Program;
use App\Models\TrainingSlot;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSlotSeeder extends Seeder
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
        for ($i = 0; $i < 9; $i++) {
            TrainingSlot::create([
                'name'       => $faker->randomElement(['Morning Session', 'Afternoon Session', 'Evening Session']),
                'start_time' => Carbon::now()->toTimeString(),
                'end_time'   => Carbon::now()->addHours(3)->toTimeString(),
                'available_seats' => 15,
                'status' => ProgramEnrollmentStatus::AVAILABLE,
                'program_id' => $faker->randomElement($this->programs)
            ]);
        }
    }
}
