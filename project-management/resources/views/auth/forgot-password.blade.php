@extends('layouts.app')

@section('content')
<h1>Forgot Password</h1>

@if(session('status'))
    <div>{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Email Password Reset Link</button>
    </div>
</form>
@endsection
