<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class TutorApplicationController extends Controller
{
    public function submitStep(Request $request)
    {
        error_log('YOU CANT MISS THIS');

        // Retrieve or create the application for the current authenticated user
        $application = Application::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        // Update the application data based on the submitted fields
        if ($request->has('subject')) {
            $application->subject = $request->subject;
        } elseif ($request->has('resume')) {
            if ($request->file('resume')) {
                $path = $request->file('resume')->store('resumes');
                $application->resume_path = $path;
            }
        } elseif ($request->has('hourly_rate')) {
            $application->hourly_rate = $request->hourly_rate;
        }

        // Save the application data to the database
        $application->save();

        // Store the application in the session
        session(['application' => $application]);
        $currentPage = $request->input('currentPage', 1);
      
        // Redirect to the next page
        return redirect()->route('pageSection.show', ['pageNumber' => $currentPage + 1]);
    }
}
