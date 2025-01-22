<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Colors and Gradients */
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
            cursor: pointer;
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
        html, body {
            height: 100%;
            margin: 0;
            background: #3b2f2f; /* Full-screen dark brown background */
        }
        footer {
            position: sticky;
            bottom: 0;
        }
        input[type="file"] {
            display: none;
        }
        label[for="profile-picture-input"] {
            cursor: pointer;
            text-decoration: underline;
            color: #F4D03F;
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="bg-dark-brown text-cream flex flex-col">

    <div class="absolute top-4 left-4 fade-in">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="bg-header-gradient text-gold py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <div class="absolute top-4 right-4 fade-in">
        <button onclick="window.location='{{ route('profile.edit') }}'"
            class="bg-header-gradient text-gold py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.209 0 4-1.791 4-4s-1.791-4-4-4-4 1.791-4 4 1.791 4 4 4zm0 2c-3.314 0-6 2.686-6 6h12c0-3.314-2.686-6-6-6z"/>
            </svg>
            <span>Account</span>
        </button>
    </div>

    <header class="bg-header-gradient shadow-lg py-8 text-center fade-in">
        <h1 class="text-gold text-4xl font-bold">Profile Details</h1>
        <p class="text-cream text-lg italic">"See your achievements and profile here."</p>
    </header>

    <main class="flex-grow flex flex-col items-center text-center px-6 py-12 fade-in">
        <div class="relative">
            @if($player->profile_picture)
                <img src="{{ asset('storage/public/profile_pictures/' . $player->profile_picture) }}" alt="Profile Picture" width="300" height="300"class="w-36 h-36 rounded-full profile-picture mb-4">
            @else
                <img src="{{ asset('storage/default-avatar.png') }}" alt="Default Avatar" width="100" height="100" class="w-36 h-36 rounded-full profile-picture mb-4">
            @endif  
        </div>

        <h2 class="text-gold text-3xl font-bold mt-4">{{ $player->username }}</h2>

        <div class="mt-4">
            <button onclick="window.location='{{ route('players.edit', compact('id')) }}'"
                class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M5 2h14c1.1 0 2 .9 2 2v16c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2zm0 2v16h14V4H5zm4 4h6v2H9V8zm0 4h6v2H9v-2z"/>
                </svg>
                <span>Edit Profile</span>
            </button>
        </div>


        <div class="mb-10 w-full max-w-2xl">
            <h2 class="text-gold text-3xl font-bold border-b border-gold pb-2 mt-10">Profile Details</h2>
            <p class="text-cream text-xl mt-4"><strong>Year Level:</strong> {{ $player->year_level }}</p>
            <p class="text-cream text-xl"><strong>Section:</strong> {{ $player->section }}</p>
        </div>

        <div class="w-full max-w-2xl">
            <h2 class="text-gold text-3xl font-bold border-b border-gold pb-2">Scores</h2>
            <ul class="mt-4 space-y-4 text-xl text-left">
                <li><strong>Overall Score:</strong> {{ $player->scores->overall_score }}</li>
                <li><strong>Hangman Score:</strong> {{ $player->scores->hangman_score }}</li>
                <li><strong>Text Twister Score:</strong> {{ $player->scores->text_twister_score }}</li>
                <li><strong>Interactive Novel Score:</strong> {{ $player->scores->interactive_novel_score }}</li>
            </ul>
        </div>
    </main>

    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>


</body>
</html>
