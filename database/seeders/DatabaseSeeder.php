<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
//        $this->call(BlogSeeder::class);
        $this->call(TagSeeder::class);
//        $this->call(BlogImagesSeeder::class);
//        $this->call(BlogCommentsSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(ProgramOutlineSeeder::class);
//        $this->call(EnrollmentSeeder::class);
//        $this->call(PaymentTransactionSeeder::class);
        $this->call(StudentSuccessSeeder::class);
//        $this->call(BlogTagSeeder::class);
    }
}
