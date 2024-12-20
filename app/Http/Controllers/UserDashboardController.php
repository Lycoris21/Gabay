<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function getUpcomingSessions()
    {
        $userId = Auth::id();
    
        $daUpcomingSessions = Booking::where(function ($query) use ($userId) {
            $query->where('tutee_id', $userId)
                  ->orWhere('tutor_id', $userId);
        })
        ->where('status', 'Approved')
        ->whereDate('date', '>=', now())
        ->orderBy('date', 'asc')
        ->get()
        ->map(function ($booking) use ($userId) {
            $booking->role = $booking->tutor_id == $userId ? 'Tutor' : 'Tutee';
            return $booking;
        });
    
        return $daUpcomingSessions;
    }
    
    public function getNotifications(){
        if (Auth::check()) {
            $bookingNotifications = Booking::where('tutee_id', Auth::user()->id)
                ->where('status', '!=', 'Pending')
                ->orderBy('updated_at', 'desc')
                ->get(['tutor_id', 'status', 'updated_at', 'id', 'subject_name'])
                ->map(function ($booking) {
                    $tutor = User::find($booking->tutor_id);
                    $booking->name = $tutor->first_name . ' ' . $tutor->last_name;
                    $booking->profile_picture = $tutor->profile_picture;

                    if ($booking->status === 'Approved') {
                        $booking->action = ' approved your booking for ';
                    }
                    else if ($booking->status === 'Rejected') {
                        $booking->action = ' rejected your booking for ';
                    }
                    else if ($booking->status === 'Cancelled') {
                        $booking->action = ' cancelled your booking for ';
                    }
                    else if ($booking->status === 'Rescheduled') {
                        $booking->action = ' rescheduled your booking for ';
                    }
                    else{
                        $booking->action = $booking->status;
                    }

                    return $booking;
                });

            // Fetch applications where the status is not 'Pending'
            $applicationNotifications = Application::where('user_id', Auth::user()->id)
                ->where('status', '!=', 'Pending')
                ->orderBy('updated_at', 'desc')
                ->get(['status', 'updated_at', 'id', 'subject'])
                ->map(function ($application) {
                    // Optionally append the data you need for each application
                    $application -> name = "Admin";
                    $application -> subject_name = $application -> subject;
                    $application->action = $application->status === 'Approved' 
                        ? ' approved your application for ' 
                        : ($application->status === 'Denied' 
                            ? ' rejected your application for ' 
                            : ' updated your application for '
                        );

                    return $application;
                });

            // Merge applications with the notifications
            $daNotifications = $bookingNotifications->merge($applicationNotifications);

            // Optionally, you can sort all notifications together by date
            $daNotifications = $daNotifications->sortByDesc('updated_at');

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

    public function getRequests(string $role = 'tutor')
    {
        $column = $role === 'tutee' ? 'tutee_id' : 'tutor_id';

        $requests = Booking::where($column, auth()->id())
        //->where('status', 'Pending') // Uncomment if you want to filter by status
        ->orderBy('date', 'asc')
        ->get() // Get all fields
        ->map(function ($booking) {
            // Find the tutee and tutor users
            $tutee = User::find($booking->tutee_id);
            $tutor = User::find($booking->tutor_id);

            // Make sure tutee and tutor names are available
            $tuteeName = $tutee ? $tutee->first_name . ' ' . $tutee->last_name : 'Tutee Name Not Found';
            $tutorName = $tutor ? $tutor->first_name . ' ' . $tutor->last_name : 'Tutor Name Not Found';

            return [
                'id' => $booking -> id,
                'name' => $tuteeName,  // name of the tutee
                'subject_topic' => $booking->subject_topic,
                'subject_name' => $booking->subject_name,
                'subject' => $booking->subject_name,
                'date' => \Carbon\Carbon::parse($booking->date)->format('F j, Y'),
                'time' => \Carbon\Carbon::parse($booking->start_time)->format('H:i') . '-' . \Carbon\Carbon::parse($booking->end_time)->format('H:i'),
                'status' => $booking->status,
                'tutor_id' => $booking->tutor_id,
                'tutee_id' => $booking->tutee_id, 
                'tutor_name' => $tutorName, 
                'tutee_name' => $tuteeName, 
                'platform' => $booking->platform,
                'link' => $booking->link,
                'reason' => $booking->reason
            ];
        });

        return $requests;
    }

    public function index()
    {
        $user = Auth::user();
        $section = 'profile'; 
        $content = 'dashboard.userProfile';

        $upcomingSessions = $this -> getUpcomingSessions();
        $notifications = $this -> getNotifications();
        $subjectTags = $this -> getSubjectTags();


        return view('dashboard', compact('user', 'section', 'content', 'notifications', 'upcomingSessions', 'subjectTags'));
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
        $requests = $this -> getRequests("tutor");

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

    public function bookings()
    {
        $user = Auth::user();
        $upcomingSessions = $this -> getUpcomingSessions();
        $notifications = $this -> getNotifications();
        $subjectTags = $this -> getSubjectTags();
        $bookings = $this -> getRequests("tutee");

        return view('dashboard', [
            'section' => 'bookings',
            'content' => 'dashboard.bookings',
            'upcomingSessions' => $upcomingSessions,
            'subjectTags' => $subjectTags,
            'bookings' => $bookings,
            'notifications' => $notifications,
            'user' => $user
        ]);
    }
    
}
