<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://i.pinimg.com/originals/4a/a7/10/4aa710cff03fe03926f140540f40e852.jpg'); /* Replace with your image URL */
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed; 
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
            text-align: center;
            box-sizing: border-box;
            
        }

        nav {
            position: absolute;
            top: 1rem;
            right: 2rem;
        }

        nav a {
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
            margin-left: 1rem;
        }

        nav a:first-child {
            background-color: none;
            border: 2px solid white;
            border-radius: 50px;
            color: white;
        }

        nav a:first-child:hover {
            background-color: #1d4ed8;
            transform: scale(1.05);
        }

        nav a:last-child {
            background-color: none;
            border: 2px solid white;
            border-radius: 50px;
            color: white;
        }

        nav a:last-child:hover {
            background-color: #16a34a;
            transform: scale(1.05);
        }

        aside {
            width:400px; /* Width of the aside */
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-top: 0; 
            color: white;
            height: 100vh;
        }

        h1 {
            font-size: 3vw;
            font-weight: bolder;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family:'Uncial Antiqua', serif;
            margin: 0 50px 20px 50px;
            color: rgb(235, 208, 158);
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        p {
            color: white;   
            margin: 20px 50px;
        }

        /* .content p {
            font-size: 1.25rem;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        } */

    </style>
</head>
<body>
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

    <!-- Center Content -->
    <div class="content">
        {{-- <h1>Welcome</h1>
        <h1>to</h1>
        <h1>PEP7</h1> --}}
        {{-- <p>Access your account or create a new one to get started.</p> --}}
    </div>
</main>
</body>
</html>