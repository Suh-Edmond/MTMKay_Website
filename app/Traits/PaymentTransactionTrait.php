<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait PaymentTransactionTrait
{
    private function setNavigationTitle($navTab)
    {
        $existTabs = Session::get('tabs');

        if (!in_array($navTab, $existTabs)){
            $existTabs[] = $navTab;
        }

        Session::put("tabs", $existTabs);
    }
}
