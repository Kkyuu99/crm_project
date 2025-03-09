<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $prefix = Auth::user()->role;
        $query = Project::query();

        $user = Auth::user();

        $projectTypes = Project::distinct()->pluck('project_type')->toArray();
        $statuses = Project::distinct()->pluck('status')->toArray();

        if ($request->has('project_types')) {
            $query->whereIn('project_type', $request->input('project_types'));
        }

        if ($request->has('statuses')) {
            $query->whereIn('status', $request->input('statuses'));
        }

        if ($user->role === 'admin') {
            $projects = $query->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $projects = $query->whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })->orderBy('created_at', 'desc')->paginate(5);
        }

        return view('user.project-list', compact('projects', 'projectTypes','statuses','prefix'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        $project = Project::findOrFail($id);

        if (!$project) {
            return redirect()->route('user.project-list')->with('error', 'Project not found');
        }
        return view('user.project-edit', compact('project','user','prefix'));
    }

    public function create()
    {   
        $user = Auth::user();
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        return view('user.new-project',compact('user','prefix'));
    }

    public function store(Request $request)
    {
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

        $validated['created_by'] = Auth::id();
        $validated['updated_by'] = Auth::id();

        Project::create($validated);

        return redirect()->route($prefix . '.project-list')->with('success', 'Project created successfully!');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $user = Auth::user();
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        return view('user.project-detail', compact('project','user','prefix'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $prefix = Auth::user()->role;

        if (!$project) {
            return redirect()->route('user.project-list')->with('error', 'Project not found');
        }

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

        $validated['updated_by'] = Auth::id();
        $project->update($validated);

        return redirect()->route($prefix . '.project-list')->with('success', 'Project updated successfully!');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->deleted_by = Auth::id();
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}