<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Project;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('project')->get();
        return view('reports.index', compact('reports'));
    }
    
    public function create()
    {
        $projects = Project::all();
        return view('reports.create', compact('projects'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|max:100',
            'content'    => 'nullable|string',
            'project_id' => 'required|exists:projects,id'
        ]);
        
        Report::create($validated);
        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }
    
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }
    
    public function edit(Report $report)
    {
        $projects = Project::all();
        return view('reports.edit', compact('report', 'projects'));
    }
    
    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'title'      => 'required|max:100',
            'content'    => 'nullable|string',
            'project_id' => 'required|exists:projects,id'
        ]);
        
        $report->update($validated);
        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }
    
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}
