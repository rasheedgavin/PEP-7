<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .text-gold {
            color: #F4D03F;
        }
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }
        .bg-footer-gradient {
            background: linear-gradient(to left, #3b2f2f, #1e1e1e);
        }
        .bg-dark-brown {
            background: #3b2f2f;
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
        body {
            font-family: 'Cinzel', serif;
        }
        .profile-picture {
            border: 4px solid #F4D03F;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="flex flex-col bg-dark-brown text-cream">

    <header class="py-8 text-center shadow-lg bg-header-gradient fade-in relative">
        <h1 class="text-4xl font-bold text-gold">Player Profile</h1>
        <div class="absolute top-4 right-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-header-gradient text-gold py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                    <span>Log Out</span>
                </button>
            </form>
        </div>
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('dashboard') }}'"
                class="flex items-center px-4 py-2 space-x-2 transition rounded-full shadow-lg btn-gradient text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col items-center text-center">
            <div class="relative">
                @if($player->profile_picture)
                    <img src="{{ asset('storage/public/profile_pictures/' . $player->profile_picture) }}" alt="Profile Picture" class="rounded-full w-36 h-36 profile-picture mb-4">
                @else
                    <img src="{{ asset('storage/public/photos/default-avatar.jpg') }}" alt="Default Avatar" class="rounded-full w-36 h-36 profile-picture mb-4">
                @endif
            </div>

            <h2 class="text-3xl font-bold text-gold mt-4">{{ $player->users->username }}</h2>

            <button class="mt-6 btn-gradient text-dark px-6 py-2 rounded-full">
                <a href="{{ route('player.edit', compact('id')) }}">Edit Profile</a>
            </button>
        </div>

        <div class="mt-12 w-full max-w-2xl mx-auto text-left">
            <h2 class="text-3xl font-bold text-gold border-b border-gold pb-2">Profile Details</h2>
            <div class="mt-6">
                <p class="text-lg"><strong class="text-gold">Name:</strong> {{ $player->users->name }}</p>
                <p class="text-lg"><strong class="text-gold">Userame:</strong> {{ $player->username }}</p>
                <p class="text-lg"><strong class="text-gold">Email:</strong> {{ $player->users->email }}</p>
                <p class="text-lg"><strong class="text-gold">Year Level:</strong> {{ $player->year_level }}</p>
                <p class="text-lg"><strong class="text-gold">Section:</strong> {{ $player->section }}</p>
            </div>
        </div>
    </main>

    <footer class="py-6 bg-footer-gradient">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>

</body>
</html>
