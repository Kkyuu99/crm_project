<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userRole = Auth::user()->role;
            
            if ($userRole === 'admin') {
                $issues = Issue::orderBy('created_at', 'desc')->paginate(5);
            } else {
                $issues = Issue::where('assignor_user', $userId)
                               ->orderBy('created_at', 'desc')
                               ->paginate(5);
            }
        } else {
        $issues = collect();
        }
        $prefix = Auth::user()->role === 'admin' ? 'admin' : 'user';
        return view('user.issue-list',[
            'issues' => $issues,
            'prefix' => $prefix
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $projects = Project::all();
        } else {
            $projects = $user->projects;
        }
        $users = User::all();
        $projectUsers = [];
        foreach ($projects as $project) {
            $projectUsers[$project->id] = $project->users;
    
        }
        return view('user.new-issue', compact('projects','users','projectUsers'));
    }

    public function store(Request $request)
    {
        $prefix = Auth::user()->role;
        $validated = $request->validate([
            'project_id' =>'required|exists:projects,id',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'issue_status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|file|max:10000|mimes: jpg,png,pdf',
            'assignor_user' => 'required||exists:users,id',
            'remark' => 'nullable',
            'solution' => 'nullable',
            'total_duration' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $validated['attachment'] = $request->file('attachment')->store('attachments','public');
        } 
        $issue = Issue::create($validated);
        return redirect()->route($prefix . '.issue-list')->with('success', 'Issue created successfully');
    }

    public function show($id)
    {
        $issue = Issue::findOrFail($id);
        $user = Auth::user();
        if ($user->role === 'admin') {
            $projects = Project::all();
        } else {
            $projects = $user->projects;
        }
        $users = User::all();
        $projectUsers = [];
        foreach ($projects as $project) {
            $projectUsers[$project->id] = $project->users;
    
        }
        return view('user.issue-detail', compact('issue','projects','users','projectUsers'));
    }

    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $user = Auth::user();
        if ($user->role === 'admin') {
            $projects = Project::all();
        } else {
            $projects = $user->projects;
        }
        $users = User::all();
        $projectUsers = [];
        foreach ($projects as $project) {
            $projectUsers[$project->id] = $project->users;
    
        }
        return view('user.issue-edit', compact('issue','projects','users','projectUsers'));
    }

    public function update(Request $request,$id)
    {
        $issue = Issue::findOrFail($id);
        $prefix = Auth::user()->role;
        $validated = $request->validate([
            'project_id' =>'required',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'issue_status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|file|max:10240|mimes:jpg,png,pdf',
            'assignor_user' => 'required|string|max:255',
            'remark' => 'nullable',
            'solution' => 'nullable',
            'total_duration' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);
        if ($request->hasFile('attachment')) {
            if ($issue->attachment) {
                Storage::disk('public')->delete($issue->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }
        if ($request->has('remove_attachment')) {
            if ($issue->attachment) {
                Storage::disk('public')->delete($issue->attachment);
            }
            $issue->update(['attachment' => null]);
        }
        $issue->update($validated);
        return redirect()->route($prefix . '.issue-list')->with('success', 'Issue updated successfully');
    }

    public function delete($id)
    {
        $issue = Issue::findOrFail($id);
        if ($issue->attachment) {
            Storage::disk('public')->delete($issue->attachment);
        }
        $issue->delete();
        return redirect()->back()->with('success', 'Issue deleted successfully');
    }
    
    public function removeAttachment($id)
    {
        $issue = Issue::findOrFail($id);
        if ($issue && $issue->attachment) {
            Storage::disk('public')->delete($issue->attachment);
            $issue->attachment = null;
            $issue->save();
            return redirect()->back()->with('success', 'Attachment removed successfully.');
        }
        return redirect()->back()->with('error', 'No attachment found to remove.');
    }

}
?>
