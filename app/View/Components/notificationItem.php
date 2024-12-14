<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notificationItem extends Component
{
    public $name;
    public $action;
    public $booking;
    public $time;

    public function __construct($name, $action, $booking, $time)
    {
        $this->name = $name;
        $this->action = $action;
        $this->booking = $booking;
        $this->time = $time;
    }

    public function render()
    {
        return view('components.notification-item');
    }
}
