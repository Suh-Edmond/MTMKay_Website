<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view("pages.main.contact");
    }

    public function submitRequest(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' =>  ['required', 'string', 'lowercase', 'email', 'max:255'],
            'subject' => 'required|string|max:500|min:10',
            'message' => 'required|max:1000|string|min:50',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput($request->all());
        }

        $emailData = [
            'response_url' => 'mailto:'.$request['email'],
            'name' => $request['name'],
            'email' =>  $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message'],
            'adminEmail' => env('MAIL_FROM_ADDRESS')
        ];

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($emailData));

        return redirect()->back()->with(['message' => "Your Inquiry was sent successfully. We will get back to you soonest", "expires" => Carbon::now()->addSeconds(3)]);
    }
}
