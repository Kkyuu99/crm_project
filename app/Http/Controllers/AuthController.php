<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function get_login(){
        return view('auth.create');
    }

    public function post_login(){
        $formData = request()->validate([
            'email'=>['required', Rule::exists('users', 'email')],
            'password'=>['required', 'min:5']
        ]);

        if (auth()->attempt($formData)){
            if (auth()->user()->role == 'admin'){
                return redirect('/');
            }
            else{
                return back();
            }
        }
    }
}
