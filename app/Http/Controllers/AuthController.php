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
        $formData = $request->validate([
            'email'=>['required', Rule::exists('users', 'email')],
            'password'=>['required', 'min:5']
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($formData, $remember)) {
            request()->session()->regenerate();
            $user = Auth::user();
             return redirect()->intended(Auth::user()->role === 'admin' ? '/admin/dashboard' : '/user/dashboard');
        }
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();      
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'You have been logged out successfully.');
    }

    public function forgot(){
        return view('auth.forgot-password');
    }
}