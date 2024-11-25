<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestNavLayout extends Component
{


    public function render():View
    {
        return view('layouts.guest-nav');
    }
}
