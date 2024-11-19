<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $searchParam = $request['search'];
        $filterParam = $request['title'];
        $id          = $request['id'];
        $tag         = $request['tag'];
        $categories = Category::all();
        $tags       = Tag::orderBy('name', 'asc')->get();
        $popularBlogs = $this->getPopularBlogs();
        $category     = Category::find($id);

        if(isset($filterParam) && isset($id)){
            $blogs = Blog::where('category_id',  $id);
        }else {
            $blogs = Blog::orderBy('created_at', 'DESC');
        }
        if (isset($searchParam)){
            $blogs  = $blogs->whereHas('category', function ($query) use ($searchParam){
                $query->where('title', 'like', "%{$searchParam}%")
                    ->orWhere('name', 'like', "%{$searchParam}%")
                    ->orWhere('description', 'like', "%{$searchParam}%");
            });
        }
        if(isset($tag)){
            $blogs  = $blogs->whereHas('tags', function ($query) use ($tag){
                $query->where('name', 'like', "%{$tag}%");
            });
        }

        $blogs = $blogs->paginate(5);

        $data = [
            'blogs'         => $blogs,
            'categories'    => $categories,
            'popularBlogs'  => $popularBlogs,
            'tags'             => $tags,
            'filteredCategory' => $category,
            'tag'              => $tag
        ];

        return view("pages.main.blog")->with($data);
    }

    public function show(Request $request)
    {
        $id = $request['id'];
        $categories = Category::all();
        $popularBlogs = $this->getPopularBlogs();
        $blog = Blog::findOrFail($id);
        $tags       = Tag::orderBy('name', 'asc')->get();

        $data = [
            'blog' => $blog,
            'categories' => $categories,
            'popularBlogs' => $popularBlogs,
            'tags'             => $tags,
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
