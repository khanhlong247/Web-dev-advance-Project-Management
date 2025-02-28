<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'My Project') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <header>
        <div class="top-nav">
            <div class="brand-area">
                <a href="{{ route('home') }}" class="brand-link">
                    Project Management
                </a>
            </div>
            <div class="user-area">
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @else
                    <span>Welcome, {{ e(Auth::user()->name) }} ({{ e(Auth::user()->role) }})</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </header>

    @auth
    <aside class="sidebar">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if(Auth::user()->role == 'admin')
                <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
                <li><a href="{{ route('projects.index') }}">All Projects</a></li>
                <li><a href="{{ route('tasks.index') }}">All Tasks</a></li>
                <li><a href="{{ route('milestones.index') }}">All Milestones</a></li>
                <li><a href="{{ route('reports.index') }}">All Reports</a></li>
                <li><a href="{{ route('risks.index') }}">All Risks</a></li>
            @elseif(Auth::user()->role == 'project_manager')
                <li><a href="{{ route('projects.index') }}">My Projects</a></li>
                <li><a href="{{ route('tasks.index') }}">Manage Tasks</a></li>
                <li><a href="{{ route('milestones.index') }}">Manage Milestones</a></li>
                <li><a href="{{ route('reports.index') }}">Manage Reports</a></li>
                <li><a href="{{ route('risks.index') }}">Manage Risks</a></li>
            @elseif(Auth::user()->role == 'team_member')
                <li><a href="{{ route('tasks.my') }}">My Tasks</a></li>
                <li><a href="{{ route('milestones.index') }}">View Milestones</a></li>
                <li><a href="{{ route('reports.index') }}">View Reports</a></li>
                <li><a href="{{ route('risks.index') }}">View Risks</a></li>
            @elseif(Auth::user()->role == 'stakeholder')
                <li><a href="{{ route('stakeholder.dashboard') }}">Overview</a></li>
                <li><a href="{{ route('stakeholder.reports') }}">Reports</a></li>
            @endif
        </ul>
    </aside>
    @endauth

    <main class="content-area">
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Project. All rights reserved.</p>
    </footer>

</body>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}
.top-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #2c3e50;
    padding: 10px 20px;
}
.brand-area {
    color: #ecf0f1;
}
.brand-link {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: bold;
}
.user-area a {
    color: #ecf0f1;
    margin-right: 15px;
    text-decoration: none;
}
.user-area span {
    color: #ecf0f1;
}
.btn-logout {
    background: none;
    color: #ecf0f1;
    border: none;
    cursor: pointer;
    margin-left: 5px;
    font-size: 1rem;
}
.sidebar {
    width: 220px;
    background-color: #34495e;
    min-height: calc(100vh - 50px);
    padding: 20px;
    float: left;
    box-sizing: border-box;
}
.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sidebar li {
    margin-bottom: 10px;
}
.sidebar a {
    color: #ecf0f1;
    text-decoration: none;
}
.content-area {
    margin-left: 220px;
    padding: 20px;
    box-sizing: border-box;
    min-height: calc(100vh - 70px);
    background-color: #fff;
}
footer {
    clear: both;
    background-color: #ecf0f1;
    color: #2c3e50;
    text-align: center;
    padding: 10px;
}
</style>
</html>
