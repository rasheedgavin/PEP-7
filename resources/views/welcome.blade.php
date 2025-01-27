<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>
    <style>
    </style>
</head>
<body class="bg-body-gradient text-cream">
<main>
    <aside>
        <div>
           <h1>Welcome to PEP7</h1>
        </div>
        <p>Get ready to sharpen your mind and enjoy every word!</p>
        <p>Access your account or create a new one to get started.</p>
    </aside>

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

</main>
</body>
</html>
