<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $issues = Project::paginate(5);
        //return view('Project.index', compact('Project'));
    }

    public function project_list(){
        return view('user.project-list',[
            'projects' => Project::paginate(5)
        ]);
    }

    public function create(){
        return view('Project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'created_by' => 'required|string|max:255',
            'updated_by' => 'required',
            'deleted_by' => 'required',
        ]);

        Project::create([
            'id' => $request->input('id'),
            'project_name' => $request->input('project_name'),
            'organization_name' => $request->input('organization_name'),
            'project_type' => $request->input('project_type'),
            'project_manager' => $request->input('project_manager'),
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => $request->input('attachment'),
            'contact_email' => 'nullable|string|max:255' ,
            'created_by' => $request->input('created_by'),
            'updated_by' => $request->created_at,
            'deleted_by' => $request->updated_at,
        ]);

        return redirect('/');
    }

    public function list(){
        $project = Project::all();
        //return view('project.list',compact('projects'));
    }

    public function edit(Project $projects){
        return view('projects.edit',compact('projects'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
            'updated_by' => 'required',
            'deleted_by' => 'required',
        ]);

        $project->update([
            'id' => $request->input('id'),
            'project_name' => $request->input('project_name'),
            'organization_name' => $request->input('organization_name'),
            'project_type' => $request->input('project_type'),
            'project_manager' => $request->input('project_manager'),
            'contact_name' => $request->input('contact_name'),
            'contact_phone' => $request->input('assignor_user'),
            'contact_email' => $request->input('remark'),
            'created_by' => $request->input('created_by'),
            'updated_by' => $request->created_at,
            'deleted_by' => $request->updated_at,
        ]);
    }

    public function delete(Project $project){
        $project->delete();
        return redirect('/user/project-list');
    }
}