<?php

namespace App\Http\Controllers;

use App\Constant\Roles;
use App\Models\Blog;
use App\Models\Enrollment;
use App\Models\Program;
use App\Models\Role;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
   public function index(Request $request)
   {
       $students = Enrollment::whereNotNull('enrollment_date')->count();
       $programs = Program::all()->count();
       $blogs = Blog::all()->count();
       $subscribersCount = Subscriber::where('is_active', true)->count();

       $data = [
           'studentsCount'     => $students,
           'programCount'      => $programs,
           'blogCount'         => $blogs,
           'subscribersCount'  => $subscribersCount
       ];

       return view('dashboard')->with($data);
   }

}
