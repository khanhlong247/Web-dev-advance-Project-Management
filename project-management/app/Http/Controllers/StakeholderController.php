<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Report;

class StakeholderController extends Controller
{
    public function dashboard()
    {
        $projects = Project::all();
        return view('stakeholders.dashboard', compact('projects'));
    }
    
    public function reports()
    {
        $reports = Report::with('project')->get();
        return view('stakeholders.reports', compact('reports'));
    }
}
