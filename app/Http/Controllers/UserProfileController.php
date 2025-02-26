<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        if (Auth::check() && (Auth::id() === $user->id || Auth::user()->role === 'admin')) {
            return view('admin.profile', compact('user'));
        }

        // Optionally, redirect or return a forbidden response
        return redirect()->route('dashboard')->with('error', 'You are not authorized to view this profile.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile-edit', compact('user'));
    }

    // public function update(Request $request, $id)
    // {
    //     // Validate the incoming request data
    //     $valiated = request()->validate( [
    //         'firstName' => 'required|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username,' . $id,
    //         'email' => 'required|email|max:255|unique:users,email,' . $id,
    //         'phone' => 'nullable|string|max:15',
    //     ]);
    //     if ($valiated->fails()) {
    //         return redirect()->back()->withErrors($valiated)->withInput();
    //     }

    //     // Find the user by ID
    //     $user = User::findOrFail($id);

    //     // Update user data
    //     $user->first_name = $request->input('firstName');
    //     $user->last_name = $request->input('lastName');
    //     $user->username = $request->input('username');
    //     $user->email = $request->input('email');
    //     $user->phone = $request->input('phone');

    //     // Save the changes
    //     $user->save();

    //     // Redirect to a specific route with a success message
    //     return redirect()->route('user.profile.show', $id)->with('success', 'Profile updated successfully!');
    // }

}
