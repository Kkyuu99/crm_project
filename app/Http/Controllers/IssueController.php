<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    //show the list of all issues
    public function index(){
        $issues = Issue::all();
        return view('user.issue-list');
    }

    public function issue_list(){

        $issues = Issue::orderBy('created_at', 'desc')->paginate(5);
        return view('user.issue-list',[
            'issues' => $issues
        ]);
    }

    public function issue_detail(){
        return view('user.issue-detail');
    }

    //show the new issue create form
    public function create(){
        
        $projects = Project::all();;
        return view('user.new-issue', compact('projects'));
    }

    //store new issue
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' =>'required',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'issue_status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|file|max:10000|mimes: jpg,png,pdf',
            'assignor_user' => 'required|string|max:255',
            'remark' => 'nullable',
            'solution' => 'nullable',
            'total_duration' => 'required|string|max:255',
        ], [
            'attachment.max' => 'The file size must not exceed 10MB.',
            'attachment.mimes' => 'Only JPG, PNG, and PDF files are allowed.',
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $validated['attachment'] = $request->file('attachment')->store('attachments','public');
        } 

        //create the new issue in the database
        $issue = Issue::create($validated);

        //redirect with success message
        return redirect('/user/issue-list')->with('success', 'Issue created successfully');
    }

    public function show($id){
        $issue = Issue::findOrFail($id);
        
        $projects = Project::all();;
        return view('user.issue-detail', compact('issue','projects'));
    }

    //show the form for editing existing issue
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $projects = Project::all();;
        return view('user.issue-edit', compact('issue','projects'));
    }

    //update existing issue
    public function update(Request $request,$id)
    {
        $issue = Issue::findOrFail($id);

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

        //update issue in the database
        $issue->update($validated);
        return redirect('user/issue-list')->with('success', 'Issue updated successfully');
    }

    //delete issue
    public function delete($id)
    {
        $issue = Issue::findOrFail($id);
        if ($issue->attachment) {
            Storage::disk('public')->delete($issue->attachment);
        }
        $issue->delete();
        return redirect()->back()->with('success', 'Issue deleted successfully');
    }
    
    //delete attachment when editing
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