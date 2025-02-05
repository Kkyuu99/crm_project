<?php

namespace App\Http\Controllers;
use App\Models\Issue;
use Illuminate\Http\Request;


class IssueController extends Controller
{
    public function issue_list(){
        return view('user.issue-list', [
            'issues' => Issue::latest()->paginate(5)
        ]);
    }

    public function create(){
        return view('user.new-issue');
    }

    public function store()
    {
        $formData = request()->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required',
            'issue_status' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'assignor_user' => 'required|string|max:255',
            'remark' => 'required'
        ]);

        $formData['project_id'] = request()->input('project_id');

        Issue::create($formData);
        return redirect('/user/issue-list');

    }

    public function edit(){
        return view('user.issue-edit',[
            'issues' => Issue::all()
        ]);
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

        return redirect('/');
    }

    public function delete(Issue $issue){
        $issue->delete();
        return back();
    }
}
?>