<?php

namespace App\Console\Commands;

use App\Jobs\BlogNotificationsJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendBlogNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-blog-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification alerts when blogs are created';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("Start running cron job");

        dispatch(new BlogNotificationsJob())->delay(now()->addMinutes(1));

        Log::info("Finish executing cron job");
    }
}
