<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class TutorApplicationController extends Controller
{
    public function submitStep(Request $request)
    {
        if ($request->input('currentPage') == 1) {
            $application = new Application();
            $application->user_id = auth()->id();
        } else {
            $application = session('application');
        }

        if ($request->has('subject')) {
            $application->subject = $request->subject;
        } elseif ($request->has('resume')) {
            if ($request->file('resume')) {
                $path = $request->file('resume')->store('resumes', 'public');
                $application->resume_path = $path;
            }
        } elseif ($request->has('hourly_rate')) {
            $application->hourly_rate = $request->hourly_rate;
        }

        session(['application' => $application]);
        $currentPage = $request->input('currentPage', 1);

        if ($currentPage == 4) {
            $application->save();
        }

        return redirect()->route('pageSection.show', ['pageNumber' => $currentPage + 1]);
    }
}

