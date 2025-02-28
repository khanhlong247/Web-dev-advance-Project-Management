<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Milestone;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(5)->get();
        $tasks = Task::latest()->take(5)->get();
        $milestones = Milestone::latest()->take(5)->get();
        return view('dashboard.index', compact('projects', 'tasks', 'milestones'));
    }
}
