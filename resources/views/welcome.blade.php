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
            background: url('{{ asset('image/bgwelcome.png') }}') no-repeat center/cover;
        }

        main {
            display: flex;
            width: 100%;
            height: 100%;
           
        }

        
        .main-content {
            flex: 65%;
        }

        aside {
            flex: 12%;
            padding: 200px 20px 20px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.8);
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
            background-color: #295bb8 ;
            color: #fff;
            text-align: center;
            font-size: 1.1rem;
            border-radius: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        aside nav a:hover {
            background-color: #5383dd;
        }

     
        .aside-footer {
            margin-top: 30px;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
<main>
    <!-- Main Content -->
    <div class="main-content">
    </div>

    <!-- Aside Section -->
    <aside>
        <div>
            <h2>Access your account or create a new one to get started.</h2>
            <nav>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
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
