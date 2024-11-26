<?php

namespace App\Http\Controllers;

use App\Constant\Roles;
use App\Models\Blog;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request)
   {
       $role = Role::where('name', Roles::TRAINEE)->first();
       $students = User::where('role_id', $role->id)->count();
       $programs = Program::all()->count();
       $blogs = Blog::all()->count();

       $data = [
           'studentsCount' => $students,
           'programCount' => $programs,
           'blogCount'         => $blogs
       ];
       return view('dashboard')->with($data);
   }
}
