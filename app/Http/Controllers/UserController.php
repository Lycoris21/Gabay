<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;

class UserController extends Controller
{
    public function manageView($id)
    {
        $users = User::all();
        $user = User::with('tutor.subjects')->findOrFail($id);
        session(['showUser' => $user]);

        return view('admin.manageUsers', compact('user', 'users'));
    }

    public function closePopup()
    {
        // Forget the session variable
        session()->forget('showUser');
        
        // Redirect to the dashboard explicitly with GET
        return redirect()->route('admin.manageUsers')->with('success', 'Popup closed successfully.');
    }
}
