<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create(){
        return view('auth.create');
    }

    public function store(){
        $formData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'password'=>['required','min:5'],
            'email'=>['required','email',Rule::unique('users','email')],
            'role'=>['required'],
            'project_id'=>['required'],
            'created_by'=>['required'],
            'updated_by'=>['required'],
            'deleted_by'=>['required']
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);
        return redirect('/')->with('success', 'User created successfully');

     }                 

    // public function show($id){
    //     return view('users.show',
    //     [
    //         'user' => User::findOrFail($id)
    //     ]);
    // }

    public function edit(Request $request){
        $formData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'password'=>['required','min:5'],
            'email'=>['required','email',Rule::unique('users','email')],
            'role'=>['required'],
            'project_id'=>['required'],
            'created_by'=>['required'],
            'updated_by'=>['required'],
            'deleted_by'=>['required']
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);
        return redirect('/')->with('success', 'User updated successfully');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully');  
    }
    
}
