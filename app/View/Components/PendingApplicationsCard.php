<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Application;

class PendingApplicationsCard extends Component
{
    public $pendingApplications;

    public function __construct()
    {
        // Count applications with status 'Pending'
        $this->pendingApplications = Application::where('status', 'Pending')->count();
    }

    public function render()
    {
        return view('components.pending-applications-card');
    }
}
