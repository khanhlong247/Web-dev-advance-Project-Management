@extends('layouts.app')

@section('content')
<h1>Risks</h1>
@if(Auth::user()->role != 'team_member')
  <a href="{{ route('risks.create') }}" class="btn">Create New Risk</a>
@endif
<table class="styled-table">
    <thead>
        <tr>
            <th style="width: 30%;">Risk Name</th>
            <th style="width: 15%;">Project</th>
            <th style="width: 55%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($risks as $risk)
        <tr>
            <td>{{ $risk->risk_name }}</td>
            <td>{{ optional($risk->project)->project_name ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('risks.show', $risk->id) }}" class="btn">View</a>
                @if(Auth::user()->role != 'team_member')
                    <a href="{{ route('risks.edit', $risk->id) }}" class="btn">Edit</a>
                    <form action="{{ route('risks.destroy', $risk->id) }}" method="POST" style="display:inline;">
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
