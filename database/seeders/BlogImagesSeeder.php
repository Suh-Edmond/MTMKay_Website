<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogImages;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogImagesSeeder extends Seeder
{
    private $blogs;

    public function __construct()
    {
         $this->blogs = Blog::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 50; $i++) {
            BlogImages::create([
                'blog_id' => $generator->randomElement($this->blogs),
                'file_path' => $generator->randomElement(["img/blog/cat-post/cat-post-2.jpg","img/blog/cat-post/cat-post-1.jpg", "img/blog/cat-post/cat-post-3.jpg"]),
                'is_main' => true
            ]);
        }
    }
}
