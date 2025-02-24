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
    // Show the list of all issues
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userRole = Auth::user()->role;

            // Check the role of the user
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
        return view('user.issue-list', [
            'issues' => $issues,
            'prefix' => $prefix
        ]);
    }

    // Show the issue details page
    public function issue_detail($id)
    {
        $issue = Issue::findOrFail($id);
        return view('user.issue-detail', compact('issue'));
    }

    // Show the new issue create form
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        $projectUsers = [];
        foreach ($projects as $project) {
            $projectUsers[$project->id] = $project->users;
        }
        return view('user.new-issue', compact('projects', 'users', 'projectUsers'));
    }

    // Store new issue
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'issue_status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|file|max:10000|mimes:jpg,png,pdf',
            'assignor_user' => 'required|exists:users,id',
            'remark' => 'nullable',
            'solution' => 'nullable',
            'total_duration' => 'required|string|max:255',
            'due_date' => 'required|date',
        ], [
            'attachment.max' => 'The file size must not exceed 10MB.',
            'attachment.mimes' => 'Only JPG, PNG, and PDF files are allowed.',
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        // Create the new issue in the database
        Issue::create($validated);

        // Redirect with success message
        return redirect('/user/issue-list')->with('success', 'Issue created successfully');
    }

    // Show the issue details
    public function show($id)
    {
        $issue = Issue::findOrFail($id);
        $projects = Project::all();
        return view('user.issue-detail', compact('issue', 'projects'));
    }

    // Show the form for editing an existing issue
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $projects = Project::all();
        return view('user.issue-edit', compact('issue', 'projects'));
    }

    // Update existing issue
    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'issue_status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|file|max:10000|mimes:jpg,png,pdf',
            'assignor_user' => 'required|exists:users,id',
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

        $issue->update($validated);
        return redirect('/user/issue-list')->with('success', 'Issue updated successfully');
    }

    // Delete issue
    public function delete($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->back()->with('success', 'Issue deleted successfully');
    }

    // Delete attachment when editing
    public function removeAttachment($id)
    {
        $issue = Issue::findOrFail($id);
        if ($issue->attachment) {
            Storage::disk('public')->delete($issue->attachment);
            $issue->update(['attachment' => null]);
        }
        return back()->with('success', 'Attachment removed successfully');
    }
}
