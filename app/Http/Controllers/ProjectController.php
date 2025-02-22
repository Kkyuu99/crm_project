<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //show the list of all project
    public function index(){
        $projects = Project::paginate(5);
        return view('user.project-list', compact('projects'));
    }

    //show project-list with sorting
    public function project_list(){
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('user.project-list',compact('projects'));
    }

    public function edit($id){
    $project = Project::findOrFail($id);

    // If the project is not found, you can handle it (optional)
    if (!$project) {
        return redirect()->route('user.project-list')->with('error', 'Project not found');
    }

    return view('user.project_edit', compact('project'));
    }


    public function project_create(){
        return view('user.new_project');
    }

    public function store(Request $request){
        //validate the incoming request
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'status' => 'required|string',
        ]);

         // Create the new project instance
        //  $project = new Project();
        //  $project->project_name = $request->project_name;
        //  $project->organization_name = $request->organization_name;
        //  $project->project_type = $request->project_type;
        //  $project->project_manager = $request->project_manager;
        //  $project->contact_name = $request->contact_name;
        //  $project->contact_phone = $request->contact_phone;
        //  $project->contact_email = $request->contact_email;
        //  $project->status = $request->status;
         // Assign the logged-in user's ID to created_by
         //$project->created_by = Auth::id();

        // Create and save the new project
        Project::create($validated);

        // Assign the logged-in user's ID to created_by and updated_by if not already set
        //$data['created_by'] = $data['created_by'] ?? Auth::id();
        //$data['updated_by'] = $data['updated_by'] ?? Auth::id();  

         return redirect('/user/project-list')->with('success', 'Project created successfully!');
     }

    // public function admin_project_list(){
    //     $project = Project::all();
    //     return view('admin.project_list');
    // }

    // public function edit(Project $projects){
    //     return view('projects.edit',compact('projects'));
    // }

    public function update(Request $request, $id)
    {
        // Find the project by ID
        $project = Project::findOrFail($id);
        //validate the request data
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'status' => 'required|string', 
            ]);

        // Update the project with the validated data
        $project->update($validated);


    // $project->update([
    //     'project_name' => $request->input('project_name'),
    //     'contact_name' => $request->input('contact_name'),
    //     'contact_email' => $request->input('contact_email'),
    //     'contact_phone' => $request->input('contact_phone'),
    //     'status' => $request->input('status'),
    //     ]);

        return redirect()->route('user.project-list')->with('success', 'Project updated successfully!');
    }

    public function delete(Project $project){
        $project->delete();
        return redirect('/user/project-list');
    }
}
