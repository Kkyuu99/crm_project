<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' => User::latest()->paginate(5)
        ]);
    }

    public function create(Request $request){

    }

    public function show($id){
        return view('users.show',
        [
            'user' => User::findOrFail($id)
        ]);
    }

    public function edit(Request $request){
        
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully');  
    }
    
}
