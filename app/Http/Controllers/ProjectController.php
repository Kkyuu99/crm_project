<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Show the list of all projects
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('user.project-list', compact('projects'));
    }

    // Show the project list
    public function project_list()
    {
        return view('user.project-list', [
            'projects' => Project::paginate(5)
        ]);
    }

    // Show the form for editing an existing project
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        // If the project is not found, you can handle it (optional)
        if (!$project) {
            return redirect()->route('user.project-list')->with('error', 'Project not found');
        }

        return view('user.project-edit', compact('project'));
    }

    // Show the form for creating a new project
    public function create()
    {
        return view('user.new-project');
    }

    // Store a new project
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'created_by' => 'required|string|max:255',
            'updated_by' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        Project::create($validated);

        return redirect()->route('user.project-list')->with('success', 'Project created successfully!');
    }

    // Show project details
    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('user.project-detail', compact('project'));
    }

    // Update an existing project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $project->update($validated);

        return redirect()->route('user.project-list')->with('success', 'Project updated successfully!');
    }

    // Delete a project
    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('user.project-list')->with('success', 'Project deleted successfully!');
    }
}
