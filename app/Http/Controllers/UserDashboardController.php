<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{

    public function index()
    {
        $section = 'profile'; 
        $content = 'dashboard.userProfile'; 

        $upcomingSessions = Booking::where('tutee_id', Auth::id())
            ->whereDate('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();

        $subjectTags = ['Mathematics', 'English', 'Programming'];

        return view('dashboard', compact('section', 'content', 'upcomingSessions', 'subjectTags'));
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

    public function dashboard()
    {
        // Retrieve bookings for the logged-in user
        $upcomingSessions = Booking::where('tutee_id', Auth::id()) // Assuming the user is a tutee
            ->whereDate('date', '>=', now()) // Only future bookings
            ->orderBy('date', 'asc') // Order by date, ascending
            ->get();

        // Sample subject tags, can be dynamic depending on your needs
        $subjectTags = ['Mathematics', 'English', 'Programming'];

        // Return the dashboard view with the upcoming sessions and subject tags
        return view('dashboard', compact('upcomingSessions', 'subjectTags'));
    }

}
