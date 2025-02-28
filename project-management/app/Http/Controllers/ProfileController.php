<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    
    public function create()
    {
        return view('projects.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|unique:projects,project_name|max:100',
            'description'  => 'nullable|string',
            'budget'       => 'nullable|numeric',
            'deadline'     => 'nullable|date'
        ]);
        
        $validated['created_by'] = Auth::id();
        Project::create($validated);
        
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
    
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_name' => 'required|max:100|unique:projects,project_name,'.$project->id,
            'description'  => 'nullable|string',
            'budget'       => 'nullable|numeric',
            'deadline'     => 'nullable|date'
        ]);
        
        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
    
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
