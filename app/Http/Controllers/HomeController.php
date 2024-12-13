<?php

namespace App\Http\Controllers;

use App\Models\StudentSuccess;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $successes = StudentSuccess::orderby('created_at', 'desc')->get();
        $data = [
            'successes' => $successes
        ];
//        dd($data['successes']);
        return view("pages.main.index")->with($data);
    }
}
