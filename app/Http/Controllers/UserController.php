<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Enrollment;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function enrollStudent($id, EnrollmentRequest $request)
    {

        $program = Program::findOrFail($id);
        $exist   = $this->fetchStudent($request);

        if (!isset($exist)){
            $student = $this->createStudentAccount($request);
            if($this->checkIfStudentAlreadyEnrollProgram($id, $student->id) !== null){
                return response()->json(['message' => 'User Already enrolled', 'status' => 200, 'code' => 'ENROLLED']);
            }else{
                Enrollment::create([
                    'program_id' => $program->id,
                    'user_id' => $student->id,
                    'has_completed_payment' => false,
                ]);
            }

        }else {
            if($this->checkIfStudentAlreadyEnrollProgram($id, $exist->id) !== null){
                return response()->json(['message' => 'User Already enrolled', 'status' => 200, 'code' => 'ENROLLED']);
            }else {
                Enrollment::create([
                    'program_id' => $program->id,
                    'user_id' => $exist->id,
                    'has_completed_payment' => false,
                    'enrollment_date' => Carbon::now()
                ]);
            }
        }
        $hasVerifyEmail = $this->checkIfEmailVerify($request['email']);
        return response()->json(['message' => 'User account created successfully', 'status' => 200, 'code' => isset($hasVerifyEmail)? 'NEW_ACCOUNT_CREATION' : 'EXISTING_ACCOUNT']);
    }


    public function createStudentAccount(EnrollmentRequest $request)
    {
        $student = $this->fetchStudent($request);
        if(!isset($student)){
            $request->validate([
                'email' => 'unique:users,email'
            ]);
            $student = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'telephone' => $request['telephone'],
                'address'  => $request['address'],
                'password' => Hash::make('password')
            ]);

            event(new Registered($student));
        }
        return $student;
    }

    private function fetchStudent($request)
    {
        return User::where('email', $request['email'])->first();
    }

    private function checkIfEmailVerify($email)
    {
        return User::where('email', $email)->whereNull('email_verified_at')->first();
    }

    private function checkIfStudentAlreadyEnrollProgram($programId, $userId)
    {
        return Enrollment::where('program_id', $programId)->where('user_id', $userId)->whereNotNull('enrollment_date')->first();
    }

}
