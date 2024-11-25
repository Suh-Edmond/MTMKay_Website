<?php

namespace App\Http\Controllers;

use App\Constant\Roles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request)
   {
       $role = Role::where('name', Roles::TRAINEE)->first();
       $students = User::where('role_id', $role->id)->get();
       return view('dashboard');
   }
}
