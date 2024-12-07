<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\PaymentTransaction;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{

    public function __construct()
    {

        $tabs = Session::get("tabs");
        if(!isset($tabs)){
            Session::put("tabs", []);
        }
    }

    public function index(Request $request)
    {
        $trainees = Enrollment::whereNotNull('enrollment_date');
        $filter = $request['filter'];
        $sort  = $request['sort'];
        $programId  = $request['program_id'];
        if(isset($filter)){
            switch ($filter){
                case "COMPLETED":
                    $trainees = $trainees->where('has_completed_payment', true);
                    break;
                case 'IN_COMPLETE':
                    $trainees = $trainees->where('has_completed_payment', false);
                    break;
            }
        }
        if(isset($sort)){
             switch ($sort) {
                case 'DATE_ASC':
                    $trainees->orderBy('created_at');
                    break;
                default:
                    $trainees->orderByDesc('created_at');
                    break;
            }
        }
        if(isset($programId) && $programId !== "ALL"){
            $trainees = $trainees->where('program_id', $programId);
        }

        $this->setNavigationTitle( "Enrollment Management");

        $trainees = $trainees->paginate(10);
        $programs = Program::all();
        $date = Carbon::now();
        $data = [
            'trainees' => $trainees,
            'date'     => $date,
            'programs' => $programs
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

    private function setNavigationTitle($navTab)
    {
        $existTabs = Session::get('tabs');

        if (!in_array($navTab, $existTabs)){
           $existTabs[] = $navTab;
        }

        Session::put("tabs", $existTabs);
    }
}
