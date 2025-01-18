<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboards</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom Colors */
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }
        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
        }
        .bg-footer-gradient {
            background: linear-gradient(to left, #3b2f2f, #1e1e1e);
        }
        .text-gold { color: #F4D03F; }
        .text-silver { color: #C0C0C0; }
        .text-bronze { color: #CD7F32; }
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            text-align: center;
        }
        th, td {
            padding: 1rem;
            border: 1px solid #8B5E3C;
        }
        th {
            background-color: #3B2F2F;
            color: #F4D03F;
        }
        td {
            background-color: #5C4033;
            color: #F8F1E8;
        }
        .rank-gold { color: #F4D03F; font-weight: bold; }
        .rank-silver { color: #C0C0C0; font-weight: bold; }
        .rank-bronze { color: #CD7F32; font-weight: bold; }
        .rank-normal { color: #F8F1E8; }
        .medal { margin-left: 0.5rem; }
    </style>
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <!-- Back Button -->
    <div class="absolute top-4 left-4">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <!-- Header -->
    <header class="bg-header-gradient py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Interactive Novel Leaderboards</h1>
            <p class="text-cream text-lg italic mt-2">Show off your skills and climb the ranks!</p>
            <div class="mt-4 flex justify-center space-x-4">
                <button onclick="window.location.href='{{ route('leaderboards.overall') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Overall
                </button>
                <button onclick="window.location.href='{{ route('leaderboards.hangman') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Hangman
                </button>
                <button onclick="window.location.href='{{ route('leaderboards.text-twister') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Text Twister
                </button>
            </div>
        </div>
    </header>

    <!-- Leaderboard Table -->
    <main class="container mx-auto px-6 py-12">
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td class="
                            @if($player->rank == 1) rank-gold
                            @elseif($player->rank == 2) rank-silver
                            @elseif($player->rank == 3) rank-bronze
                            @else rank-normal
                            @endif
                        ">
                            {{ $player->rank }}
                            @if($player->rank == 1)
                                <span class="medal">🥇</span>
                            @elseif($player->rank == 2)
                                <span class="medal">🥈</span>
                            @elseif($player->rank == 3)
                                <span class="medal">🥉</span>
                            @endif
                        </td>
                        <td>{{ $player->username }}</td>
                        <td>{{ $player->scores->interactive_novel_score ?? 'No Score' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <footer class="bg-footer-gradient py-4">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and history.</p>
        </div>
    </footer>
</body>
</html>
