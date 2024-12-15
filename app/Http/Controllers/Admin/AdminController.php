<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
       // Count users who are students (is_tutor = 0)
       $totalStudents = User::where('is_tutor', 0)->count();

       // Count users who are tutors (exists in the tutors table)
       $totalTutors = User::where('is_tutor', 1)->count();

        // Fetch the number of pending applications
        $pendingApplications = Application::where('status', 'Pending')->limit(3)->get(); // Only fetch the first 5

       // Pass the data to the view
       return view('admin.dashboard', compact('totalStudents', 'totalTutors', 'pendingApplications'));
    }

    public function manageTutorApplications()
    {
        // Fetch all applications or add any necessary filtering
       $applications = Application::all(); 

        // Logic for managing users
        return view('admin.manageTutorApplications', compact('applications'));
    }

    public function manageUsers()
    {
        // Fetch all applications or add any necessary filtering
       $users = User::all(); 

        // Logic for managing users
        return view('admin.manageUsers', compact('users'));
    }

    public function analytics()
    {
        /*// Get the search query, filter, and sort parameters from the request
        $searchQuery = $request->input('searchQuery', '');
        $filter = $request->input('filter', 'students');
        $sortOrder = $request->input('sortOrder', 'Newest');

        // Query the users with the requested filters and search criteria
        $users = User::query()
            // Search by User ID or Name
            ->when($searchQuery, function ($query, $searchQuery) {
                $query->where('id', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('first_name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchQuery}%");
            })
            // Filter by Role (Students or Tutors)
            ->when($filter, function ($query, $filter) {
                if ($filter === 'students') {
                    $query->where('is_tutor', 0);
                } elseif ($filter === 'tutors') {
                    $query->where('is_tutor', 1);
                }
            })
            // Sort by Newest or Oldest
            ->when($sortOrder, function ($query, $sortOrder) {
                if ($sortOrder === 'Newest') {
                    $query->orderBy('created_at', 'desc');
                } else {
                    $query->orderBy('created_at', 'asc');
                }
            })
            // Pagination (optional, adjust per page if needed)
            ->paginate(5);

        // Pass the data to the view
        return view('admin.analytics', compact('users'));*/
    }

    public function settings()
    {
        // Logic for managing users
        return view('admin.settings');
    }
}