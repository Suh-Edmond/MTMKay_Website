<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::all();
        $data = [
            'programs' => $programs
        ];

        return view('pages.management.program.index')->with($data);
    }
}
