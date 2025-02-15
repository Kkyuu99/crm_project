<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
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

        $issues = Issue::paginate(5);
        return view('user.issue-list',[
            'issues' => $issues
        ]);
    }

    public function issue_detail(){
        return view('user.issue-detail');
    }

    //show the new issue create form
    public function create(){
        return view('user.new-issue');
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
        return view('issue.show', compact('issue'));
    }

    //show the form for editing existing issue
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        return view(('user.issue-edit'), compact('issue'));
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
    // public function removeAttachment($id)
    // {
    //     $issue = Issue::findOrFail($id);
    //     if ($issue->attachment) {
    //         Storage::disk('public')->delete($issue->attachment);
    //         $issue->attachment = null;
    //         $issue->save();
    //     }
    //     return redirect()->route('issue-edit', $id)->with('success', 'Attachment removed successfully.');
    // }

    

}
?>