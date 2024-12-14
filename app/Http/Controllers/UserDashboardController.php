<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{

    public function index()
    {
        $section = 'profile'; 
        $content = 'dashboard.userProfile'; 

        return view('dashboard', compact('section', 'content'));
    }
    
    public function profile()
    {
        return view('dashboard', [
            'section' => 'profile',
            'content' => 'dashboard.userProfile',
        ]);
    }

    public function requests()
    {
        return view('dashboard', [
            'section' => 'requests',
            'content' => 'dashboard.requests',
        ]);
    }

    

}
