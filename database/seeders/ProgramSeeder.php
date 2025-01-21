<?php

namespace Database\Seeders;

use App\Models\Program;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        Program::create([
            'id'  => '1',
            'title' => 'Microsoft Azure Fundamentals',
            'objective' => 'This program provides comprehensive training in Microsoft Azure, equipping students with foundational and advanced cloud skills. By the end of the course, students will be prepared for entry-level cloud roles and have practical experience with Azure infrastructure.',
            'eligibility' => 'Ideal for beginners interested in cloud computing who want a solid foundation to enter the IT field. No prior experience is required.',
            'cost' => 800000,
            'training_resources' => 'Training Resources: Official Microsoft learning materials, including labs and hands-on practice.',
            'duration' => 12,
            'trainer_name' => 'George Mathews',
            'image_path' => 'img/courses/course-1.jpg',
            'job_opportunities' =>  $faker->sentence(20)

        ]);

        Program::create([
            'id'  => '2',
            'title' => 'Cisco Certified Network Associate (CCNA)',
            'objective' => 'This program builds a solid foundation in networking, covering everything from routing and switching to network security. Students will be prepared for network support and administration roles and gain hands-on experience with real-world networking environments',
            'eligibility' => 'Recommended for individuals with a basic understanding of IT who are interested in pursuing careers in networking.',
            'cost' => 850000,
            'training_resources' => 'Cisco-certified materials and practice labs provided through Cisco Networking Academy',
            'duration' => 12,
            'trainer_name' => 'George Mathews',
            'image_path' => 'img/courses/course-2.jpg',
            'job_opportunities' =>  $faker->sentence(20)
        ]);

        Program::create([
            'id'   => '3',
            'title' => 'CompTIA Security+',
            'objective' => 'This course offers an in-depth understanding of cybersecurity fundamentals, preparing students for entry-level roles in cybersecurity. It covers threat management, risk assessment, and essential security practices, ensuring job readiness for the cybersecurity field.',
            'eligibility' => 'Suitable for students with basic IT knowledge who want to enter cybersecurity roles.',
            'cost' => 900000,
            'training_resources' => 'Official CompTIA study materials and labs, aligned with the CompTIA Security+ certification',
            'duration'=> 12,'trainer_name' => 'George Mathews',
            'image_path' => 'img/courses/course-3.jpg',
            'job_opportunities' => $faker->sentence(20)
        ]);
    }
}
