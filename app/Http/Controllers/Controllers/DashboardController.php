<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\views\dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        // You can add functionality here for general dashboard if needed
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function userDashboard()
    {
        // Get the count of issues by priority
        $urgentIssues = Issue::where('priority', 'Urgent')->count();
        $mediumIssues = Issue::where('priority', 'Medium')->count();
        $highIssues = Issue::where('priority', 'High')->count();
        $lowIssues = Issue::where('priority', 'Low')->count();

        $totalIssues = Issue::count();

        // Count issues that are due today
        $dueTodayIssues = Issue::whereDate('due_date', Carbon::today())->count();

        // Count overdue issues (past due date and not closed)
        $overdueIssues = Issue::where('due_date', '<', Carbon::today())
                                 ->where('issue_status', '!=', 'Closed')
                                 ->count();

        // Count closed issues
        $closedIssues = Issue::where('issue_status', 'Closed')->count();

        // Calculate the percentage for each priority
        $urgentPercentage = $totalIssues > 0 ? ($urgentIssues / $totalIssues) * 100 : 0;
        $mediumPercentage = $totalIssues > 0 ? ($mediumIssues / $totalIssues) * 100 : 0;
        $highPercentage = $totalIssues > 0 ? ($highIssues / $totalIssues) * 100 : 0;
        $lowPercentage = $totalIssues > 0 ? ($lowIssues / $totalIssues) * 100 : 0;

        // Return the view with the data
        return view('user.dashboard', compact(
            'totalIssues',
            'dueTodayIssues',
            'overdueIssues',
            'closedIssues',
            'urgentPercentage',
            'mediumPercentage',
            'highPercentage',
            'lowPercentage'
        ));
    }
}
