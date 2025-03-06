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
    
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $formData = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __('Password reset link sent to your email.'))
            : back()->with('error', __('Something went wrong. Please try again.'));
    }
}