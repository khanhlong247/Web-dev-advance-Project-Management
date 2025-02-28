<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project', 'assignedUser')->get();
        return view('tasks.index', compact('tasks'));
    }
    
    public function create()
    {
        $projects = Project::all();
        $users = \App\Models\User::all();
        return view('tasks.create', compact('projects', 'users'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name'   => 'required|max:100',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed',
            'deadline'    => 'nullable|date',
            'assigned_to' => 'required|exists:users,id',
            'project_id'  => 'required|exists:projects,id'
        ]);
        
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
    
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    
    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = \App\Models\User::all();
        return view('tasks.edit', compact('task', 'projects', 'users'));
    }
    
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name'   => 'required|max:100',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed',
            'deadline'    => 'nullable|date',
            'assigned_to' => 'required|exists:users,id',
            'project_id'  => 'required|exists:projects,id'
        ]);
        
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
    
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
    
    public function myTasks()
    {
        $tasks = Task::where('assigned_to', Auth::id())->get();
        return view('tasks.my-tasks', compact('tasks'));
    }
    
    public function updateStatus(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }
}
