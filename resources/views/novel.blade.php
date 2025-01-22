<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Page Novel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <header class="bg-header-gradient shadow-lg py-6">
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('dashboard') }}'"
                class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
        
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-gold text-5xl font-bold uppercase tracking-wide fade-in">
                Ibong Adarna
            </h1>
            <p class="text-cream text-lg italic mt-2 fade-in">
                Lakbayin ang panahon, isang kabanata sa bawat paglalakbay
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 fade-in relative">

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in active" id="chapter1">
            <h2 class="text-gold text-3xl font-bold flex">Chapter 1: The Discovery</h2>
            <p class="text-cream mt-4">Elias found the journal in his grandfather’s workshop. A clock that could turn back time? It seemed impossible.</p>
        </div>

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in" id="chapter2">
            <h2 class="text-gold text-3xl font-bold">Chapter 2: The Blueprint</h2>
            <p class="text-cream mt-4">The diagrams were precise, every cog and spring documented. He wondered if he could rebuild it.</p>
        </div>

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in" id="chapter3">
            <h2 class="text-gold text-3xl font-bold">Chapter 3: The Assembly</h2>
            <p class="text-cream mt-4">Late nights, aching fingers, and a heart full of hope—it was finally ready to test.</p>
        </div>

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in" id="chapter4">
            <h2 class="text-gold text-3xl font-bold">Chapter 4: The Test</h2>
            <p class="text-cream mt-4">Elias turned the key, and the room blurred. Moments later, he stood in the past, facing his younger self.</p>
        </div>

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in" id="chapter5">
            <h2 class="text-gold text-3xl font-bold">Chapter 5: The Cost</h2>
            <p class="text-cream mt-4">Time had not forgotten its rules. He returned, only to find the journal gone and his past unchanged.</p>
        </div>

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in" id="chapter6">
            <h2 class="text-gold text-3xl font-bold">Chapter 6: The Truth</h2>
            <p class="text-cream mt-4">Elias understood now: time cannot be rewritten, only lived. He locked the clock away forever.</p>
        </div>

        <div class="chapter bg-light-brown p-8 rounded-xl shadow-lg fade-in" id="chapter7">
            <h2 class="text-gold text-3xl font-bold">Chapter 6: The Truth</h2>
            <p class="text-cream mt-4">Elias understood now: time cannot be rewritten, only lived. He locked the clock away forever.</p>
        </div>

    </main>

    <div class="buttons-container">
        <button id="prev" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg btn-position btn-left" >
        Previous
        </button>
        <button id="next" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg btn-position btn-right">
        Next
        </button>
    </div>

    <footer class="bg-header-gradient py-6">
        <div class="container mx-auto text-center">
        <p class="text-gold">&copy; 2025 Ibong Adarna.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"> </script>
</body>
</html>
