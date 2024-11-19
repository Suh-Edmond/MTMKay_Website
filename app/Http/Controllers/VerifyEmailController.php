<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::find($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => "Enrollment completed successfully"]);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        $this->completeStudentEnrollment($user);
        return response()->json(['message' => "Enrollment completed successfully"]);
    }

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => "Email verification link sent"]);
    }

    private function completeStudentEnrollment($student)
    {
        $enrollment = Enrollment::whereNull('enrollment_date')->where('user_id', $student->id)->first();
        $enrollment->update([
            'enrollment_date' => Carbon::now()
        ]);
    }
}
