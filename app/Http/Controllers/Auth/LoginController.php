<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'pfno' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['pfno' => $request->pfno, 'password' => $request->password], $request->remember) && (Auth::user()->role === 'dealing_clerk' or Auth::user()->role === 'approving_officer')) {
            // Authentication passed, redirect to the intended page or default dashboard

            $user = Auth::user();  // Get the authenticated user
            
            return view('dashboard', compact('user'));
        }

        // Authentication failed, redirect back with an error message
        return back()->withErrors([
            'pfno' => 'These credentials do not match our records.',
        ]);
    }

     // Log the user out
     public function logout(Request $request    )
     {
        // Log the user out
        Auth::logout();

        // Invalidate the session to remove all session data
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect the user to the login page
        return redirect()->route('loginform');
     }
}
