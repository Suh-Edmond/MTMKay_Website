<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $searchParam = $request['search'];
        $blogs = Blog::orderBy('created_at', 'DESC');
        $categories = Categories::all();
        $popularBlogs = $this->getPopularBlogs();

        $blogs  = $blogs->whereHas('categories', function ($query) use ($searchParam){
            $query->where('title', 'like', "%{$searchParam}%")
                ->orWhere('name', 'like', "%{$searchParam}%")
                ->orWhere('description', 'like', "%{$searchParam}%");
        });
        $blogs = $blogs->paginate(5);

        $data = [
            'blogs' => $blogs,
            'categories' => $categories,
            'popularBlogs' => $popularBlogs
        ];

        return view("pages.main.blog")->with($data);
    }

    public function show(Request $request)
    {
        $id = $request['id'];
        $categories = Categories::all();
        $popularBlogs = $this->getPopularBlogs();
        $blog = Blog::findOrFail($id);

        $data = [
            'blog' => $blog,
            'categories' => $categories,
            'popularBlogs' => $popularBlogs
        ];
        return view("pages.main.blog-detail")->with($data);
    }

    //TODO: FETCH BLOGS WITH AT LEAST 4 COMMENTS
    private function getPopularBlogs()
    {
        return Blog::orderBy('created_at')
                            ->take(4)->get();
    }


}
