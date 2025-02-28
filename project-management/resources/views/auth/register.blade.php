@extends('layouts.auth')

@section('content')
<div class="auth-bg">
    <div class="auth-container">
        
        <h2 class="auth-heading">Create your account</h2>
        
        <div class="auth-form-card">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="role">Role</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-tag"></i>
                        <select name="role" required style="padding-left:35px;">
                            <option value="team_member">Team Member</option>
                            <option value="project_manager">Project Manager</option>
                            <option value="stakeholder">Stakeholder</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    @error('role')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn submit-btn">Register</button>
            </form>
        </div>
        
        <div class="auth-links">
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.auth-bg {
    min-height: 100vh;
    background: #f7f8fa;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
}
.auth-container {
    text-align: center;
    max-width: 400px;
    margin: 20px;
}
.brand-logo {
    max-width: 150px;
    margin-bottom: 10px;
}
.auth-heading {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #333;
}
.auth-form-card {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}
.input-group {
    text-align: left;
    margin-bottom: 15px;
}
.input-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}
.input-wrapper {
    position: relative;
}
.input-wrapper i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}
.input-wrapper input,
.input-wrapper select {
    width: 100%;
    padding: 8px 10px 8px 35px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn.submit-btn {
    background-color: #00b44b;
    color: #fff;
    border: none;
    padding: 10px 20px;
    width: 100%;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    margin-top: 15px;
}
.btn.submit-btn:hover {
    background-color: #019f43;
}
.auth-links {
    margin-bottom: 20px;
}
.auth-links a {
    color: #0072ce;
    text-decoration: none;
    font-size: 0.9rem;
    margin: 0 5px;
}
.auth-links a:hover {
    text-decoration: underline;
}

.error {
    color: red;
    font-size: 0.9rem;
    margin-top: 5px;
}
</style>
@endpush
