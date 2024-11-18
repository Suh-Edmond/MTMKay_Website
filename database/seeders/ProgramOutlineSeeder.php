<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramOutline;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramOutlineSeeder extends Seeder
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
        //Cisco Certified Network Associate (CCNA) outline
        ProgramOutline::create([
            'program_id' => '08454387-d6b5-4a53-b9cd-e5d6f8146407',
            'period'     => 'Quarter1',
            'topic'      => 'Networking Basics and Security Fundamentals'
        ]);

        ProgramOutline::create([
            'program_id' => '08454387-d6b5-4a53-b9cd-e5d6f8146407',
            'period'     => 'Quarter2',
            'topic'      => 'IP Connectivity, IP Services, and Wireless Networking'
        ]);
        ProgramOutline::create([
            'program_id' => '08454387-d6b5-4a53-b9cd-e5d6f8146407',
            'period'     => 'Quarter3',
            'topic'      => 'Advanced Routing, Switching, and Automation'
        ]);
        ProgramOutline::create([
            'program_id' => '08454387-d6b5-4a53-b9cd-e5d6f8146407',
            'period'     => 'Quarter4',
            'topic'      => 'Internship, Capstone Project, and Certification Prep'
        ]);

        // CompTIA Security+ outline
        ProgramOutline::create([
            'program_id' => '3941f528-6b7b-450e-ba5a-4f52acad6e2e',
            'period'     => 'Quarter1',
            'topic'      => 'Introduction to Cybersecurity and Threats'
        ]);
        ProgramOutline::create([
            'program_id' => '3941f528-6b7b-450e-ba5a-4f52acad6e2e',
            'period'     => 'Quarter2',
            'topic'      => 'Defense Technologies, Tools, and Risk Management'
        ]);
        ProgramOutline::create([
            'program_id' => '3941f528-6b7b-450e-ba5a-4f52acad6e2e',
            'period'     => 'Quarter3',
            'topic'      => 'Security Operations, Compliance, and Cryptography'
        ]);
        ProgramOutline::create([
            'program_id' => '3941f528-6b7b-450e-ba5a-4f52acad6e2e',
            'period'     => 'Quarter4',
            'topic'      => 'Internship, Real-World Security Project, and Certification Prep'
        ]);

        //Microsoft Azure Fundamentals outline
        ProgramOutline::create([
            'program_id' => '4c4c83b2-3b5b-455d-ba43-6ad1642db104',
            'period'     => 'Quarter1',
            'topic'      => 'Core Cloud Concepts and Introduction to Azure'
        ]);
        ProgramOutline::create([
            'program_id' => '4c4c83b2-3b5b-455d-ba43-6ad1642db104',
            'period'     => 'Quarter2',
            'topic'      => 'Azure Services, Networking, and Data Management'
        ]);
        ProgramOutline::create([
            'program_id' => '4c4c83b2-3b5b-455d-ba43-6ad1642db104',
            'period'     => 'Quarter3',
            'topic'      => 'Security, Compliance, and Advanced Azure Solutions'
        ]);
        ProgramOutline::create([
            'program_id' => '4c4c83b2-3b5b-455d-ba43-6ad1642db104',
            'period'     => 'Quarter4',
            'topic'      => 'Internship, Practical Project, and Exam Preparation'
        ]);
    }
}
