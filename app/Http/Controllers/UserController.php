<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show the user dashboard
    public function index()
    {
        return view('user.dashboard');
    }

    // Show the user list
    public function user_list()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.user-list', ['users' => $users]);
    }

    // Show the user creation form
    public function create()
    {
        $projects = Project::all();
        return view('admin.user-register', compact('projects'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $prefix = Auth::user()->role;

        // Validate the incoming request data
        $formData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:5', 'confirmed'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => ['required'],
            'projects' => ['required', 'array'],
            'projects.*' => ['exists:projects,id'],
        ]);

        $formData['password'] = bcrypt($formData['password']);

        // Create the user
        $user = User::create($formData);

        // Attach the projects to the user
        $user->projects()->attach($formData['projects']);

        return redirect()->route($prefix . '.user-list')->with('success', 'User created successfully');
    }

    // Show user details
    public function show($id)
    {
        $user = User::findOrFail($id);
        $projects = Project::all();
        return view('admin.user-detail', compact('user', 'projects'));
    }

    // Show the form for editing a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $projects = Project::all();
        return view('admin.user-edit', compact('user', 'projects'));
    }

    // Update the user details
    public function update(Request $request, $id)
    {
        $prefix = Auth::user()->role;
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $formData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'password' => ['sometimes', 'nullable', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required'],
            'projects' => ['required', 'array'],
            'projects.*' => ['exists:projects,id'],
        ]);

        if (!empty($formData['password'])) {
            $formData['password'] = bcrypt($formData['password']);
        }

        $user->update($formData);

        // Sync projects (not attach) to avoid duplicates
        $user->projects()->sync($formData['projects']);

        return redirect()->route($prefix . '.user-list')->with('success', 'User updated successfully');
    }

    // Delete the user
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->projects()->detach(); // Detach projects before deletion
        $user->delete();

        return redirect()->route('user.dashboard')->with('success', 'User deleted successfully');
    }
}
