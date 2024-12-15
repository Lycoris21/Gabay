<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Models\Tutor;

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
        $users = User::all();

        // Logic for managing users
        return view('admin.manageUsers', compact('users'));
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