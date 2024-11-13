<?php

namespace App\Http\Controllers\TutorCreation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function create(): View
    {
        return view('auth.login');
    }
}
