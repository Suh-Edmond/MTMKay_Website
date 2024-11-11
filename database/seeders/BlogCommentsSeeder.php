<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogComments;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCommentsSeeder extends Seeder
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
        for ($i = 0; $i < 100; $i++) {
            BlogComments::create([
                'blog_id' => $generator->randomElement($this->blogs),
                'name' => $generator->name,
                'email' => $generator->email,
                'subject' => $generator->sentence(5),
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            ]);
        }
    }
}
