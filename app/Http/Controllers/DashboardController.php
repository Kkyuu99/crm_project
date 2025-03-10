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
        $user = Auth::user();
        $userId = Auth::id();
        $prefix = Auth::user()->role;

        $projects = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->latest()->take(4)->get();

        $projectCount = Project::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
        
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

        $totalIssues = Issue::where('assignor_user', $userId)->count();
        

        $dueTodayIssues = Issue::whereDate('due_date', Carbon::today())
                            ->where('assignor_user', $userId)
                            ->count();

        $overdueIssues = Issue::where('due_date', '<', Carbon::today())
                                ->where('assignor_user', $userId)
                                 ->where('issue_status', '!=', 'Closed')
                                 ->count();

        $closedIssues = Issue::where('issue_status', 'Closed')
                                ->where('assignor_user', $userId)
                                ->count();

        $urgentPercentage = ceil($totalIssues > 0 ? ($urgentIssues / $totalIssues) * 100 : 0);
        $mediumPercentage = ceil($totalIssues > 0 ? ($mediumIssues / $totalIssues) * 100 : 0);
        $highPercentage = ceil($totalIssues > 0 ? ($highIssues / $totalIssues) * 100 : 0);
        $lowPercentage = ceil($totalIssues > 0 ? ($lowIssues / $totalIssues) * 100 : 0);
        
        return view('user.dashboard', compact('user','prefix','totalIssues','dueTodayIssues','overdueIssues','closedIssues',
                                            'urgentPercentage','mediumPercentage','highPercentage','lowPercentage',
                                        'issuesCount','issues','projects','projectCount'));
    }

    public function adminDashboard()
    { 
        $user = Auth::user();
        $issues = Issue::latest()->take(5)->get();
        $prefix = Auth::user()->role;
        
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
        
        return view('admin.dashboard', compact('user','prefix','totalIssues','totalProjects','totalUsers','closedIssues',
                                            'urgentPercentage','mediumPercentage','highPercentage','lowPercentage',
                                        'statusCounts','issues'));
    }
        
}
