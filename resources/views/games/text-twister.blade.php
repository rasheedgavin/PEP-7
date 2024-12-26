<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Text Twister Game</title>
</head>
<body>
    <header>
        <h1>Text Twister Game</h1>
    </header>

    <main>
        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <section id="game-container">
            <!-- Text Twister game logic and UI here -->
        </section>

        <form id="score-form" action="{{ route('text-twister.store') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" id="score" name="score">
            <button type="submit">Save Score</button>
        </form>

        <script>
            // Example game logic to capture the score
            function endGame(score) {
                document.getElementById('score').value = score;
                document.getElementById('score-form').submit();
            }

            // Example usage: Call endGame(300) when the game ends with the final score
            endGame(300);  // Example: ending the game with a score of 300
        </script>
    </main>
</body>
</html>
