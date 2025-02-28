@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>
<h2>Users</h2>
<ul>
    @foreach($users as $user)
        <li>{{ $user->name }} - Role: {{ $user->role }}</li>
    @endforeach
</ul>
<h2>Projects</h2>
<ul>
    @foreach($projects as $project)
        <li>{{ $project->project_name }}</li>
    @endforeach
</ul>
@endsection
