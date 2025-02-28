@extends('layouts.app')

@section('content')
<h1>Manage Users</h1>
<a href="{{ route('admin.users.create') }}" class="btn">Create New User</a>
<table class="styled-table">
    <thead>
        <tr>
            <th style="width: 25%;">Name</th>
            <th style="width: 25%;">Email</th>
            <th style="width: 15%;">Role</th>
            <th style="width: 35%;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn">Edit</a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn">Delete</button>
                </form>
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
