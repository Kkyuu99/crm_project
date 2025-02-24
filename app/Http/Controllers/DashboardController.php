<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        //
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); 
        }

    public function userDashboard()
    { 
        
        $urgentIssues = Issue::where('priority', 'Urgent')->count();
        $mediumIssues = Issue::where('priority', 'Medium')->count();
        $highIssues = Issue::where('priority', 'High')->count();
        $lowIssues = Issue::where('priority', 'Low')->count();

        $totalIssues = Issue::count();

        $dueTodayIssues = Issue::whereDate('due_date', Carbon::today())->count();

        // Overdue issues (past due date and not closed)
        $overdueIssues = Issue::where('due_date', '<', Carbon::today())
                                 ->where('issue_status', '!=', 'Closed')
                                 ->count();

        //Closed issues
        $closedIssues = Issue::where('issue_status', 'Closed')->count();


        $urgentPercentage = $totalIssues > 0 ? ($urgentIssues / $totalIssues) * 100 : 0;
        $mediumPercentage = $totalIssues > 0 ? ($mediumIssues / $totalIssues) * 100 : 0;
        $highPercentage = $totalIssues > 0 ? ($highIssues / $totalIssues) * 100 : 0;
        $lowPercentage = $totalIssues > 0 ? ($lowIssues / $totalIssues) * 100 : 0;
        
        return view('user.dashboard', compact('totalIssues','dueTodayIssues','overdueIssues','closedIssues',
                                            'urgentPercentage','mediumPercentage','highPercentage','lowPercentage'));
    }

        //$issues = Issue::whereIn('project_id', $projects->pluck('id'))->get();
        
}
