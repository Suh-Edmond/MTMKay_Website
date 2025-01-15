<?php

namespace App\Jobs;

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
        $blogs = Blog::whereDate('created_at', Carbon::today())->get();

        Log::info("Fetch all blogs posted today...");
        foreach ($activeSubscribers as $subscriber){
            foreach ($blogs as $blog) {
                $notificationData = [
                    'subscriber' => $subscriber->email,
                    'post'      => $blog,
                    'category'   => $blog->category->name,
                    'tags'       => $blog->tags,
                    'title'      => $blog->title,
                    'blog_image' => $blog->getSingleBlogImage($blog->id),
                    'blog_slug'  => $blog->slug,
                    'blog_detail_url' =>  url()->query('blog-detail', ['slug' => $blog->slug]),
                    'unsubscription_link' => $this->generationUnSubscriptionLink($subscriber)
                ];

                Log::info("Sending email notification");
                try {
                    Mail::to($subscriber->email)->send(new BlogNotificationMail($notificationData));
                    Log::info("Notification was successfully sent");
                }catch (\Exception $exception){
                    Log::error("Email notification could not be sent");
                }
            }
        }
    }
}
