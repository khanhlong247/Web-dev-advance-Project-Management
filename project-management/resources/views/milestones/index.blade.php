@extends('layouts.app')

@section('content')
<h1>Milestones</h1>
@if(Auth::user()->role != 'team_member')
  <a href="{{ route('milestones.create') }}" class="btn">Create New Milestone</a>
@endif
<table class="styled-table">
    <thead>
        <tr>
            <th style="width: 30%;">Title</th>
            <th style="width: 15%;">Due Date</th>
            <th style="width: 55%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($milestones as $milestone)
        <tr>
            <td>{{ $milestone->title }}</td>
            <td>{{ $milestone->due_date }}</td>
            <td>
                <a href="{{ route('milestones.show', $milestone->id) }}" class="btn">View</a>
                @if(Auth::user()->role != 'team_member')
                    <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn">Edit</a>
                    <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn">Delete</button>
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
.styled-table th, 
.styled-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: middle;
}
.styled-table th {
    background-color: #f2f2f2;
    width: 30%;
}
.btn {
    display: inline-block;
    padding: 10px 15px;
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
