@extends('layouts.app')

@section('content')
<h1>Edit Milestone</h1>
<form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" 
               value="{{ old('title', $milestone->title) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4">{{ old('description', $milestone->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" 
               value="{{ old('due_date', $milestone->due_date) }}">
    </div>

    <div class="form-group">
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" 
                    {{ old('project_id', $milestone->project_id) == $project->id ? 'selected' : '' }}>
                    {{ $project->project_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Update Milestone</button>
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
