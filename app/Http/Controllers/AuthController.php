<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function get_login(){
        return view('auth.login-user');
    }

    public function post_login(){
        $formData = request()->validate([
            'email'=>['required', Rule::exists('users', 'email')],
            'password'=>['required', 'min:5']
        ]);

        if (auth()->attempt($formData)){
            return redirect('/user/dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/user/login');
    }
}
