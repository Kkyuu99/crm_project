<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Issue;

class IssueController extends Controller
{
    public function index(){
        $issues = Issue::all();
        //return view('issues.index', compact('issues'));
    }

    public function create(){
        return view('issues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' =>'required',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|string|max:255',
            'assignor_user' => 'required|string|max:255',
            'remark' => 'nullable',
            'total_duration' => 'required|string|max:255',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        Issue::create([
            'id' => $request->input('id'),
            'project_id' => $request->input('project_id'),
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'status' => $request->input('issue_status'),
            'priority' => $request->input('priority'),
            'attachment' => $request->input('attachment'),
            'assignor' => $request->input('assignor_user'),
            'remark' => $request->input('remark'),
            'total_duration' => $request->input('total_duration'),
            'created' => $request->created_at,
            'updated' => $request->updated_at,
        ]);
    }

    public function list(){
        $issues = Issue::all();
        //return view('issues.list',compact('issues'));
    }

    public function edit(Issue $issues){
        return view('issues.edit',compact('issues'));
    }

    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'project_id' =>'required',
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'attachment' => 'nullable|string|max:255',
            'assignor_user' => 'required|string|max:255',
            'remark' => 'nullable',
            'total_duration' => 'required|string|max:255',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        $issue->update([
            'id' => $request->input('id'),
            'project_id' => $request->input('project_id'),
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'status' => $request->input('issue_status'),
            'priority' => $request->input('priority'),
            'attachment' => $request->input('attachment'),
            'assignor' => $request->input('assignor_user'),
            'remark' => $request->input('remark'),
            'total_duration' => $request->input('total_duration'),
            'created' => $request->created_at,
            'updated' => $request->updated_at,
        ]);
    }

    public function delete(Issue $issues){
        $issues->delete();

    }
}
?>