<?php

namespace App\Http\Controllers;

use App\Constant\Roles;
use App\Http\Requests\EnrollmentRequest;
use App\Mail\EnrollmentMail;
use App\Mail\EnrollmentNotification;
use App\Mail\NewStudentMail;
use App\Models\Enrollment;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function enrollStudent($slug, EnrollmentRequest $request)
    {

        $program = Program::where('slug', $slug)->firstOrFail();
        $exist   = $this->fetchStudent($request);

         if (!isset($exist)){
            $student = $this->createStudentAccount($request, $program);
            if($this->checkIfStudentAlreadyEnrollProgram($program->id, $student->id) !== null){
                return response()->json(['message' => 'User Already enrolled', 'status' => 200, 'code' => 'ENROLLED']);
            }else{
                Enrollment::create([
                    'program_id' => $program->id,
                    'user_id' => $student->id,
                    'has_completed_payment' => false,
                ]);

            }

        }else {
            if($this->checkIfStudentAlreadyEnrollProgram($program->id, $exist->id) !== null){
                return response()->json(['message' => 'User Already enrolled', 'status' => 200, 'code' => 'ENROLLED']);
            }else {
                Enrollment::create([
                    'program_id' => $program->id,
                    'user_id' => $exist->id,
                    'has_completed_payment' => false,
                    'enrollment_date' => Carbon::now()
                ]);

                $emailData = $this->setEmailData($request, $program, $exist);
                $this->sendNotificationsUponEnrollment($request, $emailData, $program, $exist);

            }
        }
         return response()->json(['message' => 'Successfully enrolled new student', 'status' => 200, 'code' => !isset($exist) ? 'NEW_ACCOUNT_CREATION' : 'EXISTING_ACCOUNT']);
    }


    public function createStudentAccount(EnrollmentRequest $request, $program)
    {
        $role = Role::where('name', Roles::TRAINEE)->firstOrFail();
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
                'password' => Hash::make('password'),
                'role_id'   => $role->id
            ]);

            $data = $this->setEmailData($request, $program, $student);

            Mail::to($request['email'])->send(new EnrollmentMail($data));
        }
        return $student;
    }

    private function generationEnrollmentVerificationLink($program, $student)
    {
        return urldecode(url()->query(env('ENROLLMENT_VERIFICATION_URL'), ['prog' => $program->slug, 'stud' => $student->slug,'expires' => strtotime(Carbon::now()->addHours(24))]));
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


    public function completeEnrollment(Request $request)
    {

       $expires = Carbon::create($request['expires']);
       $user   = User::where('slug', $request['stud'])->firstOrFail();
       $program = Program::where('slug', $request['prog'])->firstOrFail();
       $has_expire = Carbon::now()->greaterThan($expires);

       $enrollment = Enrollment::where('program_id', $program->id)->where('user_id', $user->id)->first();
       if(isset($enrollment) && !isset($enrollment->enrollment_date)){
           $user->update([
               'email_verified_at' => Carbon::now()
           ]);
           $enrollment->update([
               'enrollment_date' => Carbon::now()
           ]);

           $program_link = url()->query('training-detail', ['slug' => $program->slug]);

           $emailData = [
               'name' => $user['name'],
               'email' => $user['email'],
               'program' => $program,
               'is_first_time' => true,
               'program_image' => $program->getImagePath($program, $program->image_path),
               'program_link' => $program_link,
               'verificationUrl' => str_replace('amp;', '', $this->generationEnrollmentVerificationLink($program,$user))
           ];

           $this->sendNotificationsUponEnrollment($user['email'], $emailData, $program, $user);
       }

       $data = [
           'student' => $user,
           'program' => $program,
           'has_expire' => $has_expire,
           'message' => $has_expire ? 'Program Enrollment Link has Expired': 'Program Enrollment Completed Successfully',
           'program_link' => url()->query('training-detail', ['slug' => $program->slug])
       ];


       return view('pages.verification.enrollment')->with($data);
    }


    private function setEmailData($request, $program, $student)
    {
        $program_link = url()->query('training-detail', ['slug' => $program->slug]);
        return  [
            'name' => $request['name'],
            'email' => $request['email'],
            'program' => $program,
            'is_first_time' => true,
            'program_image' => $program->getImagePath($program, $program->image_path),
            'program_link' => $program_link,
            'verificationUrl' => str_replace('amp;', '', $this->generationEnrollmentVerificationLink($program,$student))
        ];
    }

    private function sendNotificationsUponEnrollment($studentEmail, $emailData, $program, $exist)
    {
        try {
            Mail::to($studentEmail)->send(new NewStudentMail($emailData));

        }catch (\Exception $e){
            return  response()->json(['message' => 'Could not sent email notification mail to student', 'code' => 'FAILED']);
        }

        try {
            $data = [
                'program'        => $program->title,
                'studentName'    => $exist->name,
                'studentEmail'   => $exist->email,
                'studentPhone'   => $exist->telephone,
                'studentAddress' => $exist->address,
                'adminEmail'     => env('MAIL_FROM_ADDRESS')
            ];

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EnrollmentNotification($data));

        }catch (\Exception $e){
            return  response()->json(['message' => 'Could not sent email notification mail to admin', 'code' => 'FAILED']);
        }

        return true;
    }

}
