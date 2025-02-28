@extends('layouts.app')

@section('content')
<h1>Edit Report</h1>
<form action="{{ route('reports.update', $report->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" 
               value="{{ old('title', $report->title) }}" required>
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4">{{ old('content', $report->content) }}</textarea>
    </div>

    <div class="form-group">
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" 
                    {{ old('project_id', $report->project_id) == $project->id ? 'selected' : '' }}>
                    {{ $project->project_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Update Report</button>
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
