<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    use GenerateUUIDTrait;


    protected $fillable = [
        'name'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function checkIfBlogHasTag($tag, $blog)
    {
        $exist = $tag->blogs()->where('blog_id', $blog->id ?? '')->first();

        return isset($exist);
    }
}
