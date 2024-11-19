<?php

namespace Database\Seeders;

use App\Constant\BlogState;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    private $users;
    private $categories;

    public function __construct()
    {
        $this->users = User::all()->pluck('id');
        $this->categories = Category::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 30; $i++) {
            Blog::create([
                'title' => $generator->sentence(8),
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                'user_id' => $generator->randomElement($this->users),
                'blog_state' => $generator->randomElement([BlogState::PENDING, BlogState::APPROVED, BlogState::REJECTED]),
                'category_id' => $generator->randomElement($this->categories)
            ]);
        }
    }
}
