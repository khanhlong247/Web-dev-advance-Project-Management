@extends('layouts.app')

@section('content')
<h1>Report Details</h1>
<table class="detail-table">
    <tr>
        <th>Title</th>
        <td>{{ $report->title }}</td>
    </tr>
    <tr>
        <th>Content</th>
        <td>{{ $report->content }}</td>
    </tr>
    <tr>
        <th>Project</th>
        <td>{{ optional($report->project)->project_name ?? 'N/A' }}</td>
    </tr>
</table>

@if(Auth::user()->role != 'stakeholder')
    <a href="{{ route('reports.edit', $report->id) }}" class="btn">Edit Report</a>
@endif
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
    width: 30%;
}
.btn {
    display: inline-block;
    padding: 10px 15px;
    background-color: #2c3e50;
    color: #ecf0f1;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 10px;
}
.btn:hover {
    background-color: #34495e;
}
</style>
@endpush
