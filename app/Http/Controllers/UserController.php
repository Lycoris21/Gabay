<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;

class UserController extends Controller
{
    public function manageView($id)
    {
        $user = User::with('tutor.subjects')->findOrFail($id);
        session(['showUser' => $user]);

        return redirect()->route('admin.manageUsers');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if ($user->is_tutor) {
            $tutor = Tutor::where('user_id', $id)->first();
            if ($tutor) {
                $tutor->delete();
            }
        }

        $user->delete();
        session()->forget('showUser');

        return redirect()->route('admin.manageUsers')->with('success', 'User deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'required|in:male,female,other',
            'year_of_birth' => 'required|integer|min:1900|max:' . date('Y'),
            'subjects' => 'nullable|array',
            'hourly_rate' => 'nullable|numeric|min:0',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'year_of_birth' => $validated['year_of_birth'],
        ]);

        if ($user->is_tutor) {
            $tutor = Tutor::firstOrCreate(['user_id' => $user->id]);

            if (isset($validated['subjects'])) {
                $tutor->subjects()->sync($validated['subjects']);
            }

            if (isset($validated['hourly_rate'])) {
                $tutor->update(['hourly_rate' => $validated['hourly_rate']]);
            }
        }

        return redirect()->route('admin.manageUsers')->with('success', 'User updated successfully.');
    }


    public function closePopup()
    {
        // Forget the session variable
        session()->forget('showUser');
        
        // Redirect to the dashboard explicitly with GET
        return redirect()->route('admin.manageUsers')->with('success', 'Popup closed successfully.');
    }
}
