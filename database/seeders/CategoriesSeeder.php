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
            'image_path' => 'img/blog/cat-post/cat-post-3.jpg',
            'caption_text' => 'The Importance of CyberSecurity for Small Businesses'
        ]);

        Category::create([
            'name' => "Cloud Computing",
            'image_path' => 'img/blog/cat-post/cat-post-2.jpg',
            'caption_text' => 'Top IT Certifications to Boost Your Career'
        ]);

        Category::create([
            'name' => "IT Certification",
            'image_path' => 'img/blog/cat-post/cat-post-1.jpg',
            'caption_text' => 'How Cloud Computing is Revolutionizing Business Operations'
        ]);
    }
}
