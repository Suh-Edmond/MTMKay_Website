<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComments extends Model
{
    use HasFactory;

    use SoftDeletes;

    use GenerateUUIDTrait;


    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'subject',
        'message'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
