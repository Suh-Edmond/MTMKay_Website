<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view("pages.main.contact");
    }

    public function submitRequest(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' =>  ['required', 'string', 'lowercase', 'email', 'max:255'],
            'subject' => 'required|string|max:100',
            'message' => 'required|max:1000|string',
            'response_url' => 'mailto:'.$request['email']
        ]);
        $emailData = [
            'response_url' => 'mailto:'.$request['email'],
            'name' => $data['name'],
            'email' =>  $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ];

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($emailData));

        return redirect()->back();
    }
}
