<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\PaymentTransaction;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTransactionSeeder extends Seeder
{
    private $enrollments;

    public function __construct()
    {
        $this->enrollments = Enrollment::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            PaymentTransaction::create([
                'amount_deposited' => $faker->randomElement([100000, 200000, 300000, 400000]),
                'payment_date' => $faker->dateTime(),
                'enrollment_id' => $faker->randomElement($this->enrollments)
            ]);
        }
    }
}
