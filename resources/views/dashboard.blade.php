<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEP 7</title>
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
        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
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
        /* Old-School Font */
        body {
            font-family: 'Cinzel', serif;
        }
        .header-underline {
            border-bottom: 3px solid #F4D03F;
            width: 12rem;
            margin: 0.5rem auto;
        }
        /* Fade-in Animations */
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
        /* Hover Animation for Cards */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .card-overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3));
        }
    </style>
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
                <button onclick="window.location='{{ route('leaderboards.overall') }}'"
                    class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2 glow-effect">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h2v18H3V3zm7 7h2v11h-2V10zm7-4h2v15h-2V6z"/>
                    </svg>
                    <span>Leaderboards</span>
                </button>
                <button class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2 glow-effect">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                    <span>Achievements</span>
                </button>
                <button class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg flex items-center space-x-2 glow-effect">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 4v16h12V4H6zm2 2h8v12H8V6zm-2 0V4h12v2H6zm0 12h12v2H6v-2z"/>
                    </svg>
                    <span>Read Novel</span>
                </button>
            </div>
        </div>
    </header>

    <div class="absolute top-4 left-4 fade-in">
        <button onclick="window.location='{{ route('players.details', ['id' => $player->id ?? 0]) }}'"
            class="bg-header-gradient text-gold py-2 px-4 rounded-full shadow-lg glow-effect flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.209 0 4-1.791 4-4s-1.791-4-4-4-4 1.791-4 4 1.791 4 4 4zm0 2c-3.314 0-6 2.686-6 6h12c0-3.314-2.686-6-6-6z"/>
            </svg>
            <span>Profile</span>
        </button>
    </div>

    <main class="container mx-auto px-6 py-12 fade-in">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
            <div class="bg-light-brown shadow-lg rounded-xl overflow-hidden hover:scale-105 transform transition card relative">
                <img src="https://th.bing.com/th/id/OIP.AJg04AJ_dXPU11MA68apVAHaFQ?w=275&h=195&c=7&r=0&o=5&dpr=1.6&pid=1.7" alt="Hangman" class="w-full h-80 object-cover">
                <div class="absolute inset-0 card-overlay flex flex-col justify-end p-6 text-white">
                    <h2 class="text-gold text-3xl font-bold mb-2">Hangman</h2>
                    <p class="text-sm mb-4">Hulaan ang mga salita at lutasin ang palaisipan!</p>
                    <button onclick="window.location='{{ route('hangman.categories') }}'"
                        class="btn-gradient text-dark py-2 px-6 rounded-full shadow-md transition">
                        Play Now
                    </button>
                </div>
            </div>

            <div class="bg-light-brown shadow-lg rounded-xl overflow-hidden hover:scale-105 transform transition card relative">
                <img src="https://th.bing.com/th/id/OIP.s95Ez3X8wjxD1LS7FXLnOwAAAA?rs=1&pid=ImgDetMain" alt="Text Twister" class="w-full h-80 object-cover">
                <div class="absolute inset-0 card-overlay flex flex-col justify-end p-6 text-white">
                    <h2 class="text-gold text-3xl font-bold mb-2">Text Twister</h2>
                    <p class="text-sm mb-4">Bumuo ng mga salita mula sa mga letra!</p>
                    <button onclick="window.location='{{ route('text-twister.categories') }}'"
                        class="btn-gradient text-dark py-2 px-6 rounded-full shadow-md transition">
                        Play Now
                    </button>
                </div>
            </div>

            <div class="bg-light-brown shadow-lg rounded-xl overflow-hidden hover:scale-105 transform transition card relative">
                <img src="https://th.bing.com/th/id/OIP.ZzKZmju4FPuszAPk4RkQWQHaFj?pid=ImgDet&w=192&h=144&c=7&dpr=1.6" alt="Interactive Novel" class="w-full h-80 object-cover">
                <div class="absolute inset-0 card-overlay flex flex-col justify-end p-6 text-white">
                    <h2 class="text-gold text-3xl font-bold mb-2">Interactive Novel</h2>
                    <p class="text-sm mb-4">Sumabak sa isang kapanapanabik na kwento at mga tanong</p>
                    <button onclick="window.location='{{ route('interactive-novel.categories') }}'"
                        class="btn-gradient text-dark py-2 px-6 rounded-full shadow-md transition">
                        Play Now
                    </button>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-footer-gradient py-4 fade-in">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and history.</p>
        </div>
    </footer>
</body>
</html>
