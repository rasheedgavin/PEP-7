<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }

        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
        }

        .bg-footer-gradient {
            background: linear-gradient(to left, #3b2f2f, #1e1e1e);
        }

        .text-gold {
            color: #F4D03F;
        }

        .text-cream {
            color: #F8F1E8;
        }

        .btn-gradient {
            background: linear-gradient(to right, #F4D03F, #8B5E3C);
            box-shadow: 0 0 10px rgba(244, 208, 63, 0.6);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .btn-gradient:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(244, 208, 63, 0.9);
        }

        .input-field {
            background: linear-gradient(to bottom, #3b2f2f, #1e1e1e);
            border: 2px solid #F4D03F;
            color: #F8F1E8;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            width: 100%;
        }

        .input-field:focus {
            border-color: #8B5E3C;
            box-shadow: 0 0 10px rgba(244, 208, 63, 0.6);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-header-gradient py-6 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">PEP SEVEN</h1>
            <p class="text-cream text-lg italic mt-2">Create your account and join the journey!</p>
        </div>
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('home') }}'"
                class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
    </header>

    <main class="container mx-auto flex flex-col items-center justify-center flex-grow px-6 py-12">
        <div class="bg-header-gradient w-full max-w-md p-8 rounded-lg shadow-lg">
            <h2 class="text-gold text-3xl font-extrabold text-center mb-6">Register</h2>
            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6">
                @csrf

                <div>
                    <input type="text" id="name" name="name" placeholder="Full Name" 
                        class="input-field" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="email" id="email" name="email" placeholder="Email Address" 
                        class="input-field" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="password" id="password" name="password" placeholder="Password" 
                        class="input-field" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                        placeholder="Confirm Password" class="input-field" required>
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-gradient text-dark py-3 px-6 rounded-full mt-4">Register</button>
            </form>

            <p class="text-cream text-center mt-6">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-gold underline">Login Here</a>
            </p>
        </div>
    </main>

    <footer class="bg-footer-gradient py-4 mt-8">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and creativity.</p>
        </div>
    </footer>

</body>
</html>

