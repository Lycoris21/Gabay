<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Container\Attributes\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {  
        $validated = $request->validate([
            'subject_name' => 'required|string|max:255',
            'subject_topic' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'platform' => 'required|in:Google Meet,Zoom,Discord',
            'tutor_id' => 'required|exists:users,id',
        ]);

        Booking::create([
            'tutee_id' => auth()->id(),
            'tutor_id' => $validated['tutor_id'],
            'subject_name' => $validated['subject_name'],
            'subject_topic' => $validated['subject_topic'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'platform' => $validated['platform'],
            'link' => '', // Add logic for generating platform link if needed
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Your booking request has been sent successfully.');
    }


}


