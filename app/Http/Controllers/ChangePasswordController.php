<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    
    public function showChangePasswordForm()
    {
        $user = Auth::user();
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        return view('auth.change-password',compact('user','prefix'));
    }

    public function changePassword(Request $request, $id)
    {

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:5',
        ],
        [
            'password.confirmed' => 'The new password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters long.',
        ]
        );

        $user = User::findORFail($id);
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route($prefix. '.change-password-form', $user->id)
                             ->withErrors(['current_password' => 'The current password is incorrect.'])
                             ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route($prefix. '.user-profile', $user->id)
                         ->with('success', 'Password changed successfully!');
    }
}