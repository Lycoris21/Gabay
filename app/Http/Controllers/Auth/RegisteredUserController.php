<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('complete-profile.show');
    }


    /**
     * Display the profile completion view.
     */

    public function showProfileCompletion(): View
    {
        return view('auth.complete-profile');
    }

    /**
     * Handle profile completion submission.
     */
    public function completeProfile(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'gender' => ['required', 'in:Male,Female,Other'],
            'year_of_birth' => ['required', 'integer', 'digits:4'],
        ]);

        // Fetch the authenticated user
        $user = Auth::user();

        // Assign the validated values to the user's attributes
        $user->gender = $validatedData['gender'];
        $user->year_of_birth = $validatedData['year_of_birth'];

        // Save the user with the updated attributes
        $user->save();

        // Redirect to dashboard with a success message
        return redirect()->route('dashboard.userProfile')->with('status', 'Profile updated successfully.');
    }
}
