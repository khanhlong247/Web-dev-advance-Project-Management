@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    @if(Auth::user()->role == 'admin')
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.users.index') }}" class="btn">Manage Users</a>
        <a href="{{ route('projects.index') }}" class="btn">All Projects</a>
        <a href="{{ route('tasks.index') }}" class="btn">All Tasks</a>
        <a href="{{ route('milestones.index') }}" class="btn">All Milestones</a>
        <a href="{{ route('reports.index') }}" class="btn">All Reports</a>
        <a href="{{ route('risks.index') }}" class="btn">All Risks</a>
    @elseif(Auth::user()->role == 'project_manager')
        <h2>Project Manager Panel</h2>
        <a href="{{ route('projects.index') }}" class="btn">My Projects</a>
        <a href="{{ route('tasks.index') }}" class="btn">Manage Tasks</a>
        <a href="{{ route('milestones.index') }}" class="btn">Manage Milestones</a>
        <a href="{{ route('reports.index') }}" class="btn">Manage Reports</a>
        <a href="{{ route('risks.index') }}" class="btn">Manage Risks</a>
    @elseif(Auth::user()->role == 'team_member')
        <h2>Team Member Panel</h2>
        <a href="{{ route('tasks.my') }}" class="btn">My Tasks</a>
        <a href="{{ route('milestones.index') }}" class="btn">View Milestones</a>
        <a href="{{ route('reports.index') }}" class="btn">View Reports</a>
        <a href="{{ route('risks.index') }}" class="btn">View Risks</a>
    @elseif(Auth::user()->role == 'stakeholder')
        <h2>Stakeholder Panel</h2>
        <a href="{{ route('stakeholder.dashboard') }}" class="btn">Project Overview</a>
        <a href="{{ route('stakeholder.reports') }}" class="btn">View Reports</a>
    @endif

@endsection

<style>
    .btn {
        display: inline-block;
        padding: 10px 15px;
        margin: 5px;
        background-color: #2c3e50;
        color: #ecf0f1;
        text-decoration: none;
        border-radius: 4px;
    }
    .btn:hover {
        background-color: #34495e;
    }
</style>
