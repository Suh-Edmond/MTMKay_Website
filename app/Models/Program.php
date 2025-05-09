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

    const IMAGE_DIR ='/storage/uploads/images/programs';


    protected $fillable = [
        'title',
        'objective',
        'eligibility',
        'cost',
        'training_resources',
        'duration',
        'trainer_name',
        'image_path',
        'job_opportunities'
    ];

    public function trainingSlots()
    {
        return $this->hasMany(TrainingSlot::class);
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

    public function getImagePath($program, $image_path)
    {
        return self::IMAGE_DIR."/".$program->slug."/".$image_path;
    }

    public function getTotalEnrollment($program)
    {
        return collect($program->trainingSlots)->map(function ($slot) {
           return ["enrollmentBySlot" => $slot->enrollments->count()];
        })->sum("enrollmentBySlot");
    }
}
