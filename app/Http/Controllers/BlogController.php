<?php

namespace App\Http\Controllers;

use App\Constant\BlogState;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $searchParam = $request['search'];
        $filterParam = $request['title'];
        $slug          = $request['slug'];
        $tag         = $request['tag'];
        $categories = Category::all();
        $tags       = Tag::orderBy('name', 'asc')->get();
        $popularBlogs = $this->getPopularBlogs();
        $category     = Category::where('slug',$slug)->first();

        if(isset($filterParam) && isset($slug)){
            $blogs = Blog::where('category_id',  $category->id);
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
            'tag'              => $tag,
            'slug'             => $slug,
            'search'           => $searchParam,
            'title'            => $filterParam
        ];

        return view("pages.main.blog")->with($data);
    }

    public function show(Request $request)
    {
        $slug         = $request['slug'];
        $categories   = Category::all();
        $popularBlogs = $this->getPopularBlogs();
        $blog         = Blog::where('slug',$slug)->first();
        $tags         = Tag::orderBy('name', 'asc')->get();

        $data = [
            'blog'          => $blog,
            'categories'    => $categories,
            'popularBlogs'  => $popularBlogs,
            'tags'          => $tags,
        ];
        return view("pages.main.blog-detail")->with($data);
    }

    //TODO: FETCH BLOGS WITH AT LEAST 4 COMMENTS
    private function getPopularBlogs()
    {
        return Blog::orderBy('created_at')
                            ->take(4)->get();
    }


    public function manageBlogs(Request $request)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(12);
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $data = [
            'blogs' => $blogs,
            'tags' => $tags,
            'categories' => $categories
        ];

        return view('pages.management.blog.index')->with($data);
    }

    public function showBlog(Request $request)
    {
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $data = [
            'blog' => $blog,
            'categories' => $categories
        ];

        return view('pages.management.blog.show')->with($data);
    }

    public function updateInformation(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:20',
            'blog_state' => ['required', Rule::in([BlogState::PENDING, BlogState::REJECTED, BlogState::APPROVED])],
            'description' => 'required|string|max:1000',
            'category_id'   => ['required']
        ]);
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blog->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'blog_state' => $request['blog_state'],
            'category_id' => $request['blog_state']
        ]);

        return redirect()->route('show.blog', ['slug' => $request['slug']])->with('status', 'Information updated successfully');
    }


    public function deleteTag(Request $request)
    {
        $slug = $request['slug'];
        $tagSlug = $request['tagSlug'];
        $tag = Tag::where('slug', $tagSlug)->first();
        $blog = Blog::where('slug', $slug)->first();
        $blog->tags()->detach($tag->id);

        return response()->json(['message' => "Account completed successfully", 'code' => 'TAG_DELETED']);
    }
}
