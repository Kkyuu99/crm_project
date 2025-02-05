<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        //return view('Projects.index', compact('Projects'));
    }

    public function create(){
        return view('Projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'issue_id' =>'required',
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => ['required|string|max:255',Rule::unique('users','email')],
            'created_by' => 'required|string|max:255',
            'updated_by' => 'required',
            'deleted_by' => 'required',
        ]);

        Project::create([
            'id' => $request->input('id'),
            'issue_id' => $request->input('issue_id'),
            'project_name' => $request->input('project_name'),
            'organization_name' => $request->input('organization_name'),
            'project_type' => $request->input('project_type'),
            'project_manager' => $request->input('project_manager'),
            'contact_name' => $request->input('contact_name'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_email' => [$request->input('contact_email'),Rule::unique('users','email')],
            'created_by' => $request->created_by,
            'updated_by' => $request->created_at,
            'deleted_by' => $request->updated_at,
        ]);
    }

    public function list(){
        $project = Project::all();
        //return view('project-list',compact('projects'));
    }

    public function edit(Project $projects){
        return view('projects.edit',compact('projects'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'issue_id' =>'required',
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email'=>['required','email',Rule::unique('users','email')],
            'created_by' => 'required|string|max:255',
            'updated_by' => 'required',
            'deleted_by' => 'required',
        ]);

        $project->update([
            'id' => $request->input('id'),
            'issue_id' => $request->input('issue_id'),
            'project_name' => $request->input('project_name'),
            'organization_name' => $request->input('organization_name'),
            'project_type' => $request->input('project_type'),
            'project_manager' => $request->input('project_manager'),
            'contact_name' => $request->input('contact_name'),
            'contact_phone' => $request->input('assignor_user'),
            'contact_email' => [$request->input('remark'),Rule::unique('users','email')],
            'created_by' => $request->created_by,
            'uptaded_by' => $request->created_at,
            'deleted_by' => $request->updated_at,
        ]);
    }

    public function delete(Project $projects){
        $projects->delete();

    }
}
?>