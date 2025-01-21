<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' => User::latest()->get()
        ]);
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;   
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->project_id = $request->project_id;
        $user->created_by = $request->created_by;
        $user->updated_by = $request->updated_by;
        $user->deleted_by = $request->deleted_by;
        $user->save();


        $validatedData = validator($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'project_id' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
            'deleted_by' => 'required',
        ]);

        return view('users.create');
    }

    public function show($id){
        return view('users.show',
        [
            'user' => User::findOrFail($id)
        ]);
    }

    public function edit(Request $request){
        $user = new User();
        $user->name = $request->name;   
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->project_id = $request->project_id;
        $user->created_by = $request->created_by;
        $user->updated_by = $request->updated_by;
        $user->deleted_by = $request->deleted_by;
        $user->save();


        $validatedData = validator($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'project_id' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
            'deleted_by' => 'required',
        ]);

        return view('users.edit');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully');  
    }
    
}
