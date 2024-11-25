<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateUUIDTrait
{
    public static function booted() {
        static::creating(function ($model) {
            $model->slug = (string)Str::uuid();
        });
    }

}
