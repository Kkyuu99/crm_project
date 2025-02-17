<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\User; // Assuming you're using a User model for authentication

class PostController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            // Check if the email exists in the posts table
            $existingUser = Post::where('email', $request->input('email'))->first();

            if ($existingUser) {
                // If email exists, validate the password with Hash::check
                if (Hash::check($request->input('password'), $existingUser->password)) {
                    // Login successful, redirect to the dashboard
                    return redirect()->route('dashboard')->with('message', 'Login Successful');
                } else {
                    // Incorrect password
                    return response()->json(['error' => 'Incorrect password. Please try again.'], 401);
                }
            } else {
                // If the email doesn't exist, register the new user
                Post::create([
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ]);

                return redirect()->route('/user/dashboard')->with('message', 'User registered successfully!');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        }
    }


}
