<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;

class UserController extends Controller
{
    public function manageView($id)
    {
        // Retrieve the user with their related information (assuming a 'user' relationship)
        $user = User::findOrFail($id);

         // Get tutor details if the user is a tutor
        if ($user->is_tutor) {
            $tutor = Tutor::where('user_id', $user->id)->first();
        } else {
            $tutor = null;
        }


        // Store the user in the session
        session(['showUser' => $user]);

        // Redirect back to the dashboard
        return view('admin.manageUsers', compact('user', 'tutor'));
    }

    public function closePopup()
    {
        // Forget the session variable
        session()->forget('showUser');
        
        // Redirect to the dashboard explicitly with GET
        return redirect()->route('admin.manageUsers')->with('success', 'Popup closed successfully.');
    }
}
