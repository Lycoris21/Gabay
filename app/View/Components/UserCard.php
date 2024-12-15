<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserCard extends Component
{
    public $subjectTags;

    /**
     * Create a new component instance.
     */
    public function __construct($subjectTags)
    {
        $this->subjectTags = $subjectTags;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-card');
    }
}