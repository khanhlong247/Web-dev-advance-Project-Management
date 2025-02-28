@extends('layouts.app')

@section('content')
<h1>My Tasks</h1>

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
                @if($task->status !== 'completed')
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="btn" onclick="return confirm('Mark this task as completed?')">Complete</button>
                    </form>
                @endif
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
