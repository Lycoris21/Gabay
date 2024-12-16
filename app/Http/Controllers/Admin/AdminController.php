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

    public function manageTutorApplications(Request $request)
    {
        // Get the search query and sort parameters from the request
        $searchQuery = $request->input('searchQuery', '');
        $sortOrder = $request->input('sortOrder', 'Newest');

        // Query the applications and join with the users table
        $applications = Application::query()
            ->join('users', 'applications.user_id', '=', 'users.id')  // Join with users table
            ->select('applications.*', 'users.first_name', 'users.last_name')  // Select necessary columns
            ->where('applications.status', 'Pending')  // Show only pending applications by default
            // Search by User ID or Name
            ->when($searchQuery, function ($query, $searchQuery) {
                $query->where('applications.id', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('users.first_name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('users.last_name', 'LIKE', "%{$searchQuery}%");
            })
            // Sort by Newest or Oldest
            ->when($sortOrder, function ($query, $sortOrder) {
                if ($sortOrder === 'Newest') {
                    $query->orderBy('applications.created_at', 'desc');
                } elseif ($sortOrder === 'Oldest') {
                    $query->orderBy('applications.created_at', 'asc');
                }
            })
            // Get the results
            ->get();

        // Return the view with the applications data
        return view('admin.manageTutorApplications', compact('applications'));
    }

    public function manageUsers(Request $request)
    {
        $searchQuery = $request->input('searchQuery', '');
        $sortOrder = $request->input('sortOrder', 'Newest');
        $roleFilter = $request->input('roleFilter', '');

        $users = User::query()
            // Search by User ID or Name
            ->when($searchQuery, function ($query, $searchQuery) {
                $query->where('id', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('first_name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchQuery}%");
            })
            // Filter by Tutor, Student, or All based on roleFilter
            ->when($roleFilter, function ($query, $roleFilter) {
                if ($roleFilter == 'Student') {
                    $query->where('is_tutor', 0);
                } elseif ($roleFilter == 'Tutor') {
                    $query->where('is_tutor', 1);
                }
            })
            // Sort by Newest or Oldest
            ->when($sortOrder, function ($query, $sortOrder) {
                if ($sortOrder === 'Newest') {
                    $query->orderBy('created_at', 'desc');
                } elseif ($sortOrder === 'Oldest') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            // Get the results
            ->get();

        return view('admin.manageUsers', compact('users', 'searchQuery'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'year_of_birth' => 'required|integer',
            'gender' => 'required|string',
            'description' => 'nullable|string|max:500',
        ]);

        $user->update($validatedData);

        // Handle tutor-specific fields if user is a tutor
        if ($user->is_tutor) {
            $user->tutor->update($request->only(['subjects', 'hourly_rate', 'resume']));
        }

        return redirect()->back()->with('success', 'User information updated successfully.');
    }
}