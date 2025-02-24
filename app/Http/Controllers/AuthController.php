<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function get_login(){
        return view('auth.login-user');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function post_login(Request $request)
    {
        // Validate the form data
        $formData = $request->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required', 'min:5']
        ]);

        // Attempt to log in the user
        if (Auth::attempt($formData)) {
            // Regenerate the session
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect based on user role (admin or user)
            return redirect()->intended(Auth::user()->role === 'admin' ? '/admin/dashboard' : '/user/dashboard');
        }

        // If login fails, return back with error message
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page with a success message
        return redirect('/user/login')->with('message', 'You have been logged out successfully.');
    }

    public function forgot()
    {
        return view('auth.forgot-password');
    }
}
