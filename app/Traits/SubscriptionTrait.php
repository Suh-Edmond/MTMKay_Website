<?php

namespace App\Traits;

use Carbon\Carbon;

trait SubscriptionTrait
{
    public function generationUnSubscriptionLink($subscriber)
    {
        return urldecode(url()->query(env('UNSUBSCRIPTION_URL'), ['subscriber' => $subscriber->slug,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }

    public function generationSubscriptionLinkUsingEmail($email)
    {
        return urldecode(url()->query(env('EMAIL_SUBSCRIPTION_URL'), ['email' => $email,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }

    public function generationUnSubscriptionLinkUsingEmail($email)
    {
        return urldecode(url()->query(env('EMAIL_UNSUBSCRIPTION_URL'), ['email' => $email,'expires' => strtotime(Carbon::now()->addHours(24))]));
    }
}
