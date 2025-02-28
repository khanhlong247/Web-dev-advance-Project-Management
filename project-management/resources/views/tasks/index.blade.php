@extends('layouts.app')

@section('content')
<h1>Tasks</h1>
<a href="{{ route('tasks.create') }}" class="btn">Create New Task</a>

<table class="styled-table">
    <thead>
        <tr>
            <th style="width: 30%;">Task Name</th>
            <th style="width: 15%;">Status</th>
            <th style="width: 15%;">Deadline</th>
            <th style="width: 40%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->deadline }}</td>
            <td>
                <a href="{{ route('tasks.show', $task->id) }}" class="btn">View</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
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
