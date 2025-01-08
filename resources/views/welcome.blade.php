<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2563eb; 
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        nav {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

        nav a {
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        nav a:first-child {
            background-color: #1e40af; /* Dark blue */
            color: white;
            margin-right: 0.5rem;
        }

        nav a:first-child:hover {
            background-color: #1d4ed8; /* Slightly lighter blue on hover */
            transform: scale(1.05);
        }

        nav a:last-child {
            background-color: #22c55e; /* Green for register */
            color: white;
        }

        nav a:last-child:hover {
            background-color: #16a34a; /* Slightly darker green on hover */
            transform: scale(1.05);
        }

        .content {
            text-align: center;
            margin-top: 5rem;
        }

        .content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .content p {
            font-size: 1.125rem;
            font-weight: 400;
        }    
    </style>
</head>
<body>
    <!-- Navigation -->
    @if (Route::has('login'))
        <nav>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log In</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </nav>
    @endif

    <!-- Center Content -->
    <div class="content">
        <h1>Welcome to PEP7</h1>
        <p>Access your account or create a new one to get started.</p>
    </div>
</body>
</html>
