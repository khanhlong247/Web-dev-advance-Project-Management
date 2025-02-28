@extends('layouts.app')

@section('content')
<h1>Create New Project</h1>
<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="project_name">Project Name:</label>
        <input type="text" name="project_name" id="project_name" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="budget">Budget:</label>
        <input type="number" name="budget" id="budget" step="0.01">
    </div>

    <div class="form-group">
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline">
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Create Project</button>
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
