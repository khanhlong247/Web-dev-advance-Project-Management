@extends('layouts.app')

@section('content')
<h1>Create New Risk</h1>
<form action="{{ route('risks.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="risk_name">Risk Name:</label>
        <input type="text" name="risk_name" id="risk_name" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="response_plan">Response Plan:</label>
        <textarea name="response_plan" id="response_plan" rows="4"></textarea>
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
        <button type="submit" class="btn">Create Risk</button>
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
