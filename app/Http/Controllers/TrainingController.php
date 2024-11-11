<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        return view("pages.main.training");
    }

    public function show(Request $request)
    {
        return view("pages.main.training-detail");
    }
}
