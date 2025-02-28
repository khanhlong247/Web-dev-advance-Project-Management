@extends('layouts.app')

@section('content')
<h1>Project Details</h1>
<table class="detail-table">
    <tr>
        <th>Project Name</th>
        <td>{{ $project->project_name }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $project->description }}</td>
    </tr>
    <tr>
        <th>Budget</th>
        <td>{{ $project->budget }}</td>
    </tr>
    <tr>
        <th>Deadline</th>
        <td>{{ $project->deadline }}</td>
    </tr>
</table>
<a href="{{ route('projects.edit', $project->id) }}" class="btn">Edit Project</a>
@endsection

@push('styles')
<style>
.detail-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
.detail-table th, .detail-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: middle;
}
.detail-table th {
    background-color: #f2f2f2;
    width: 30%;
}
.btn {
    display: inline-block;
    padding: 10px 15px;
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
