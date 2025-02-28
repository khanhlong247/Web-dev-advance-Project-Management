@extends('layouts.app')

@section('content')
<h1>Risk Details</h1>
<table class="detail-table">
    <tr>
        <th>Risk Name</th>
        <td>{{ $risk->risk_name }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $risk->description }}</td>
    </tr>
    <tr>
        <th>Response Plan</th>
        <td>{{ $risk->response_plan }}</td>
    </tr>
    <tr>
        <th>Project</th>
        <td>{{ optional($risk->project)->project_name ?? 'N/A' }}</td>
    </tr>
</table>
<a href="{{ route('risks.edit', $risk->id) }}" class="btn">Edit Risk</a>
@endsection

@push('styles')
<style>
.detail-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
.detail-table th, .detail-table td {
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
}
.btn:hover {
    background-color: #34495e;
}
</style>
@endpush
