@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>

<h2>Recent Projects</h2>
<ul>
    @foreach($projects as $project)
        <li><a href="{{ route('projects.show', $project->id) }}">{{ $project->project_name }}</a></li>
    @endforeach
</ul>

<h2>Recent Tasks</h2>
<ul>
    @foreach($tasks as $task)
        <li><a href="{{ route('tasks.show', $task->id) }}">{{ $task->task_name }}</a> - {{ $task->status }}</li>
    @endforeach
</ul>

<h2>Recent Milestones</h2>
<ul>
    @foreach($milestones as $milestone)
        <li>{{ $milestone->title }} - Due: {{ $milestone->due_date }}</li>
    @endforeach
</ul>
@endsection
