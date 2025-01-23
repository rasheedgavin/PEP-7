<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }
        .bg-footer-gradient {
            background: linear-gradient(to left, #3b2f2f, #1e1e1e);
        }
        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
        }
        .text-gold { color: #F4D03F; }
        .text-cream { color: #F8F1E8; }
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
        .achievement-card {
            background-color: #3b2f2f;
            border: 2px solid #F4D03F;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.6);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .achievement-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(244, 208, 63, 0.8);
        }
        .achievement-header {
            border-bottom: 2px solid #F4D03F;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
        }
        .achievement-value {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .progress-bar {
            height: 1rem;
            border-radius: 0.5rem;
            background-color: #8B5E3C;
            overflow: hidden;
            margin-top: 0.5rem;
        }
        .progress-bar-inner {
            height: 100%;
            background-color: #F4D03F;
            text-align: right;
            padding-right: 0.5rem;
            line-height: 1rem;
            color: #1e1e1e;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <header class="bg-header-gradient py-6 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Achievements</h1>
            <p class="text-cream text-lg italic mt-2">Ipagdiwang ang iyong mga tagumpay at subaybayan ang iyong pag-unlad!</p>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 gap-8 fade-in">
        <div class="achievement-card">
            <h2 class="text-gold text-3xl font-bold achievement-header">Levels Completed</h2>
            <ul class="text-lg">
                <li class="font-bold">Hangman Levels: 
                    <span class="text-gold font-bold">{{ $hangmanLevel }}/30</span>
                    <div class="progress-bar">
                        <div class="progress-bar-inner" style="width: {{ round(($hangmanLevel / 30) * 100, 2) }}%;">
                            {{ round(($hangmanLevel / 30) * 100, 2) }}%
                        </div>
                    </div>
                </li>
                <li class="font-bold">Text Twister Levels: 
                    <span class="text-gold font-bold">{{ $textTwisterLevel }}/30</span>
                    <div class="progress-bar">
                        <div class="progress-bar-inner" style="width: {{ round(($textTwisterLevel / 30) * 100, 2) }}%;">
                            {{ round(($textTwisterLevel / 30) * 100, 2) }}%
                        </div>
                    </div>
                </li>
                <li class="font-bold">Interactive Novel Levels: 
                    <span class="text-gold font-bold">{{ $interactiveNovelLevel }}/15</span>
                    <div class="progress-bar">
                        <div class="progress-bar-inner" style="width: {{ round(($interactiveNovelLevel / 15) * 100, 2) }}%;">
                            {{ round(($interactiveNovelLevel / 15) * 100, 2) }}%
                        </div>
                    </div>
                </li>
                <li class="font-bold">Overall Levels: 
                    <span class="text-gold font-bold">{{ $overallLevel }}/75</span>
                    <div class="progress-bar">
                        <div class="progress-bar-inner" style="width: {{ round(($overallLevel / 75) * 100, 2) }}%;">
                            {{ round(($overallLevel / 75) * 100, 2) }}%
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="achievement-card">
            <h2 class="text-gold text-3xl font-bold achievement-header">Categories Completed</h2>
            <div class="space-y-8 mt-4">

                <div>
                    <h3 class="text-cream text-2xl font-bold">Hangman</h3>
                    <div class="medal-container">
                        <div class="medal {{ $hangmanCategory == 3 ? 'gold' : ($hangmanCategory == 2 ? 'silver' : ($hangmanCategory == 1 ? 'bronze' : 'none')) }}">
                            {{ $hangmanCategory == 0 ? 'None' : ($hangmanCategory == 3 ? '🥇' : ($hangmanCategory == 2 ? '🥈' : '🥉')) }}
                        </div>
                    </div>
                    <p class="progress-text text-gold">{{ $hangmanCategory }}/3</p>
                </div>

                <div>
                    <h3 class="text-cream text-2xl font-bold">Text Twister</h3>
                    <div class="medal-container">
                        <div class="medal {{ $textTwisterCategory == 3 ? 'gold' : ($textTwisterCategory == 2 ? 'silver' : ($textTwisterCategory == 1 ? 'bronze' : 'none')) }}">
                            {{ $textTwisterCategory == 0 ? 'None' : ($textTwisterCategory == 3 ? '🥇' : ($textTwisterCategory == 2 ? '🥈' : '🥉')) }}
                        </div>
                    </div>
                    <p class="progress-text text-gold">{{ $textTwisterCategory }}/3</p>
                </div>

                <div>
                    <h3 class="text-cream text-2xl font-bold">Interactive Novel</h3>
                    <div class="medal-container">
                        <div class="medal {{ $interactiveNovelCategory == 3 ? 'gold' : ($interactiveNovelCategory == 2 ? 'silver' : ($interactiveNovelCategory == 1 ? 'bronze' : 'none')) }}">
                            {{ $interactiveNovelCategory == 0 ? 'None' : ($interactiveNovelCategory == 3 ? '🥇' : ($interactiveNovelCategory == 2 ? '🥈' : '🥉')) }}
                        </div>
                    </div>
                    <p class="progress-text text-gold">{{ $interactiveNovelCategory }}/3</p>
                </div>

                <div>
                    <h3 class="text-cream text-2xl font-bold">Overall</h3>
                    <div class="medal-container">
                        <div class="medal {{ $overallCategory == 9 ? 'gold' : ($overallCategory >= 6 ? 'silver' : ($overallCategory >= 3 ? 'bronze' : 'none')) }}">
                            {{ $overallCategory < 3 ? 'None' : ($overallCategory == 9 ? '🥇' : ($overallCategory >= 6 ? '🥈' : '🥉')) }}
                        </div>
                    </div>
                    <p class="progress-text text-gold">{{ $overallCategory }}/9</p>
                </div>

            </div>
        </div>
    </main>

    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>

</body>
</html>
