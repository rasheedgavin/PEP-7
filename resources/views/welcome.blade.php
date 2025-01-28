<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh; 
            color: #fff;
            justify-content: center;
            align-items: center;
            background: rgb(47,19,9);
            background: linear-gradient(90deg, rgba(47,19,9,1) 26%, rgba(58,28,9,1) 54%, rgba(98,41,6,1) 85%, rgba(255,0,74,0.8127626050420168) 100%);
        }

        main {
            display: flex;
            width: 100%;
            height: 100%;
            max-width: none; 
        }

        .main-content {
            flex: 65%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .main-content h1 {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 3.5rem;
            line-height: 1.6;
            margin-left: 20px;
            animation: typing 1s steps(100) 0.1s 1 normal both;
            overflow: hidden;
            width: 0; 
            white-space: wrap;
        }

        @keyframes typing {
            0% {
                width: 0;
                height: 0;
            }
            100% {
                width: 100%;
                height: 30%;
            }
        }

        aside {
            flex: 35%;
            background-color: rgba(0, 0, 0, 0.92);
            padding: 150px 20px 20px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        aside h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        aside p {
            font-size: 1rem;
            margin-bottom: 20px;
            text-align: center;
        }

        aside nav a {
            display: block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #3b2f2f ;
            color: #fff;
            text-align: center;
            font-size: 1.1rem;
            border-radius: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        aside nav a:hover {
            background-color: #5c4033;
        }

        .aside-footer {
            margin-top: 30px;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body class="bg-body-gradient text-cream">
<main>
    <div class="main-content">
        <h1>PEP-7</h1>
        <p>Get ready to sharpen your mind and enjoy every word!</p>
    </div>

    <aside>
        <div>
            <h2>Access your account or create a new one to get started.</h2>
            <nav>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Start</a>
                    @else
                        <a href="{{ route('login') }}">Log In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
        <div class="aside-footer">
            <p>PEP-7</p>
        </div>
    </aside>
</main>
</body>
</html>
