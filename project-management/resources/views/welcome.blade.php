<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Project Management</title>
    <style>
        .hero {
            background: url('https://via.placeholder.com/1920x600') no-repeat center center;
            background-size: cover;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-shadow: 1px 1px 2px #000;
            shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .hero h1 {
            font-size: 3rem;
            color: black;
        }
        .cta {
            text-align: center;
            margin-top: 20px;
        }
        .cta a {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            background-color: #2c3e50;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #34495e;
        }

    </style>
</head>
<body>
    <div class="hero">
        <h1>Welcome to Project Management</h1>
    </div>
    <div class="cta">
        @if (Route::has('login'))
            @auth
                <a href="{{ route('dashboard') }}">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>
</body>
</html>
