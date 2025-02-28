<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;
use App\Models\Project;

class RiskController extends Controller
{
    public function index()
    {
        $risks = Risk::with('project')->get();
        return view('risks.index', compact('risks'));
    }
    
    public function create()
    {
        // Kiểm tra quyền: team_member không được phép tạo risk
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to create a risk.');
        }
        
        $projects = Project::all();
        return view('risks.create', compact('projects'));
    }
    
    public function store(Request $request)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to create a risk.');
        }
        
        $validated = $request->validate([
            'risk_name'   => 'required|max:100',
            'description' => 'nullable|string',
            'response_plan' => 'nullable|string',
            'project_id'  => 'required|exists:projects,id',
        ]);
        
        Risk::create($validated);
        return redirect()->route('risks.index')->with('success', 'Risk created successfully.');
    }
    
    public function show(Risk $risk)
    {
        return view('risks.show', compact('risk'));
    }
    
    public function edit(Risk $risk)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to edit a risk.');
        }
        
        $projects = Project::all();
        return view('risks.edit', compact('risk', 'projects'));
    }
    
    public function update(Request $request, Risk $risk)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to update a risk.');
        }
        
        $validated = $request->validate([
            'risk_name'   => 'required|max:100',
            'description' => 'nullable|string',
            'response_plan' => 'nullable|string',
            'project_id'  => 'required|exists:projects,id',
        ]);
        
        $risk->update($validated);
        return redirect()->route('risks.index')->with('success', 'Risk updated successfully.');
    }
    
    public function destroy(Risk $risk)
    {
        if (auth()->user()->role === 'team_member') {
            abort(403, 'You do not have permission to delete a risk.');
        }
        
        $risk->delete();
        return redirect()->route('risks.index')->with('success', 'Risk deleted successfully.');
    }
}
