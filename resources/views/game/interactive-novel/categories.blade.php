<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Novel Levels</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <header class="bg-header-gradient shadow-lg py-6 fade-in">
        <div class="container mx-auto px-6 flex flex-col items-center">
            <h1 class="text-gold text-4xl font-extrabold uppercase tracking-wide">
                Interactive Novel Categories
            </h1>
            <p class="text-cream text-lg italic mt-2">Pumili ng kategorya upang magsimula sa laro</p>
        </div>
    </header>

    <div class="absolute top-4 left-4 fade-in">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <main class="container mx-auto px-6 py-12 fade-in">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
            <div onclick="handleCategory('easy')" class="bg-header-gradient shadow-lg rounded-xl p-6 text-center transform transition hover:scale-105 cursor-pointer">
                <h2 class="text-gold text-2xl font-bold mb-2">Easy</h2>
                <p class="text-cream text-sm">Mga simpleng kwento at tanong para sa mga nagsisimula pa lang!</p>
            </div>
            <div onclick="handleCategory('medium')" class="bg-header-gradient shadow-lg rounded-xl p-6 text-center transform transition hover:scale-105 cursor-pointer">
                <h2 class="text-gold text-2xl font-bold mb-2">Medium</h2>
                <p class="text-cream text-sm">Mas masalimuot na mga kwento at pahulaan upang hamunin ang iyong isipan!</p>
            </div>
            <div onclick="handleCategory('hard')" class="bg-header-gradient shadow-lg rounded-xl p-6 text-center transform transition hover:scale-105 cursor-pointer">
                <h2 class="text-gold text-2xl font-bold mb-2">Hard</h2>
                <p class="text-cream text-sm">Para sa mga tunay na eksperto sa mga kwento at tanong!</p>
            </div>
        </div>
    </main>

    <footer class="bg-footer-gradient py-4 fade-in">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP7.</p>
        </div>
    </footer>

    <script>
        function handleCategory(category) {
            window.location.href = `/interactive-novel/${category}`;
        }
    </script>
</body>
</html>
