<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    use GenerateUUIDTrait;
   protected $fillable = [
       'name'
   ];

   public function users()
   {
       return $this->hasMany(User::class);
   }
}
