@extends('layouts.app')

@section('content')
<h1>Task Details</h1>
<table class="detail-table">
    <tr>
        <th>Task Name</th>
        <td>{{ $task->task_name }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $task->description }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $task->status }}</td>
    </tr>
    <tr>
        <th>Deadline</th>
        <td>{{ $task->deadline }}</td>
    </tr>
    <tr>
        <th>Assigned To</th>
        <td>{{ optional($task->assignedUser)->name ?? 'N/A' }}</td>
    </tr>
    <tr>
        <th>Project</th>
        <td>{{ optional($task->project)->project_name ?? 'N/A' }}</td>
    </tr>
</table>
<a href="{{ route('tasks.edit', $task->id) }}" class="btn">Edit Task</a>
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
