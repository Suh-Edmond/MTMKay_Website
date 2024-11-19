<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    use GenerateUUIDTrait;

    protected $primaryKey = 'id';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'title',
        'objective',
        'eligibility',
        'cost',
        'training_resources',
        'duration',
        'trainer_name',
        'image_path',
        'available_seats'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function programOutlines()
    {
        return $this->hasMany(ProgramOutline::class);
    }

    public function studentSuccesses()
    {
        return $this->hasMany(StudentSuccess::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(PaymentTransaction::class, Enrollment::class);
    }
}
