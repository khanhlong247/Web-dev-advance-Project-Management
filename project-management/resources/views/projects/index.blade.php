@extends('layouts.app')

@section('content')
<h1>Projects</h1>
<a href="{{ route('projects.create') }}" class="btn">Create New Project</a>

<table class="styled-table">
    <thead>
        <tr>
            <th style="width: 30%;">Name</th>
            <th style="width: 15%;">Budget</th>
            <th style="width: 15%;">Deadline</th>
            <th style="width: 40%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->budget }}</td>
            <td>{{ $project->deadline }}</td>
            <td>
                <a href="{{ route('projects.show', $project->id) }}" class="btn">View</a>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('styles')
<style>
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    .styled-table th, .styled-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        vertical-align: middle;
    }
    .styled-table th {
        background-color: #f2f2f2;
    }
    .btn {
        display: inline-block;
        padding: 6px 10px;
        margin: 3px;
        background-color: #2c3e50;
        color: #ecf0f1;
        text-decoration: none;
        border-radius: 4px;
    }
    .btn:hover {
        background-color: #34495e;
    }
</style>
@endpush
