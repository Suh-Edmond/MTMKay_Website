<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    use GenerateUUIDTrait;

    protected $primaryKey = 'id';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];


    public function blogImages()
    {
        return $this->hasMany(BlogImages::class);
    }


    public function blogComments()
    {
        return $this->hasMany(BlogComments::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function getSingleBlogImage($id)
    {
        $blog = Blog::find($id);
        return $blog->blogImages()->where('is_main', true)->first();
    }

    public function getBlogCreatedHours($id)
    {
        $blog = Blog::find($id);
        $currentTime = Carbon::now();
        $blogCreatedTime = new Carbon($blog->created_at);

        return (int) $blogCreatedTime->diffInHours($currentTime);
    }
}
