<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        return view('admin.user-list');
    }
    public function user_list()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.user-list',[
            'users' => $users
        ]);
    }

    public function create(){
        
        $projects = Project::all();;
        return view('admin.user-register', compact('projects'));
    }

    public function store(){
        
        $prefix = Auth::user()->role;
        $formData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'password'=>['required','min:5','confirmed'],
            'email'=>['required','email',Rule::unique('users','email')],
            'role'=>['required'],
            'projects'=>['required','array'],
            'projects.*' => ['exists:projects,id'],
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create([
            'name' => $formData['name'],
            'email' => $formData['email'],
            'password' => $formData['password'],
            'role' => $formData['role'],
        ]);
        $user->projects()->attach($formData['projects']);
        return redirect()->route($prefix . '.user-list')->with('success', 'User created successfully');
     }                 

     public function show($id){
        $user = User::findOrFail($id);
        $projects = Project::all();
        return view('admin.user-detail', compact('projects','user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $projects = Project::all();
        return view('admin.user-edit',compact('projects','user'));
    }

    public function update(User $user,$id){
        
        $prefix = Auth::user()->role;
        $user = User::findOrFail($id);
        $formData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'password'=>['sometimes','nullable','min:5'],
            'email'=>['required','email',Rule::unique('users','email')->ignore($user->id)],
            'role'=>['required'],
            'projects'=>['required','array'],
            'projects.*' => ['exists:projects,id'],
        ]);

        $user->update([
            'name' => $formData['name'],
            'email' => $formData['email'],
            'role' => $formData['role'],
        ]);
        
        if (!empty($formData['password'])) {
            $user->update(['password' => bcrypt($formData['password'])]);
        }
        
        // Sync projects (not attach) to avoid duplicates
        $user->projects()->sync($formData['projects']);
        
        return redirect()->route($prefix . '.user-list')->with('success', 'User updated successfully');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->projects()->detach();
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    
}
