<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //show the list of all project
    public function index(){
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('user.project-list',compact('projects'));
    }

    public function edit($id){
    $project = Project::findOrFail($id);

    // If the project is not found, you can handle it (optional)
    if (!$project) {
        return redirect()->route('user.project-list')->with('error', 'Project not found');
    }

    return view('user.project-edit', compact('project'));
    }


    public function create(){
        return view('user.new-project');
    }

    public function store(Request $request){

        $prefix = Auth::user()->role;
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

         
        Project::create($validated);

        // Assign the logged-in user's ID to created_by and updated_by if not already set
        //$data['created_by'] = $data['created_by'] ?? Auth::id();
        //$data['updated_by'] = $data['updated_by'] ?? Auth::id();  

         return redirect()->route($prefix . '.project-list')->with('success', 'Project created successfully!');
     }

     public function show($id)
     {
         // Find the project by ID
         $project = Project::findOrFail($id);
     
         // Return the view with the project data
         return view('user.project-detail', compact('project'));
     }
     

    public function update(Request $request, $id){
    
    $project = Project::find($id);
    $prefix = Auth::user()->role;

    if (!$project) {
        return redirect()->route('user.project-list')->with('error', 'Project not found');
    }

    // Validate the request data
    $validated = $request->validate([
        'project_name' => 'required|string|max:255',
        'organization_name' => 'required|max:255',
        'project_type' => 'required|string|max:255',
        'project_manager' => 'required|string|max:255',
        'contact_name' => 'required|string|max:255',
        'contact_phone' => 'nullable|string|max:255',
        'contact_email' => 'required|string|max:255',
        'status' => 'required|string', 
    ]);

    // Update the project with the validated data
    $project->update($validated);

    return redirect()->route($prefix . '.project-list')->with('success', 'Project updated successfully!');
    }

    public function delete(Project $project){
        $project->delete();
        return redirect('/user/project-list');
    }
}