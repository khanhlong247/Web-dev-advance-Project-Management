@extends('layouts.app')

@section('content')
<h1>Reports</h1>
<table class="detail-table">
    <thead>
        <tr>
            <th style="width: 40%;">Title</th>
            <th style="width: 30%;">Project</th>
            <th style="width: 30%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
        <tr>
            <td>{{ $report->title }}</td>
            <td>{{ optional($report->project)->project_name ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('reports.show', $report->id) }}" class="btn">View Report</a>
            </td>
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
.btn {
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
}
.btn:hover {
    background-color: #34495e;
}
</style>
@endpush
