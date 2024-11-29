<?php

namespace App\Http\Controllers;

use App\Constant\BlogState;
use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use App\Models\BlogComments;
use App\Models\BlogImages;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\s;

class BlogController extends Controller
{
    const IMAGE_DIR ='/uploads/images/blogs/';
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
        $blogs        = Blog::where('blog_state', BlogState::APPROVED);
        if(isset($filterParam) && isset($slug)){
            $blogs = $blogs->where('category_id',  $category->id);
        }else {
            $blogs = $blogs->orderBy('created_at', 'DESC');
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


    private function getPopularBlogs()
    {
        $blogs =  Blog::withCount([
            'blogComments as approved_blog_post' => function (Builder $query) {
                $query->where('blog_state', BlogState::APPROVED);
             },
        ])->get();

        collect($blogs)->filter(function ($blog){
            return $blog->approved_blog_post >= 5;
        });

        return $blogs->take(5);

    }


    public function manageBlogs(Request $request)
    {
        $filter = $request['filter'];
        $sort = $request['sort'];
        $tag = $request['tag'];
        $categorySlug = $request['category_slug'];
        $category = Category::where('slug', $categorySlug)->first();
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $blogs = Blog::select('*');
        if(isset($filter) && $filter !== "ALL"){
            $blogs = $blogs->where('blog_state', $filter);

        }
        else if (isset($tag)){
            $blogs = $blogs->with('tags', function ($query) use ($tag){
                    $query->where('name', 'LIKE', "%".$tag."%");
            });
        }
        if (isset($sort)){
            switch ($sort) {
                case 'DATE_ASC':
                    $blogs->orderBy('created_at');
                    break;
                case 'NAME':
                    $blogs->orderBy('name');
                    break;
                default:
                    $blogs->orderByDesc('created_at');
                    break;
            }
        }
        if(isset($category) && $category !== "ALL"){
            $blogs = $blogs->where('category_id', $category);
        }
        $blogs = $blogs->paginate(10);
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
            'categories' => $categories,
            'comments' => $blog->blogComments()->orderBy('created_at', 'desc')->take(5)->get()
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

    public function showBlogComments(Request $request)
    {
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->first();
        $filter = $request['filter'];
        $sort = $request['sort'];
        $comments = $blog->blogComments();

        if(isset($filter)){
            $comments = $comments->where('status', $filter);
        }
        if(isset($sort)){
            $comments = $blog->blogComments();
                switch ($sort) {
                    case 'DATE_ASC':
                        $comments->orderBy('created_at');
                        break;
                    case 'NAME':
                        $comments->orderBy('name');
                        break;
                    default:
                        $comments->orderByDesc('created_at');
                        break;
                }
        }
        $comments = $comments->paginate(10);

        $data = [
            'comments' => $comments,
            'blog' => $blog
        ];

        return view ('pages.management.blog.comments')->with($data);
    }


    public function updateCommentStatus(Request $request)
    {
        $status = $request['status'];
        $slug = $request['slug'];
        $comment = BlogComments::where('slug', $slug)->first();

        $comment->update([
            'status' => $status
        ]);

        return redirect()->back()->with(['status' => 'Blog Status updated successfully']);
    }

    public function createBlog(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $tags       = Tag::all();
        $data = [
            'categories' => $categories,
            'tags'       => $tags,
            'step'       => 1
        ];

        return view('pages.management.blog.create')->with($data);
    }


    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|string',
            'tag_id'      => 'required|array',
            'blog_state'   => ['required', Rule::in([BlogState::APPROVED, BlogState::REJECTED, BlogState::PENDING]) ]
        ]);

        $blog = Blog::create([
            'category_id' => $request['category_id'],
            'title'       => $request['title'],
            'description'    => $request['description'],
            'blog_state'    => $request['blog_state'],
            'user_id'       => auth()->user()->id
        ]);

        $this->saveBlogTags($request, $blog);

        $data = [
            'blog' =>$blog,
            'status' => 'blog information created successfully',
            'step'   => 2
        ];
        return redirect()->route('manage-blogs.create')->with($data);
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->first();

        foreach ($request->file('files') as $file){
            try {
                $fileName = $file->getClientOriginalName();
                $fileName = str_replace(' ', '', $fileName);
                $file->storeAs(self::IMAGE_DIR.$blog->slug, $fileName, 'public');

                $this->saveBlogImages($fileName, $blog);
            }catch (\Exception $exception){

            }
        }
        Session::remove('blog');
        return redirect()->route('manage-blogs')->with(['status' => 'Blog images saved successfully']);
    }

    private function saveBlogTags($request, $blog)
    {
        $tags = $request['tag_id'];
        $blog->tags()->syncWithoutDetaching($tags);
    }

    private function saveBlogImages($fileName, $blog)
    {
        BlogImages::create([
            'blog_id' => $blog->id,
            'file_path' => $fileName,
            'is_main' => false
        ]);
    }
}
