<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\BookingNotification;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $section = 'profile'; 
        $content = 'dashboard.userProfile';

        if (Auth::check()) {
            $notifications = BookingNotification::where('user_id', Auth::user() -> id)->get();
        } else {
            $notifications = collect();
        }

        $upcomingSessions = Booking::where('tutee_id', Auth::id())
            ->whereDate('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();

        $subjectTags = ['Mathematics', 'English', 'Programming'];


        return view('dashboard', compact('section', 'content', 'notifications', 'upcomingSessions', 'subjectTags'));
    }
    
    public function profile()
    {
        $user = Auth::user();

        $upcomingSessions = Booking::where('tutee_id', Auth::id())
            ->whereDate('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();

        $subjectTags = ['Mathematics', 'English', 'Programming'];

        if (Auth::check()) {
            $notifications = BookingNotification::where('user_id', Auth::user() -> id)->get();
        } else {
            $notifications = collect();
        }

        return view('dashboard', [
            'section' => 'profile',
            'content' => 'dashboard.userProfile',
            'upcomingSessions' => $upcomingSessions,
            'subjectTags' => $subjectTags,
            'notifications' => $notifications,
            'user' => $user
        ]);
    }

    public function requests()
    {
        $user = Auth::user();

        $upcomingSessions = Booking::where('tutee_id', Auth::id())
            ->whereDate('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();

        $subjectTags = ['Mathematics', 'English', 'Programming'];

        if (Auth::check()) {
            $notifications = BookingNotification::where('user_id', Auth::user() -> id)->get();
        } else {
            $notifications = collect();
        }

        return view('dashboard', [
            'section' => 'requests',
            'content' => 'dashboard.requests',
            'upcomingSessions' => $upcomingSessions,
            'subjectTags' => $subjectTags,
            'notifications' => $notifications,
            'user' => $user
        ]);
    }
}
