<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('auth.create');
    }
    
    public function store(){
        $formData = request()->validate([
            'name'=>['require','min:3','max:255'],
            'username'=>['require','min:3','max:255',Rule::unique('users','username')],
            'email'=>['require','email',Rule::unique('users','email')],
            'password'=>['require','min:3','max:255'],
        ]);

        $user = User::create($formData);
        auth()->login($user);

        return redirect('/')->with('success','Login successfully');
    }
}
