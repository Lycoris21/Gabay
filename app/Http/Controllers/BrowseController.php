<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class BrowseController extends Controller
{
    public function index()
    {
        $tutors = Tutor::with(['user', 'subjects'])->get();
        return view('browse', compact('tutors'));
    }


    public function book(Request $request)
    {
        // Handle the booking logic here
        // For example, validate the request and save the booking to the database

        $request->validate([
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Save the booking to the database (example)
        // Booking::create([
        //     'user_id' => auth()->id(),
        //     'subject' => $request->subject,
        //     'date' => $request->date,
        //     'time' => $request->time,
        // ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
