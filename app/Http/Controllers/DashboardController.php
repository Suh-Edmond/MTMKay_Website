<?php

namespace App\Http\Controllers;

use App\Constant\Roles;
use App\Models\Blog;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

   public function removeTab()
   {
       $tabs = Session::get('tabs');
       $tabs = array_slice($tabs, 0, 1);
       Session::put('tabs', $tabs);

       return response()->json(['msg' => 'tab remove success']);
   }
}
