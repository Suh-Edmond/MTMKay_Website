<?php

namespace App\Models;

use App\Constant\BlogState;
use App\Traits\GenerateUUIDTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    const IMAGE_DIR ='/storage/uploads/images/blogs/';
    use HasFactory, SoftDeletes;

    use GenerateUUIDTrait;


    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'blog_state'
    ];


    public function blogImages()
    {
        return $this->hasMany(BlogImages::class);
    }


    public function blogComments()
    {
        return $this->hasMany(BlogComments::class);
    }

    public function getApprovedBlogComments($id)
    {
        $blog = Blog::find($id);
         return $blog->blogComments()->where('status', BlogState::APPROVED)->orderBy('created_at', 'DESC')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSingleBlogImage($id)
    {
        $blog = Blog::find($id);

        $image = $blog->blogImages()->first();

        return isset($image) ? self::IMAGE_DIR.$blog->slug."/".$image->file_path: "";
    }

    public function getBlogCreatedHours($id)
    {
        $blog = Blog::find($id);
        $currentTime = Carbon::now();
        $blogCreatedTime = new Carbon($blog->created_at);
        $time = $blogCreatedTime->diffInHours($currentTime);
        $time = round($time);

        $displayTime = "";
        switch ($time){
            case $time < 1:
                $displayTime = "Few Minute ago";
            break;
            case $time == 1:
                $actualTime = $blogCreatedTime->diffInMinutes($currentTime);
                $displayTime = $actualTime. " Minutes ago";
                break;
            case $time > 1 && $time <= 60;
                $displayTime = $time. " Hours ago";
                break;
            case $time > 60 && $time <= 1440:
                $actualTime = $time/24;
                $displayTime = round($actualTime). " Days ago";
                break;
            case $time > 1440 && $time <= 1860:
                $actualTime = $time/744;
                $displayTime = round($actualTime). " Months ago";
            break;
        }

        return ($displayTime);
    }



    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getImagePath($blog, $image_path)
    {
        return self::IMAGE_DIR.$blog->slug."/".$image_path;
    }

    public function stripDescriptionTags($desc)
    {
        return strip_tags($desc);
    }
}
