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

}
