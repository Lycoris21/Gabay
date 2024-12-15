<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class BrowseController extends Controller
{
    public function index()
    {
        // Fetch or define the subject tags
        $tutors = Tutor::with('subjects')->get();

        $subjectTags = ['Math', 'Science', 'History']; // Example data

        // Pass the data to the view
        return view('browse', compact('subjectTags', 'tutors'));
    }
}
