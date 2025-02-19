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

    public function project_detail(){
        return view('user.project_detail');
    }

    public function project_create(){
        return view('user.new_project');
    }

    public function store(Request $request){
        //validate the incoming request
        $data = $request->validate([
        
        'project_name' => 'required|string|max:255',
        'organization_name' => 'required|max:255',
        'project_type' => 'required|string|max:255',
        'project_manager' => 'required|string|max:255',
        'contact_name' => 'required|string|max:255',
        'contact_phone' => 'required|string|max:255',
        'contact_email' => 'nullable|string|max:255',
        'status' => 'required|string', 
        'created_by' => 'required|integer',
        'updated_by' => 'nullable|exists:users,id',
        'deleted_by' => 'nullable|exists:users,id',
        ]);

         // Create the new project instance
         $project = new Project();
         $project->project_name = $request->project_name;
         $project->organization_name = $request->organization_name;
         $project->project_type = $request->project_type;
         $project->project_manager = $request->project_manager;
         $project->contact_name = $request->contact_name;
         $project->contact_phone = $request->contact_phone;
         $project->contact_email = $request->contact_email;
         $project->status = $request->status;
         // Assign the logged-in user's ID to created_by
         //$project->created_by = Auth::id();

        // Save the new project to the database
        $project->save();

        // Assign the logged-in user's ID to created_by and updated_by if not already set
        //$data['created_by'] = $data['created_by'] ?? Auth::id();
        //$data['updated_by'] = $data['updated_by'] ?? Auth::id();

         //create the new project in db
        $newProject = Project::project_create($data);
    
    //     $project=Project::create($valiade);
    
    //     Project::create([
    //         'id' => $request->input('id'),
    //         'issue_id' => $request->input('issue_id'),
    //         'project_name' => $request->input('project_name'),
    //         'organization_name' => $request->input('organization_name'),
    //         'project_type' => $request->input('project_type'),
    //         'project_manager' => $request->input('project_manager'),
    //         'contact_name' => 'nullable|string|max:255',
    //         'contact_phone' => $request->input('contact_phone'),
    //         'contact_email' => 'nullable|string|max:255' ,
    //         'created_by' => $request->created_at,
    //         'updated_by' => $request->updated_at,
    //         'deleted_by' => $request->deleteed_at,
    //     ]);
        

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
        $data = $request->validate([
        
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'status' => 'required|string', 
            'created_by' => 'required|integer',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_by' => 'nullable|exists:users,id',
            ]);

            $project->update(data);

            return redirect('/user/project-list')->with('success', 'Project created successfully!');
        }

    //     $project->update([
    //         'id' => $request->input('id'),
    //         'issue_id' => $request->input('issue_id'),
    //         'project_name' => $request->input('project_name'),
    //         'organization_name' => $request->input('organization_name'),
    //         'project_type' => $request->input('project_type'),
    //         'project_manager' => $request->input('project_manager'),
    //         'contact_name' => $request->input('contact_name'),
    //         'contact_phone' => $request->input('assignor_user'),
    //         'contact_email' => $request->input('remark'),
    //         'created_by' => $request->created_at,
    //         'updated_by' => $request->created_at,
    //         'deleted_by' => $request->updated_at,
    //     ]);
    // }

    public function delete(Project $project){
        $project->delete();
        return redirect('/user/project-list');
    }

}
