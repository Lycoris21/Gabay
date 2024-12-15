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
                $tutor = User::find($booking->tutor_id);
                $booking->name = $tutor->first_name . ' ' . $tutor->last_name;
                $booking->profile_picture = $tutor->profile_picture;
                
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
            return Tutor::where('user_id', $user->id)->first()->subjects;
        }

        return collect();
    }

    public function getRequests()
    {
        $requests = Booking::where('tutor_id', auth()->id())
            //->where('status', 'Pending')
            ->get(['tutee_id', 'subject_name', 'date', 'start_time', 'end_time', 'status'])
            ->map(function ($booking) {
                $tutee = User::find($booking->tutee_id);
                return [
                    'name' => $tutee->first_name . ' ' . $tutee->last_name,
                    'subject' => $booking->subject_name,
                    'date' => \Carbon\Carbon::parse($booking->date)->format('F j, Y'),
                    'time' => \Carbon\Carbon::parse($booking->start_time)->format('H:i') . '-' . \Carbon\Carbon::parse($booking->end_time)->format('H:i'),
                    'status' => $booking->status
                ];
            });

        return $requests;
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
        $requests = $this -> getRequests();

        return view('dashboard', [
            'section' => 'requests',
            'content' => 'dashboard.requests',
            'upcomingSessions' => $upcomingSessions,
            'subjectTags' => $subjectTags,
            'requests' => $requests,
            'notifications' => $notifications,
            'user' => $user
        ]);
    }
}
