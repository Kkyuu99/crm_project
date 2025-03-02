<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    // Display Forgot Password Form (default method name in Laravel)
    public function get_login()
{
    return view('auth.forgot-password');
}

public function showLinkRequestForm()
{
    return view('auth.forgot-password');
}


    // Handle Forgot Password Form Submission
    public function post_forgotpassword(Request $request)
    {
        // Validate Email
        $formData = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
        ]);

        // Send Password Reset Link
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // Optional: Show Change Password Form (if you have it)
    public function forgot()
    {
        return view('auth.change-password');
    }
}
