@extends('layouts.app')

@section('content')
<h1>Verify Your Email Address</h1>

@if (session('status') == 'verification-link-sent')
    <div>A new verification link has been sent to your email address.</div>
@endif

<p>Before proceeding, please check your email for a verification link.</p>
<p>If you did not receive the email,</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>
@endsection
