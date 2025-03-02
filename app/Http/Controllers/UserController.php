<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show User List
    public function user_list()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.user-list', ['users' => $users]);
    }

    // Show User Registration Form
    public function create()
    {
        $projects = Project::all();
        return view('admin.user-register', compact('projects'));
    }

    // Store New User
    public function store(Request $request)
    {
        $prefix = Auth::user()->role;

        $formData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:5', 'confirmed'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => ['required'],
            'projects' => ['required', 'array'],
            'projects.*' => ['exists:projects,id'],
        ]);

        // Hash the password
        $formData['password'] = Hash::make($formData['password']);

        // Create User and Attach Projects
        $user = User::create($formData);
        $user->projects()->attach($formData['projects']);

        return redirect()->route($prefix . '.user-list')->with('success', 'User created successfully');
    }

    // Show User Details
    public function show($id)
    {
        $user = User::findOrFail($id);
        $projects = Project::all();
        return view('admin.user-detail', compact('projects', 'user'));
    }

    // Show User Edit Form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $projects = Project::all();
        return view('admin.user-edit', compact('projects', 'user'));
    }

    // Update User Data
    public function update(Request $request, $id)
    {
        $prefix = Auth::user()->role;
        $user = User::findOrFail($id);

        $formData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'password' => ['sometimes', 'nullable', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required'],
            'projects' => ['required', 'array'],
            'projects.*' => ['exists:projects,id'],
        ]);

        // Update User Data
        $user->update([
            'name' => $formData['name'],
            'email' => $formData['email'],
            'role' => $formData['role'],
        ]);

        // Update Password if Provided
        if (!empty($formData['password'])) {
            $user->update(['password' => Hash::make($formData['password'])]);
        }

        // Sync Projects (Avoid Duplicates)
        $user->projects()->sync($formData['projects']);

        return redirect()->route($prefix . '.user-list')->with('success', 'User updated successfully');
    }

    // Delete User
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->projects()->detach();
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
