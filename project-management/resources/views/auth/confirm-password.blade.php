@extends('layouts.app')

@section('content')
<h1>Confirm Password</h1>

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Confirm</button>
    </div>
</form>
@endsection
