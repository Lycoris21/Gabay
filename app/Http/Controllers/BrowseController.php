<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function index()
    {
        // Fetch or define the subject tags
        $subjectTags = ['Math', 'Science', 'History']; // Example data

        // Pass the data to the view
        return view('browse', compact('subjectTags'));
    }
}
