<?php

namespace App\Http\Controllers;

use App\Constant\ProgramEnrollmentStatus;
use App\Models\Program;
use App\Models\StudentSuccess;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $trainings = Program::all();
        $successes = StudentSuccess::orderby('created_at', 'desc')->take(5)->get();
        $data = [
            'programs' => $trainings,
            'successes' => $successes
        ];

        return view("pages.main.training")->with($data);
    }

    public function show(Request $request)
    {
        $slug           = $request['slug'];
        $program        = Program::where('slug', $slug)->first();
        $availableSlots = $program->trainingSlots()->whereIn('status', [ProgramEnrollmentStatus::AVAILABLE, ProgramEnrollmentStatus::ALMOST_FULL])->orderBy('start_time', 'asc')->get();
        $trainingSlots  = $program->trainingSlots()->orderBy('start_time', 'asc')->get();
         $data = [
            'program'           => $program,
             'availableSlots'   => $availableSlots,
             'trainingSlots'   => $trainingSlots
        ];

        return view("pages.main.training-detail")->with($data);
    }
}
