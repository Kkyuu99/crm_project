<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $prefix = $user->role;
        if (Auth::check() && (Auth::id() === $user->id || Auth::user()->role === 'admin')) {
            return view('admin.profile', compact('user','prefix'));
        }
        return redirect()->route('login')->with('error', 'You are not authorized to view this profile.');
    }

    public function edit()
    {
        $user = Auth::user();
        $prefix = $user->role;
        return view('admin.profile-edit', compact('user','prefix'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $prefix = $user->role;
        $validated = $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_pic' => 'nullable|file|max:10240|mimes:jpg,png,jpeg',
         ]);

        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $validated['profile_pic'] = $request->file('profile_pic')->store('profile_pictures', 'public');
        }
        if ($request->has('remove_profile_pic')) {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $user->profile_pic = null;
        }
        
        $user->update($validated);

        return redirect()->route($prefix .'.user-profile', $user->id)->with('success', 'Profile updated successfully!');
    }

    public function removeProfilePic($id)
    {
        $user = User::findOrFail($id);
        if ($user && $user->profile_pic) {
            Storage::disk('public')->delete($user->profile_pic);
            $user->profile_pic = null;
            $user->save();
            return redirect()->back()->with('success', 'Profile picture removed successfully.');
        }
        return redirect()->back()->with('error', 'No picture found to remove.');
    }
    
}
