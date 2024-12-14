<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function view($id)
    {
        $application = Application::with('user')->findOrFail($id);

        // Store the application in the session
        session(['showApplication' => $application]);

        // Redirect back to the dashboard
        return redirect()->route('admin.dashboard');
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
            
        } elseif ($request->input('action') === 'deny') {
            // Handle denial logic
            $application->status = 'denied';
        }

        $application->save();
        session()->forget('showApplication');

        // Redirect back to the dashboard with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Application status updated successfully.');
    }

    public function closePopup()
    {
        // Forget the session variable
        session()->forget('showApplication');
        
        // Redirect to the dashboard explicitly with GET
        return redirect()->route('admin.dashboard')->with('success', 'Popup closed successfully.');
    }

}
