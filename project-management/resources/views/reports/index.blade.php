@extends('layouts.app')

@section('content')
<h1>Reports</h1>
<a href="{{ route('reports.create') }}" class="btn">Create New Report</a>

<table class="styled-table">
    <thead>
        <tr>
            <th style="width: 30%;">Title</th>
            <th style="width: 15%;">Project</th>
            <th style="width: 55%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
        <tr>
            <td>{{ $report->title }}</td>
            <td>{{ $report->project->project_name }}</td>
            <td>
                <a href="{{ route('reports.show', $report->id) }}" class="btn">View</a>
                <a href="{{ route('reports.edit', $report->id) }}" class="btn">Edit</a>
                <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;">
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
