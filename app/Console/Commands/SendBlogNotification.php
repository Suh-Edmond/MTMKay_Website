<?php

namespace App\Console\Commands;

use App\Jobs\BlogNotificationsJob;
use Illuminate\Console\Command;

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
        dispatch(new BlogNotificationsJob())->delay(now()->addMinutes(10));
    }
}
