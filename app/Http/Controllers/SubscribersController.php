<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request['filter'];
        $sort = $request['sort'];
        $subscribers = Subscriber::select('*');
        $filterValue = $filter == "ACTIVE";
        if (isset($filter)){
            $subscribers = $subscribers->where('is_active', $filterValue);
        }
        if (isset($sort)){
            switch ($sort) {
                case 'DATE_ASC':
                    $subscribers->orderBy('created_at');
                    break;
                case 'NAME':
                    $subscribers->orderBy('name');
                    break;
                default:
                    $subscribers->orderByDesc('created_at');
                    break;
            }
        }
        $subscribers = $subscribers->paginate();
        $data = [
            'subscribers' => $subscribers
        ];
        return view('pages.management.subscribers.index')->with($data);
    }

    public function addMemberSubscription(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|lowercase|unique:users,email',
        ]);

        $saved = Subscriber::create([
            'email' => $request['email'],
        ]);
        $data = [
            'email' => $saved->email
        ];
        Mail::to($request['email'])->send(new SubscriptionMail($data));

        return response()->json(['status' => 'success', 'code'=>'200_subscription']);
    }
}
