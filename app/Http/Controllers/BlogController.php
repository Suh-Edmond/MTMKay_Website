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
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
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
        $approvedComments = $blog->blogComments()->where('blog_state', BlogState::APPROVED)->orderBy('created_at', 'DESC')->paginate(5);
        $data = [
            'blog'          => $blog,
            'categories'    => $categories,
            'popularBlogs'  => $popularBlogs,
            'tags'          => $tags,
            'approvedComment' => $approvedComments
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
        $tag_id = $request['tag_id'];
        $search = $request['search_title'];
        $categorySlug = $request['category_slug'];
        $category = Category::where('slug', $categorySlug)->first();
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        $blogs = Blog::select('*');


        if(isset($filter) && $filter !== "ALL"){
            $blogs = $blogs->where('blog_state', $filter);
        }
        else if (isset($tag_id)){
            $blogs = $blogs->with('tags', function ($query) use ($tag_id){
                    $query->where('tag_id', $tag_id);
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
            $blogs = $blogs->where('category_id', $category->id);
        }
        if(isset($search)) {
            $blogs = $blogs->where('title', 'LIKE', '%'.$search.'%');
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
        $tags       = Tag::all();
        $data = [
            'blog' => $blog,
            'categories' => $categories,
            'tags'      => $tags,
            'comments' => $blog->blogComments()->orderBy('created_at', 'desc')->take(1)->get()
        ];


        return view('pages.management.blog.show')->with($data);
    }

    public function updateInformation(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:10',
            'blog_state' => ['required', Rule::in([BlogState::PENDING, BlogState::REJECTED, BlogState::APPROVED])],
            'description' => 'required|string|max:9000',
            'category_id'   => ['required'],
            'tag_id'      => 'required|array'
        ]);
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blog->update([
            'title'       => $request['title'],
            'description' => $request['description'],
            'blog_state'  => $request['blog_state'],
            'category_id' => $request['category_id']
        ]);

        $this->saveBlogTags($request, $blog);

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

    public function createBlog(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $tags       = Tag::all();
        $slug       = $request['slug'];

        $blog = Blog::where('slug', $slug)->first();
        Session::put('blog', $blog);


        $data = [
            'categories' => $categories,
            'tags'       => $tags,
            'blog'       => $blog
        ];

        return view('pages.management.blog.create')->with($data);
    }


    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:9000',
            'category_id' => 'required|string',
            'tag_id'      => 'required|array',
            'blog_state'   => ['required', Rule::in([BlogState::APPROVED, BlogState::REJECTED, BlogState::PENDING]) ]
        ]);

        $slug       = $request['slug'];

        $existBlog = Blog::where('slug', $slug)->first();

        if(!isset($existBlog)){
            $existBlog = Blog::create([
                'category_id'   => $request['category_id'],
                'title'         => $request['title'],
                'description'   => $request['description'],
                'blog_state'    => $request['blog_state'],
                'user_id'       => auth()->user()->id
            ]);
        }else {

            $existBlog->update([
                'category_id'   => $request['category_id'],
                'title'         => $request['title'],
                'description'   => $request['description'],
                'blog_state'    => $request['blog_state'],
            ]);
        }
        $this->saveBlogTags($request, $existBlog);

        return Redirect::route('manage-blogs.create.image', ['slug' => $existBlog->slug])->with(['status' => 'blog information created successfully']);
    }

    public function addBlogImage(Request $request)
    {
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->first();
        $data = [
            'blog' => $blog
        ];

        return view('pages.management.blog.add-image')->with($data);
    }

    public function storeBlogImages(Request $request)
    {
        $this->uploadImages($request);
        Session::remove('blog');
        return redirect()->route('manage-blogs')->with(['status' => 'Blog images saved successfully']);
    }

    public function updateBlogImages(Request $request)
    {
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->first();
        $files = $request['files'];
        $totalBlogImages = $blog->blogImages()->count();

        if($totalBlogImages + count($files) > 4){
            return  redirect()->back()->with(['error' => "400", 'msg' => 'Number of blog images must be less than or equal to four (04)']);
        }
        $this->uploadImages($request);
        Session::remove('blog');
        return redirect()->route('show.blog', ['slug' => $request['slug']])->with(['status' => 'Blog images saved successfully']);
    }

    public function deleteBlog(Request $request)
    {
        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->first();
        $blog->tags()->detach();
        $blog->blogImages()->delete();
        $blog->blogComments()->delete();
        $blog->delete();

        return redirect()->route('manage-blogs')->with(['status' => 'Blog delete successfully']);
    }

    public function deleteImage(Request $request)
    {
        $slug = $request['slug'];
        $imageSlug = $request['imageSlug'];
        $blog = Blog::where('slug', $slug)->first();
        $image = BlogImages::where('slug', $imageSlug)->where('blog_id', $blog->id)->first();
        $path = public_path(self::IMAGE_DIR.$blog->slug."/".$image->file_path);
        Storage::disk('public')->delete($path);
        $image->delete();

        return Redirect::back()->with(['status' => 'Blog image remove successfully']);
    }

    private function saveBlogTags($request, $blog)
    {
        $tags = $request['tag_id'];
        $blog->tags()->sync($tags);
    }

    private function saveBlogImages($fileName, $blog)
    {
        BlogImages::create([
            'blog_id' => $blog->id,
            'file_path' => $fileName,
            'is_main' => true
        ]);
    }

    private function uploadImages(Request $request)
    {
        $request->validate([
            'files' => 'required|array|between:1,4',
            'files.*' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = $request['slug'];
        $blog = Blog::where('slug', $slug)->first();


        foreach ($request->file('files') as $file){
            try {
                $extension = $file->getClientOriginalExtension();

                $fileName  =   time() . '_' . uniqid() . '.' . $extension;

                $path =$file->storeAs(self::IMAGE_DIR.$blog->slug, $fileName, 'public');

                $this->saveBlogImages($fileName, $blog);

                $manager  = new ImageManager(new Driver());
                $image    = $manager->read(storage_path('app/public/'.$path));
                $image    = $image->resize(250, 250);
                $image->save(storage_path('app/public/'.$path));
            }catch (\Exception $exception){

            }
        }
    }

}
