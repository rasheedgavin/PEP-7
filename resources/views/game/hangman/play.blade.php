<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hangman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/hangman.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        const imageUrl = "{{ asset('storage/public/photos/hangbird.jpg') }}";
    </script>
</head>
<body> 
    <header class="bg-header-gradient py-4 fade-in">
        <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Hangman</h1>
        <h2 id="category-level" class="text-3xl font-bold mb-4">
            {{ ucfirst($category) }} - Level {{ $level }}
        </h2>
        <p class="text-crem text-lg italic mt -2">Score: <span class="text-gold font-extrabold">{{ $player->scores->hangman_score }}</span></p>

        <div class="mt-4 flex justify-center space-x-4">
            <button onclick="window.location.href='{{ route('hangman.levels', compact('category')) }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                Levels
            </button>
        </div>
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('dashboard') }}'"
                class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
    </header>
    
    <div id="game-container" class="fade-in" 
        data-category="{{ $category }}" 
        data-level="{{ $level }}" 
        data-hangman-score="{{ $player->scores->hangman_score }}" 
        data-player-id="{{ $player->id }}">
        
        <canvas id="game-canvas" class="fade-in"></canvas>
        <div id="description-container" class="text-lg mt-4 fade-in"></div>
        <div id="word-container" class="text-2xl font-bold tracking-widest fade-in"></div>
        <div id="alphabet-container" class="fade-in"></div>
    </div>

    <footer class="bg-footer-gradient py-4 mt-8">
        <p class="text-gold fade-in">&copy; 2025 PEP7.</p>
    </footer>

    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="next-btn" class="btn-gradient">Next Level</button>
    </div>

    <div id="lives" class="hidden">Lives: 10</div>

    <script src="{{ asset('js/hangman.js') }}"></script> 
</body>
</html>
