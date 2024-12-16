<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Tutor;

class ApplicationController extends Controller
{
    public function view($id)
    {
        $application = Application::with('user')->findOrFail($id);

        // Store the application in the session
        session(['showApplication' => $application]);

        // Redirect back to the previous page (either dashboard or manage tutor applications)
        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        if ($request->input('action') === 'approve') {
            // Handle approval logic

            $application->status = 'approved';

            $user = $application->user; // Assuming the Application model has a `user` relationship
            if (!$user->is_tutor) {
                $user->is_tutor = true;
                $user->save();
            }

            $tutor = Tutor::where('user_id', $user->id)->first();

            if (!$tutor) {
                // If no tutor record exists, create a new one
                $tutor = Tutor::create([
                    'user_id' => $user->id,
                ]);
            } else {
                $tutor->save();
            }
            
            $tutorSubject = $tutor->subjects()->first();

            if ($tutorSubject) {
                if ($tutorSubject->subject !== $application->subject || $tutorSubject->hourly_rate !== $application->hourly_rate) {
                    $tutor->subjects()->create([
                        'subject' => $application->subject,
                        'hourly_rate' => $application->hourly_rate,
                    ]);
                }
            } else {
                $tutor->subjects()->create([
                    'subject' => $application->subject,
                    'hourly_rate' => $application->hourly_rate,
                ]);
            }

            
        } elseif ($request->input('action') === 'deny') {
            // Handle denial logic
            $application->status = 'rejected';
        }

        $application->save();
        session()->forget('showApplication');

        // Redirect back to the dashboard with a success message
        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    public function approve($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        $user = $application->user;
        if (!$user->is_tutor) {
            $user->is_tutor = true;
            $user->save();
        }

        $tutor = Tutor::firstOrCreate(['user_id' => $user->id]);
        $tutor->subjects()->updateOrCreate(
            ['subject' => $application->subject],
            ['hourly_rate' => $application->hourly_rate]
        );

        return redirect()->back()->with('success', 'Application approved successfully.');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'denied';
        $application->save();

        return redirect()->back()->with('success', 'Application rejected successfully.');
    }

    public function closePopup()
    {
        // Forget the session variable
        session()->forget('showApplication');
        
        // Redirect to the dashboard explicitly with GET
        return redirect()->back()->with('success', 'Popup closed successfully.');
    }

    public function manageRejectedApplications()
    {
        $applications = Application::where('status', 'rejected')->get();
        return view('admin.manageRejectedApplications', compact('applications'));
    }
}