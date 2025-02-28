@extends('layouts.app')

@section('content')
<h1>Reset Password</h1>

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="password">New Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">Reset Password</button>
    </div>
</form>
@endsection
