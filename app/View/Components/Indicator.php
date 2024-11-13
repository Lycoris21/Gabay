<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Indicator extends Component
{
    public $isActive;
    public function __construct($isActive = false)
    {
        $this->isActive = $isActive;
    }
    public function render(): View|Closure|string
    {
        return view('components.indicator');
    }
}

