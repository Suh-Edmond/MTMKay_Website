<?php

namespace App\Traits;

use Carbon\Carbon;

trait SubscriptionTrait
{
    private function generationUnSubscriptionLink($subscriber)
    {
        return urldecode(url()->query(env('UNSUBSCRIPTION_URL'), ['subscriber' => $subscriber->slug,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }
}
