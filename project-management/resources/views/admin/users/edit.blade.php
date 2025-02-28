@extends('layouts.app')

@section('content')
<h1>Edit User</h1>
<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="project_manager" {{ $user->role == 'project_manager' ? 'selected' : '' }}>Project Manager</option>
            <option value="team_member" {{ $user->role == 'team_member' ? 'selected' : '' }}>Team Member</option>
            <option value="stakeholder" {{ $user->role == 'stakeholder' ? 'selected' : '' }}>Stakeholder</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password: (leave blank to keep current)</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    <div class="form-group">
        <button type="submit" class="btn">Update User</button>
    </div>
</form>
@endsection

@push('styles')
<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .form-group input, .form-group select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .btn {
        background-color: #2c3e50;
        color: #ecf0f1;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #34495e;
    }
</style>
@endpush
