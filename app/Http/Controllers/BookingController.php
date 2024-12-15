<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {  
        Booking::create([
            'tutee_id' => Auth::id(),
            'tutor_id' => $request->input('tutor_id'),
            'subject_name' => $request->input('subject_name'),
            'subject_topic' => $request->input('subject_topic'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'platform' => $request->input('platform'),
            'link' => '', // Add logic for generating platform link if needed
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Your booking request has been sent successfully.');
    }
}
