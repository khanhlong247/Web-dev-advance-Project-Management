<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\Project;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::with('project')->get();
        return view('milestones.index', compact('milestones'));
    }
    
    public function create()
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to create a milestone.');
        }
        
        $projects = Project::all();
        return view('milestones.create', compact('projects'));
    }
    
    public function store(Request $request)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to create a milestone.');
        }
        
        $validated = $request->validate([
            'title'       => 'required|max:100',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'project_id'  => 'required|exists:projects,id',
        ]);
        
        Milestone::create($validated);
        return redirect()->route('milestones.index')->with('success', 'Milestone created successfully.');
    }
    
    public function show(Milestone $milestone)
    {
        return view('milestones.show', compact('milestone'));
    }
    
    public function edit(Milestone $milestone)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to edit a milestone.');
        }
        
        $projects = Project::all();
        return view('milestones.edit', compact('milestone', 'projects'));
    }
    
    public function update(Request $request, Milestone $milestone)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to update a milestone.');
        }
        
        $validated = $request->validate([
            'title'       => 'required|max:100',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'project_id'  => 'required|exists:projects,id',
        ]);
        
        $milestone->update($validated);
        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully.');
    }
    
    public function destroy(Milestone $milestone)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to delete a milestone.');
        }
        
        $milestone->delete();
        return redirect()->route('milestones.index')->with('success', 'Milestone deleted successfully.');
    }
}
