@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" id="task_name" 
               value="{{ old('task_name', $task->task_name) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4">{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div class="form-group">
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" 
               value="{{ old('deadline', $task->deadline) }}">
    </div>

    <div class="form-group">
        <label for="assigned_to">Assign To:</label>
        <select name="assigned_to" id="assigned_to">
            @foreach($users as $user)
                <option value="{{ $user->id }}" 
                    {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" 
                    {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                    {{ $project->project_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Update Task</button>
    </div>
</form>
@endsection

@push('styles')
<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .form-group input, 
    .form-group textarea, 
    .form-group select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .btn {
        background-color: #2c3e50;
        color: #ecf0f1;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #34495e;
    }
</style>
@endpush
