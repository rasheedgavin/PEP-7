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
<body class="flex flex-col justify-between min-h-screen bg-body-gradient text-cream">

    <div class="absolute top-4 left-4 fade-in">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="flex items-center px-4 py-2 space-x-2 transition rounded-full shadow-lg btn-gradient text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <header class="py-6 bg-header-gradient fade-in">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold tracking-wide uppercase text-gold">Leaderboards</h1>
            <p class="mt-2 text-lg italic text-cream">Ipakita ang iyong mga kasanayan at umakyat sa mga ranggo!</p>
            <div class="flex justify-center mt-4 space-x-4">
                <button onclick="window.location.href='{{ route('leaderboards.hangman', compact('id')) }}'" class="px-6 py-2 rounded-full shadow-lg btn-gradient text-dark">
                    Hangman
                </button>
                <button onclick="window.location.href='{{ route('leaderboards.text-twister', compact('id')) }}'" class="px-6 py-2 rounded-full shadow-lg btn-gradient text-dark">
                    Text Twister
                </button>
                <button onclick="window.location.href='{{ route('leaderboards.interactive-novel', compact('id')) }}'" class="px-6 py-2 rounded-full shadow-lg btn-gradient text-dark">
                    Interactive Novel
                </button>
            </div>
        </div>
    </header>

    <section class="relative max-w-4xl p-6 mx-4 mx-auto mt-6 text-center shadow-lg bg-header-gradient rounded-xl fade-in">
        @foreach ($players as $player)
            @if ($player->username == $activePlayer->username)
                <p class="text-xl text-cream">
                    rank <span class="font-extrabold text-gold">{{ $player->rank }}</span>! Points: <span class="text-gold fon-extrabold">{{ $player->scores->overall_score }}</span>
                </p>
            @endif
        @endforeach
    </section>

    <main class="container px-6 py-12 mx-auto fade-in">
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th colspan="2">Player</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    {{-- @if ($player->rank <= 10) --}}
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
                            <td>
                                @if($player->profile_picture)
                                    <img src="{{ asset('storage/public/profile_pictures/' . $player->profile_picture) }}" alt="Profile Picture" width="10" height="10">
                                @else
                                    <img src="{{ asset('storage/default-avatar.png') }}" alt="Default Avatar" width="10" height="10">
                                @endif
                            </td>
                            @if ($player->username  == $activePlayer->username)
                                <td class="font-extrabold text-gold">{{ $player->username }}</td>
                            @else
                                <td>{{ $player->username }}</td>
                            @endif
                            <td>{{ $player->score ?? 'No Score' }}</td>
                        </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </main>

    <footer class="py-4 bg-footer-gradient fade-in">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>
</body>
</html>
