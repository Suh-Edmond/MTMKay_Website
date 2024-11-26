<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\PaymentTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $trainees = Enrollment::whereNotNull('enrollment_date')->paginate(10);
        $date = Carbon::now();
        $data = [
            'trainees' => $trainees,
            'date'     => $date
        ];
        return view('pages.management.trainee.trainees')->with($data);
    }

    public function deleteTrainee(Request $request)
    {
        $slug = $request['slug'];
        $enrollment = Enrollment::where('slug', $slug)->firstOrFail();
        $enrollment->delete();

        return redirect()->back()->with('status', 'Enrollment deleted successfully');
    }


    public function makePayment(Request $request)
    {
        $slug = $request['slug'];
        $enrollment = Enrollment::where('slug', $slug)->firstOrFail();
        PaymentTransaction::create([
            'enrollment_id' => $enrollment->id,
            'amount_deposited' => $request['amount_deposited'],
            'payment_date'     => $request['payment_date']
        ]);

        return redirect()->with('status', 'Payment Completed Successfully');
    }
}
