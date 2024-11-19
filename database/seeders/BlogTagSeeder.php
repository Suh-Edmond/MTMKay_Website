<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    private $blogs;
    private $tags;

    public function __construct()
    {
        $this->blogs = Blog::all();
        $this->tags = Tag::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $blog_tags = array();
            $blog = $faker->randomElement($this->blogs);
            $tag1 = $faker->randomElement($this->tags);
            $tag2 = $faker->randomElement($this->tags);
            $blog_tags[] = $tag1;
            $blog_tags[] = $tag2;

            $blog->tags()->syncWithoutDetaching($blog_tags);
        }
    }
}
