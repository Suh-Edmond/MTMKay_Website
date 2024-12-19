<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\PaymentTransaction;
use App\Models\Program;
use App\Traits\PaymentTransactionTrait;
use Illuminate\Http\Request;

class PaymentTransactionController extends Controller
{
    use PaymentTransactionTrait;
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

        return redirect()->route('manage-students.view.payments', ['slug' => $enrollment->slug])->with('status', 'Payment Completed Successfully');
    }

    public function fetchPaymentTransactions(Request $request)
    {
        $slug = $request['slug'];

        $enrollment = Enrollment::where('slug', $slug)->first();

        $this->setNavigationTitle("Payment Transactions");

        $payments = $enrollment->paymentTransactions();

        $programCost = $enrollment->program->cost;

        $total = $payments->sum('amount_deposited');

        $data = [
            'payments' => $payments->orderBy('created_at', 'DESC')->get(),
            'user' => $enrollment->user,
            'total' => $total,
            'balance' => ($programCost - $total),
            'enrollment' => $enrollment
        ];

        return view('pages.management.program.payment')->with($data);
    }

    private function checkCompletedPayment($enrollment, $program)
    {
        $totalAmountPaid = PaymentTransaction::where('enrollment_id', $enrollment->id)->sum('amount_deposited');

        return ($totalAmountPaid >= $program->cost);
    }

}
