<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
       // Fetch all applications or add any necessary filtering
       $applications = Application::all(); 

       // Passing data to the view
       return view('admin.dashboard', compact('applications'));
    }

    public function manageUsers()
    {
        // Logic for managing users
        return view('admin.manageUsers');
    }

    public function analytics()
    {
        // Logic for managing users
        return view('admin.analytics');
    }

    public function settings()
    {
        // Logic for managing users
        return view('admin.settings');
    }
}