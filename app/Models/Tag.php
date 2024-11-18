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

    protected $primaryKey = 'id';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'name'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
