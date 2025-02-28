@extends('layouts.app')

@section('content')
<h1>Edit Project</h1>
<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="project_name">Project Name:</label>
        <input type="text" name="project_name" id="project_name" 
               value="{{ old('project_name', $project->project_name) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4">{{ old('description', $project->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="budget">Budget:</label>
        <input type="number" name="budget" id="budget" step="0.01" 
               value="{{ old('budget', $project->budget) }}">
    </div>

    <div class="form-group">
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" 
               value="{{ old('deadline', $project->deadline) }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Update Project</button>
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
    .form-group textarea {
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
