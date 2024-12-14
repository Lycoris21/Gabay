<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RequestItem extends Component
{
    public $name;
    public $subject;
    public $date;
    public $time;
    public $status;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $subject, $date, $time, $status)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->date = $date;
        $this->time = $time;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.request-item');
    }
}