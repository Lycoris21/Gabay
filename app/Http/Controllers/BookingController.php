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
            'link' => '',
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Your booking request has been sent successfully.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'Pending') {
            return redirect()->back()->with('error', 'This request has already been processed.');
        }

        $booking->status = 'Denied';
        $booking->save();

        return redirect()->back()->with('success', 'The request has been denied.');
    }

    public function approve(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'Pending') {
            return redirect()->back()->with('error', 'This request has already been processed.');
        }

        if ($request->has('sessionLink')) {
            $booking->link = $request->input('sessionLink');
        }

        $booking->status = 'Approved';
        $booking->save();

        return redirect()->back()->with('success', 'The request has been approved.');
    }

    public function cancel(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);
    
        $booking = Booking::findOrFail($id);
    
        if ($booking->status !== 'Approved') {
            return redirect()->back()->with('error', 'This request is not approved.');
        }
    
        $booking->status = 'Cancelled';
        $booking->reason = $request->input('reason'); // Save the cancellation reason
        $booking->save();
    
        return redirect()->back()->with('success', 'The request has been cancelled.');
    }
    
    public function delete($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->tutee_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this booking.');
        }

        $booking->delete();

        return redirect()->back()->with('success', 'The request has been deleted.');
    }
}
