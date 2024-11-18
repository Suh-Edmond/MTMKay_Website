<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::create([
            'name' => "Technology"
        ]);

        Categories::create([
            'name' => "Cloud Computing"
        ]);

        Categories::create([
            'name' => "Cisco Networking"
        ]);

        Categories::create([
            'name' => "CompTIA Security"
        ]);

        Categories::create([
            'name' => "Corporate Training and Certifications"
        ]);

        Categories::create([
            'name' => "Microsoft AZURE"
        ]);
    }
}
