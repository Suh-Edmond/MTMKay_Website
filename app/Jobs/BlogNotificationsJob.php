<?php

namespace App\Jobs;

use App\Constant\BlogState;
use App\Mail\BlogNotificationMail;
use App\Models\Blog;
use App\Models\Subscriber;
use App\Traits\SubscriptionTrait;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BlogNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SubscriptionTrait;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Start processing notifications...");
        $activeSubscribers = Subscriber::where('is_active', true)->get();

        Log::info("Fetch all subscribers...");
        $blogs = Blog::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
            ->where('blog_state', BlogState::APPROVED)->get();


        Log::info("Fetch all blogs posted today...");
        foreach ($activeSubscribers as $subscriber){
            $subscriptionLink = $this->generationUnSubscriptionLink($subscriber);

            Log::info("Sending email notification");

            try {
                Mail::to($subscriber->email)->send(new BlogNotificationMail($subscriber, $blogs, $subscriptionLink));

                Log::info("Notification was successfully sent");
            }catch (\Exception $exception){

                Log::error("Email notification could not be sent");
            }
        }
    }
}
