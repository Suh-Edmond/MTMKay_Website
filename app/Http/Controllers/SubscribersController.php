<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionMail;
use App\Models\Subscriber;
use App\Traits\SubscriptionTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{
    use SubscriptionTrait;
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
        $subscriber = "";

        if (isset($slug)){
            $subscriber = Subscriber::where('slug', $slug)->first();
        }

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
        $email = $request['email'];

        $subscriber = "";
        if(isset($slug)){
            $subscriber = Subscriber::where('slug', $slug)->first();
            $subscriber->update([
                'is_active' => true
            ]);
        }
        if(isset($email)){
            $subscriber = Subscriber::where('email', $email)->first();
            if(!isset($subscriber)){
                $subscriber = Subscriber::create([
                    'email' => $request['email'],
                    'is_active' => true
                ]);
            }else {
                $subscriber->update([
                    'is_active' => true
                ]);
            }
        }

        $data = [
            'message' => "Thank you for subscribing to our news letter. You will be amongst the first to receive news and updates about our training programs and blogs",
            'resubscribe_link' => $this->generationSubscriptionLink($subscriber),
            'subscriber' => $subscriber,
            'link_training_programs' => env('APP_TRAINING_URL')
        ];

        return view('pages.subscription.unsubscribe')->with($data);
    }


    private function generationSubscriptionLink($subscriber)
    {
        return urldecode(url()->query(env('RESUBSCRIPTION_URL'), ['subscriber' => $subscriber->slug,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }
}
