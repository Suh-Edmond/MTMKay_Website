<?php

namespace App\Models;

use App\Traits\GenerateUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    use GenerateUUIDTrait;


    protected $fillable = [
        'program_id',
        'user_id',
        'has_completed_payment',
        'enrollment_date'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
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
        return $program->cost - $enrollment->paymentTransactions()->sum('amount_deposited');
    }
}
