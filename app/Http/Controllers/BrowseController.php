<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class BrowseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $sort = $request->get('sort');

        // Get the subject tags
        $subjectTags = ['Math', 'Science', 'History'];

        $tutors = Tutor::with('subjects')
        ->when($search, function ($query, $search) {
            return $query->whereHas('subjects', function ($q) use ($search) {
                $q->where('subject', 'like', "%{$search}%");
            });
        })
            ->when($sort, function ($query, $sort) {
                if ($sort == 'A-Z') {
                    return $query->join('users', 'tutors.user_id', '=', 'users.id')
                    ->orderBy('users.last_name', 'asc')
                    ->orderBy('users.first_name', 'asc');
                } elseif ($sort == 'Z-A') {
                    return $query->join('users', 'tutors.user_id', '=', 'users.id')
                    ->orderBy('users.last_name', 'desc')
                    ->orderBy('users.first_name', 'desc');
                } elseif ($sort == 'hourly_rate') {
                    return $query->join('tutor_subjects', 'tutors.id', '=', 'tutor_subjects.tutor_id')
                    ->orderBy('tutor_subjects.hourly_rate', 'asc');
                }
            })->get();

        return view('browse', compact('subjectTags', 'tutors'));
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
