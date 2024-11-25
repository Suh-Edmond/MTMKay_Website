<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request)
   {
//       $students = User
       return view('dashboard');
   }
}
