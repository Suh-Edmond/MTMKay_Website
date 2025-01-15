<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function PHPUnit\Framework\isEmpty;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    use GenerateUUIDTrait;


    protected $fillable = [
        'training_slot_id',
        'user_id',
        'has_completed_payment',
        'enrollment_date'
    ];

    protected $with = [
        'trainingSlot'
    ];

    public function trainingSlot()
    {
        return $this->belongsTo(TrainingSlot::class);
    }

    public function paymentTransactions()
    {
        return $this->hasMany(PaymentTransaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalEnrollmentPayment($enrollment, $program)
    {
        return !isEmpty($program) ? $program->cost - $enrollment->paymentTransactions()->sum('amount_deposited'): 0;
    }
}
