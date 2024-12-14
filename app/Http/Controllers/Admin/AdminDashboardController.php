<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch all applications or add any necessary filtering
        $applications = Application::all(); 

        // Passing data to the view
        return view('admin/dashboard', compact('applications'));
    }
}
