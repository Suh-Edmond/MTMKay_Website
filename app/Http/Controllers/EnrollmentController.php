<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\PaymentTransaction;
use App\Models\Program;
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
        dd($enrollment);
        $enrollment->delete();

        return redirect()->back()->with('status', 'Enrollment deleted successfully');
    }


    public function makePayment(Request $request)
    {

        $slug = $request['slug'];
        $programSlug = $request['programSlug'];
        $program = Program::where('slug', $programSlug)->first();
        $enrollment = Enrollment::where('slug', $slug)->firstOrFail();
        PaymentTransaction::create([
            'enrollment_id' => $enrollment->id,
            'amount_deposited' => $request['amount_deposited'],
            'payment_date'     => $request['payment_date']
        ]);


        if($this->checkCompletedPayment($enrollment, $program)){
            $enrollment->update([
                'has_completed_payment' => true
            ]);
        }

        return redirect()->back()->with('status', 'Payment Completed Successfully');
    }


    public function fetchPaymentTransactions(Request $request)
    {
        $slug = $request['slug'];

        $enrollment = Enrollment::where('slug', $slug)->first();

        $data = [
            'payments' => $enrollment->paymentTransactions()->orderBy('created_at', 'DESC')->get(),
            'user' => $enrollment->user
        ];

        return view('pages.management.program.payment')->with($data);
    }


    private function checkCompletedPayment($enrollment, $program)
    {
        $totalAmountPaid = PaymentTransaction::where('enrollment_id', $enrollment->id)->sum('amount_deposited');

        return ($totalAmountPaid >= $program->cost);
    }


}
