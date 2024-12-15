<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class TotalStudentsCard extends Component
{
    public $totalStudents;

    public function __construct($totalStudents)
    {
        // Count users who are not tutors (is_tutor = 0)
        $this->totalStudents = $totalStudents;
    }

    public function render()
    {
        return view('components.total-students-card');
    }
}
