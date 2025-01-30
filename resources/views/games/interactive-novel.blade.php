<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Novel Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
        }

        .hidden {
            display: none;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Interactive Novel Title</h1>
    </header>

    <main>
        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <section id="container">
            <div id="story">
                <!-- Story content will go here -->
                <p id="intro">
                    Welcome to the interactive novel. You are the hero of this story. Your choices will determine your fate.
                    <br>
                    <button onclick="startStory()">Start Your Journey</button>
                </p>
                <p id="part1" class="hidden">
                    You find yourself in a dark forest. Do you want to go left towards the eerie sounds or right towards the light?
                    <br>
                    <button onclick="goToPart('part2')">Go Left</button>
                    <button onclick="goToPart('part3')">Go Right</button>
                </p>
                <p id="part2" class="hidden">
                    The eerie sounds lead you to a haunted house. You enter and find a treasure chest. Do you open it?
                    <br>
                    <button onclick="goToPart('part4')">Yes, open it</button>
                    <button onclick="goToPart('part5')">No, leave it</button>
                </p>
                <p id="part3" class="hidden">
                    The light leads you to a village where you find help and safety. Congratulations, you win!
                </p>
                <p id="part4" class="hidden">
                    The chest contains a cursed artifact! You are trapped in the house forever.
                </p>
                <p id="part5" class="hidden">
                    You leave the chest and safely exit the house. Well done, you survive another day.
                </p>
            </div>

            <form id="score-form" action="{{ route('interactive-novel.store') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" id="score" name="score">
                <button type="submit">Save Score</button>
            </form>
        </section>

        <script>
            let score = 0;

            function startStory() {
                document.getElementById('intro').classList.add('hidden');
                document.getElementById('part1').classList.remove('hidden');
            }

            function goToPart(partId) {
                const parts = document.querySelectorAll('#story > p');
                parts.forEach(part => part.classList.add('hidden'));
                document.getElementById(partId).classList.remove('hidden');

                // Example scoring logic
                if (partId === 'part3' || partId === 'part5') {
                    score += 10;
                } else if (partId === 'part4') {
                    score -= 10;
                }

                if (partId === 'part3' || partId === 'part4' || partId === 'part5') {
                    endGame(score);
                }
            }

            function endGame(finalScore) {
                document.getElementById('score').value = finalScore;
                document.getElementById('score-form').submit();
            }
        </script>
    </main>
</body>
</html>
