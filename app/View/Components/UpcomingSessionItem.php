<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpcomingSessionItem extends Component
{
    public $dayOfWeek;
    public $day;
    public $subject;
    public $topic;
    public $time;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dayOfWeek, $day, $subject, $topic, $time)
    {
        $this->dayOfWeek = $dayOfWeek;
        $this->day = $day;
        $this->subject = $subject;
        $this->topic = $topic;
        $this->time = $time;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.upcoming-session-item');
    }
}
