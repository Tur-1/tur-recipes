<?php

namespace App\View\Components\Home;

use Carbon\Carbon;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $startMorning = Carbon::createFromTime(0, 0, 0, 'GMT+3');
        $endMorning = Carbon::createFromTime(12, 0, 0, 'GMT+3');

        $startAfterNoon = Carbon::createFromTime(12, 1, 0, 'GMT+3');
        $endAfterNoon = Carbon::createFromTime(18, 30, 0, 'GMT+3');

        $startEvning = Carbon::createFromTime(18, 31, 0, 'GMT+3');
        $endEvning = Carbon::createFromTime(23, 59, 0, 'GMT+3');



        $timeNow = Carbon::now('GMT+3');

        if ($timeNow->between($startMorning, $endMorning, true)) {
            $welcomeMsg = 'Good Morning';
        }

        if ($timeNow->between($startAfterNoon, $endAfterNoon, true)) {
            $welcomeMsg = 'Good afternoon';
        }
        if ($timeNow->between($startEvning, $endEvning, true)) {
            $welcomeMsg = 'Good Evening';
        }


        return view('components.home.header', compact('welcomeMsg'));
    }
}