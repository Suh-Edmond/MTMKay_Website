<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionMail;
use App\Models\Subscriber;
use Carbon\Carbon;
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
        $subscribers = $subscribers->paginate(10);
        $data = [
            'subscribers' => $subscribers
        ];
        return view('pages.management.subscribers.index')->with($data);
    }

    public function addMemberSubscription(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|lowercase|unique:subscribers,email',
        ]);

        $saved = Subscriber::create([
            'email' => $request['email'],
        ]);
        $data = [
            'email' => $saved->email,
            'unsubscription_link' => $this->generationUnSubscriptionLink($saved)
        ];
        Mail::to($request['email'])->send(new SubscriptionMail($data));

        return response()->json(['status' => 'success', 'code'=>'200_subscription']);
    }

    public function removeMemberSubscription(Request $request)
    {
        $slug = $request['subscriber'];
        $subscriber = Subscriber::where('slug', $slug)->first();
        $subscriber->update([
            'is_active' => false
        ]);

        $data = [
            'message' => "You have successfully unsubscribe from our news letter",
            'resubscribe_link' => $this->generationSubscriptionLink($subscriber),
            'subscriber' => $subscriber
        ];

        return view('pages.subscription.unsubscribe')->with($data);
    }

    public function resubscribe(Request $request)
    {
        $slug = $request['subscriber'];
        $subscriber = Subscriber::where('slug', $slug)->first();
        $subscriber->update([
            'is_active' => true
        ]);

        $data = [
            'message' => "Thank you for resubscribing to our news letter. You will be amongst the first to receive news and updates about our training programs and blogs",
            'resubscribe_link' => $this->generationSubscriptionLink($subscriber),
            'subscriber' => $subscriber,
            'website_link' => env('APP_URL')
        ];

        return view('pages.subscription.unsubscribe')->with($data);
    }

    private function generationUnSubscriptionLink($subscriber)
    {
        return urldecode(url()->query(env('UNSUBSCRIPTION_URL'), ['subscriber' => $subscriber->slug,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }

    private function generationSubscriptionLink($subscriber)
    {
        return urldecode(url()->query(env('RESUBSCRIPTION_URL'), ['subscriber' => $subscriber->slug,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }
}
