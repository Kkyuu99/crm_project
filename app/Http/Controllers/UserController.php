<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index(){
        return view('user.dashboard');
    }
    public function user_list()
    {
        return view('user.dashboard', [
            'users' => User::paginate(5)
        ]);
    }

    public function create(){
        return view('users.add');
    }

    public function store(){
        $formData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'password'=>['required','min:5'],
            'email'=>['required','email',Rule::unique('users','email')],
            'role'=>['required'],
            'project_id'=>['required'],
        ]);

        $formData['password'] = bcrypt($formData['password']);
        $formData['project_id']=Project::where('project_name', request('project_name'))->id;

        $user = User::create($formData);
        return redirect('/')->with('success', 'User created successfully');
     }                 

    public function show($id){
        return view('users.show',
        [
            'user' => User::findOrFail($id)
        ]);
    }

    public function edit(){
        return view('user.edit');
    }

    public function update(User $user){
        $formData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'password'=>['required','min:5'],
            'email'=>['required','email',Rule::unique('users','email')],
            'role'=>['required']
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user->create($formData);
        return redirect('/')->with('success', 'User updated successfully');
    }

    public function delete(User $user){
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully');  
    }
    
}
