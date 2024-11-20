<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImages extends Model
{
    use HasFactory;

//    use GenerateUUIDTrait;
//
//    protected $primaryKey = 'id';
//    public $incrementing  = false;
//    protected $keyType    = 'string';

    protected $fillable = [
        'blog_id',
        'file_path',
        'is_main'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
