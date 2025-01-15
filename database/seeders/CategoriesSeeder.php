<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => "CyberSecurity",
            'image_path' => 'img/company/cybersecurity.png',
            'caption_text' => 'The Importance of CyberSecurity for Small Businesses'
        ]);

        Category::create([
            'name' => "Cloud Computing",
            'image_path' => 'img/company/blog_cloud.png',
            'caption_text' => 'Top IT Certifications to Boost Your Career'
        ]);

        Category::create([
            'name' => "IT Certification",
            'image_path' => 'img/company/blog_hero.png',
            'caption_text' => 'How Cloud Computing is Revolutionizing Business Operations'
        ]);
    }
}
