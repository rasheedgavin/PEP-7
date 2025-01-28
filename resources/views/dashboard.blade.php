<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEP 7</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <header class="bg-header-gradient shadow-lg py-6 fade-in">
        <div class="container mx-auto px-6 flex flex-col items-center">
            <span class="text-gold text-5xl font-extrabold uppercase tracking-wide">
                PEP SEVEN
            </span>
            <p class="text-cream text-lg italic mt-2">
                Palawakin ang iyong Bokabularyo sa Filipino gamit ang Ibong Adarna sa pamamagitan ng laro
            </p>
            <div class="header-underline"></div>

            <div class="mt-4 flex space-x-4">
                <button onclick="redirectToProfileOrRoute('{{ route('leaderboards.overall', compact('id')) }}')"
                    class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h2v18H3V3zm7 7h2v11h-2V10zm7-4h2v15h-2V6z"/>
                    </svg>
                    <span>Leaderboards</span>
                </button>
                <button onclick="redirectToProfileOrRoute('{{ route('achievements.view', compact('id')) }}')"
                    class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                    <span>Achievements</span>
                </button>
                <button onclick="redirectToProfileOrRoute('{{ route('novel.view') }}')"
                    class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 4v16h12V4H6zm2 2h8v12H8V6zm-2 0V4h12v2H6zm0 12h12v2H6v-2z"/>
                    </svg>
                    <span>Read Ibong Adarna</span>
                </button>
            </div>
        </div>
    </header>

    <div class="absolute top-4 left-4 fade-in">
        @if ($id)
            <button onclick="window.location='{{ route('player.details', compact('id')) }}'"
                class="bg-header-gradient text-gold py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.209 0 4-1.791 4-4s-1.791-4-4-4-4 1.791-4 4 1.791 4 4 4zm0 2c-3.314 0-6 2.686-6 6h12c0-3.314-2.686-6-6-6z"/>
                </svg>
                <span>Profile</span>
            </button>
        @else
            <button onclick="window.location='{{ route('player.create') }}'"
                class="bg-header-gradient text-gold py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.209 0 4-1.791 4-4s-1.791-4-4-4-4 1.791-4 4 1.791 4 4 4zm0 2c-3.314 0-6 2.686-6 6h12c0-3.314-2.686-6-6-6z"/>
                </svg>
                <span>Create Profile</span>
            </button>
        @endif
    </div>
    <main class="container mx-auto px-6 py-12 fade-in">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-light-brown shadow-lg rounded-xl overflow-hidden card relative">
                <img src="https://t3.ftcdn.net/jpg/07/86/12/28/360_F_786122837_P7aBPLCHhpsCb0JxvifmC8oOwRE47S6c.jpg" alt="Hangman Game" class="w-full h-80 object-cover">
                <div class="absolute inset-0 card-overlay flex flex-col justify-end p-6">
                    <h2 class="text-gold text-3xl font-bold">Hangman</h2>
                    <p class="text-sm text-white mb-4">Hulaan ang mga salita at lutasin ang palaisipan!</p>
                    <button onclick="window.location='{{ route('hangman.categories') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full">
                        Play Now
                    </button>
                </div>
            </div>
            <div class="bg-light-brown shadow-lg rounded-xl overflow-hidden card relative">
                <img src="https://images.nightcafe.studio/jobs/jWlhCFfFvz5bKFnyONJz/jWlhCFfFvz5bKFnyONJz--3--n68pg_2x.jpg" alt="Hangman Game" class="w-full h-80 object-cover">
                <div class="absolute inset-0 card-overlay flex flex-col justify-end p-6">
                    <h2 class="text-gold text-3xl font-bold">Text Twister</h2>
                    <p class="text-sm text-white mb-4">Bumuo ng mga salita mula sa letra!</p>
                    <button onclick="window.location='{{ route('text-twister.categories') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full">
                        Play Now
                    </button>
                </div>
            </div>
            <div class="bg-light-brown shadow-lg rounded-xl overflow-hidden card relative">
                <img src="https://t4.ftcdn.net/jpg/07/69/29/09/360_F_769290955_MwDs8zK9PF63AOs0JHggjOYaeOPxuKKW.jpg" alt="Hangman Game" class="w-full h-80 object-cover">
                <div class="absolute inset-0 card-overlay flex flex-col justify-end p-6">
                    <h2 class="text-gold text-3xl font-bold">Interactive Novel</h2>
                    <p class="text-sm text-white mb-4">Sumabak sa isang kapanapanabik na mga kwento at tanong!</p>
                    <button onclick="window.location='{{ route('interactive-novel.categories') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full">
                        Play Now
                    </button>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>

    <script>
        function redirectToProfileOrRoute(route) {
            if (!{{ $id }}) {
                alert("You must create a profile first!");
                window.location.href = '{{ route('player.create') }}';
            } else {
                window.location.href = route;
            }
        }
    </script>
</body>
</html>
