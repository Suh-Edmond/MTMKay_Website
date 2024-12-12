<?php

namespace App\Http\Controllers;

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
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();
         $data = [
            'program' => $program
        ];
        return view("pages.main.training-detail")->with($data);
    }
}
