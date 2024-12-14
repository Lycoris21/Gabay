<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function deny(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'Denied';
        $application->save();
    
        return redirect()->route('applications.index')->with('success', 'Application denied successfully.');
    }
    
    public function approve(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'Approved';
        $application->save();

        // Change the user's role to 'tutor'
        $user = $application->user;
        $user->role = 'tutor';
        $user->save();

        return redirect()->route('applications.index')->with('success', 'Application approved and user role updated to tutor successfully.');
    }
}
