<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        //
    }
    
    public function userDashboard()
    {   
        $userId = Auth::id();
        $issues = Issue::where('assignor_user', $userId)->latest()->take(5)->get();

        $issuesPerMonth = Issue::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('assignor_user', $userId)
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = range(1, 12);
        $issuesCount = array_fill(0, 12, 0);
        foreach ($issuesPerMonth as $issue) {
            $issuesCount[$issue->month - 1] = $issue->count;
        }


        $urgentIssues = Issue::where('assignor_user', $userId)->where('priority', 'Urgent')->count();
        $mediumIssues = Issue::where('assignor_user', $userId)->where('priority', 'Medium')->count();
        $highIssues = Issue::where('assignor_user', $userId)->where('priority', 'High')->count();
        $lowIssues = Issue::where('assignor_user', $userId)->where('priority', 'Low')->count();  

        $totalIssues = Issue::count();
        

        $dueTodayIssues = Issue::whereDate('due_date', Carbon::today())->count();

        $overdueIssues = Issue::where('due_date', '<', Carbon::today())
                                 ->where('issue_status', '!=', 'Closed')
                                 ->count();

        $closedIssues = Issue::where('issue_status', 'Closed')->count();

        $urgentPercentage = ceil($totalIssues > 0 ? ($urgentIssues / $totalIssues) * 100 : 0);
        $mediumPercentage = ceil($totalIssues > 0 ? ($mediumIssues / $totalIssues) * 100 : 0);
        $highPercentage = ceil($totalIssues > 0 ? ($highIssues / $totalIssues) * 100 : 0);
        $lowPercentage = ceil($totalIssues > 0 ? ($lowIssues / $totalIssues) * 100 : 0);
        
        return view('user.dashboard', compact('totalIssues','dueTodayIssues','overdueIssues','closedIssues',
                                            'urgentPercentage','mediumPercentage','highPercentage','lowPercentage',
                                        'issuesCount','issues'));
    }

    public function adminDashboard()
    { 
        $issues = Issue::latest()->take(5)->get();
        
        $statusCounts = Issue::selectRaw('issue_status, COUNT(*) as count')
        ->groupBy('issue_status')
        ->pluck('count', 'issue_status')
        ->toArray();


        $urgentIssues = Issue::where('priority', 'Urgent')->count();
        $mediumIssues = Issue::where('priority', 'Medium')->count();
        $highIssues = Issue::where('priority', 'High')->count();
        $lowIssues = Issue::where('priority', 'Low')->count();

        $totalIssues = Issue::count();
        $totalProjects = Project::count();
        $totalUsers = User::count();

        $closedIssues = Issue::where('issue_status', 'Closed')->count();


        $urgentPercentage = ceil($totalIssues > 0 ? ($urgentIssues / $totalIssues) * 100 : 0);
        $mediumPercentage = ceil($totalIssues > 0 ? ($mediumIssues / $totalIssues) * 100 : 0);
        $highPercentage = ceil($totalIssues > 0 ? ($highIssues / $totalIssues) * 100 : 0);
        $lowPercentage = ceil($totalIssues > 0 ? ($lowIssues / $totalIssues) * 100 : 0);
        
        return view('admin.dashboard', compact('totalIssues','totalProjects','totalUsers','closedIssues',
                                            'urgentPercentage','mediumPercentage','highPercentage','lowPercentage',
                                        'statusCounts','issues'));
    }

    
        
}
