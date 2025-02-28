@extends('layouts.app')

@section('content')
<h1>Create New Report</h1>
<form action="{{ route('reports.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Create Report</button>
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
