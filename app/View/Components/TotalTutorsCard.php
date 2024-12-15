<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class TotalTutorsCard extends Component
{
    public $totalTutors;

    public function __construct($totalTutors)
    {
        // Count users who are tutors (is_tutor = 1)
        $this->totalTutors = $totalTutors;
    }

    public function render()
    {
        return view('components.total-tutors-card');
    }
}
