<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserDashboardNavigation extends Component
{
    public $currentSection;

    public function __construct($currentSection)
    {
        $this->currentSection = $currentSection;
    }

    
    public function render()
    {
        return view('components.user-dashboard-navigation');
    }
}
