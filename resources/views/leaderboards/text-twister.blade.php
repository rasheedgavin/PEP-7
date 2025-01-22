<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboards</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/leaderboards.css') }}">
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <div class="absolute top-4 left-4 fade-in">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <header class="bg-header-gradient py-6 fade-in">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Text Twister Leaderboards</h1>
            <p class="text-cream text-lg italic mt-2">Ipakita ang iyong mga kasanayan at umakyat sa mga ranggo!</p>
            <div class="mt-4 flex justify-center space-x-4">
                <button onclick="window.location.href='{{ route('leaderboards.overall', compact('id')) }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Overall
                </button>
                <button onclick="window.location.href='{{ route('leaderboards.hangman', compact('id')) }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Hangman
                </button>
                <button onclick="window.location.href='{{ route('leaderboards.interactive-novel', compact('id')) }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Interactive Novel
                </button>
            </div>
        </div>
    </header>
    
    <section class="bg-header-gradient shadow-lg rounded-xl p-6 mt-6 mx-4 text-center max-w-4xl relative mx-auto fade-in">
        @foreach ($players as $player)
            @if ($player->username == $activePlayer->username)
                <p class="text-cream text-xl">
                    rank <span class="text-gold font-extrabold">{{ $player->rank }}</span>! Points: <span class="text-gold fon-extrabold">{{ $player->scores->text_twister_score }}</span>
                </p>
            @endif
        @endforeach
    </section>

    <main class="container mx-auto px-6 py-12 fade-in">
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
                    @if ($player->rank <= 10)
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
                            <td>{{ $player->scores->text_twister_score ?? 'No Score' }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </main>

    <footer class="bg-footer-gradient py-4 fade-in">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>
</body>
</html>
