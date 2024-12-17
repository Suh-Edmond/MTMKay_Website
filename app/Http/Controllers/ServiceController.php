<?php

namespace App\Http\Controllers;

use App\Models\StudentSuccess;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $successes = StudentSuccess::orderby('created_at', 'desc')->take(5)->get();
        $data = [
            'successes' => $successes
        ];
        return view("pages.main.service")->with($data);
    }
}
