<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Tutor;
use App\Models\BookingNotification;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function getUpcomingSessions(){
        $daUpcomingSessions = Booking::where('tutee_id', Auth::id())
        ->whereDate('date', '>=', now())
        ->orderBy('date', 'asc')
        ->get();

        return $daUpcomingSessions;
    }

    public function getNotifications(){
        if (Auth::check()) {
            $daNotifications = Booking::where('tutee_id', Auth::user()->id)
            ->where('status', '!=', 'Pending')
            ->get(['tutor_id', 'status', 'updated_at', 'id', 'subject_name'])
            ->map(function ($booking) {
                $booking->name = User::find($booking->tutor_id)->first_name . ' ' . User::find($booking->tutor_id)->last_name;
                
                if ($booking->status === 'Approved') {
                    $booking->action = ' approved your booking for ';
                }

                if ($booking->status === 'Rescheduled') {
                    $booking->action = ' rescheduled your booking for ';
                }

                return $booking;
            });
        } else {
            $daNotifications = collect();
        }
        

        return $daNotifications;
    }

    public function getSubjectTags()
    {
        $user = Auth::user();

        if ($user->is_tutor == 1) {
            return Tutor::where('user_id', $user->id)->first()->subjects();
        }

        return collect();
    }


    public function index()
    {
        $section = 'profile'; 
        $content = 'dashboard.userProfile';

        $upcomingSessions = $this -> getUpcomingSessions();
        $notifications = $this -> getNotifications();
        $subjectTags = $this -> getSubjectTags();


        return view('dashboard', compact('section', 'content', 'notifications', 'upcomingSessions', 'subjectTags'));
    }
    
    public function profile()
    {
        $user = Auth::user();
        $upcomingSessions = $this -> getUpcomingSessions();
        $notifications = $this -> getNotifications();
        $subjectTags = $this -> getSubjectTags();

        

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
        $upcomingSessions = $this -> getUpcomingSessions();
        $notifications = $this -> getNotifications();
        $subjectTags = $this -> getSubjectTags();

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
