@extends('layouts.app')

@section('content')
<h1>Project Overview</h1>
<table class="detail-table">
    <thead>
        <tr>
            <th style="width: 30%;">Project Name</th>
            <th style="width: 25%;">Budget</th>
            <th style="width: 25%;">Deadline</th>
            <th style="width: 20%;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->budget }}</td>
            <td>{{ $project->deadline }}</td>
            <td>{{ $project->status ?? 'Active' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('styles')
<style>
.detail-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
.detail-table th, 
.detail-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: middle;
}
.detail-table th {
    background-color: #f2f2f2;
}
</style>
@endpush
