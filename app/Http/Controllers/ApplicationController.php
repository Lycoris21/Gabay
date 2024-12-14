<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function deny($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        // Delete the application
        $application->delete();

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Application denied and deleted.');
    }

    public function destroy(Application $application)
    {
        // Perform the deletion
        $application->delete();

        // Redirect to the applications page with a success message
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
