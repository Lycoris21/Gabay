<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserTable extends Component
{
    public $users;

    /**
     * Create a new component instance.
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.user-table');
    }
}
