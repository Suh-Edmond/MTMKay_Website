<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => "Technology"
        ]);

        Tag::create([
            'name' => "Cloud Computing"
        ]);

        Tag::create([
            'name' => "Cisco Networking"
        ]);

        Tag::create([
            'name' => "CompTIA Security"
        ]);

        Tag::create([
            'name' => "Corporate Training and Certifications"
        ]);

        Tag::create([
            'name' => "Microsoft AZURE"
        ]);
    }
}
