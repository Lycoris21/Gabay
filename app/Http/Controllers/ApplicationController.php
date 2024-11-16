<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    //I don't know what i'm doing here

    public function saveSubject(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        session(['subject' => $validated['subject']]);

        return view('tutor', [
            'currentPage' => 2,
        ]);;
    }


    /**
     * Upload the resume and create an application if it doesn't already exist.
     */
    public function uploadResume(Request $request)
    {
        $validated = $request->validate([
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        $resume = $request->file('resume');
        $path = $resume->store('resumes', 'public');

        $application = Application::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'resume_path' => $path,
                'status' => 'pending', 
            ]
        );

        return response()->json(['success' => true, 'application' => $application]);
    }

    /**
     * Update the hourly rate for the user's application.
     */
    public function setHourlyRate(Request $request)
    {
        $validated = $request->validate([
            'hourly_rate' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
        ]);

        $application = Application::where('user_id', auth()->id())->first();

        if (!$application) {
            return response()->json(['success' => false, 'message' => 'No application found. Please upload your resume first.'], 400);
        }

        $application->update([
            'hourly_rate' => $validated['hourly_rate'],
            'currency' => $validated['currency'],
        ]);

        return response()->json(['success' => true, 'application' => $application]);
    }

    /**
     * Finalize and store the application by updating the subject and confirming the data.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        $application = Application::where('user_id', auth()->id())->first();

        if (!$application) {
            return redirect()->back()->withErrors(['error' => 'No application found. Please start by uploading your resume.']);
        }

        $application->update([
            'subject' => $validated['subject'],
        ]);

        $application->status = 'pending';
        $application->save();

        return redirect()->route('dashboard')->with('success', 'Application submitted successfully!');
    }
}
