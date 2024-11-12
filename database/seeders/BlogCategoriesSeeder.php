<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Categories;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    private $blogs;
    private $categories;

    public function __construct()
    {
        $this->blogs = Blog::all();
        $this->categories = Categories::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 50; $i++) {
            $blog_categories = array();
           $blog = $generator->randomElement($this->blogs);
           $category1 = $generator->randomElement($this->categories);
           $category2 = $generator->randomElement($this->categories);
            $blog_categories[] = $category1;
            $blog_categories[] = $category2;

           $blog->categories()->syncWithoutDetaching($blog_categories);
        }
    }
}
