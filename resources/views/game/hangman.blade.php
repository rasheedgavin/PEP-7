<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Platformer Hangman Game</title>
    <link rel="stylesheet" href="hangman.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        #game-container {
            position: relative;
        }

        #game-canvas {
            border: 1px solid #000;
            background-color: #fff;
            margin-bottom: 20px;
        }

        #word-container {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #alphabet-container {
            margin-top: 20px;
        }

        .letter {
            display: inline-block;
            margin: 5px;
            padding: 10px;
            font-size: 24px;
            background-color: #fff;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .letter.disabled {
            pointer-events: none;
            background-color: #ddd;
        }

        #lives {
            font-size: 18px;
            margin-top: 20px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 100;
        }

        .popup-content {
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <h1>Hangman Platformer</h1>
    <div id="game-container">
        <canvas id="game-canvas" width="800" height="400"></canvas>
        <div id="word-container"></div>
        <div id="alphabet-container"></div>
        <div id="lives">Lives: 10</div>
        <div id="score">
            <div>Score: {{$player->scores->hangman_score}} </div>
        </div>
    </div>
    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="next-btn">Next Round</button>

    </div>
    <audio id="ambient-music" loop>
        <source src="path/to/your/ambient-music.mp3" type="audio/mpeg">
    </audio>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const words = ['javascript', 'hangman', 'game', 'interactive', 'programming'];
        let selectedWord = words[Math.floor(Math.random() * words.length)];
        let guessedLetters = [];
        let score = 0;
        let lives = 10;
        let overallScore = {{$player->scores->overall_score}};
        let hangmanScore = {{ $player->scores->hangman_score }}
        
        const wordContainer = document.getElementById('word-container');
        const alphabetContainer = document.getElementById('alphabet-container');
        const livesElement = document.getElementById('lives');
        const scoreElement = document.getElementById('score');
        const popup = document.getElementById('popup');
        const popupContent = document.getElementById('popup-content');
        const restartBtn = document.getElementById('restart-btn');
        const nextBtn = document.getElementById('next-btn');
        const ambientMusic = document.getElementById('ambient-music');
        const canvas = document.getElementById('game-canvas');
        const playerId = {{ $player->id }}
       
        
        ambientMusic.volume = 0.5;
        ambientMusic.play();
        
        const player = {
            x: 50,
            y: 350,
            width: 40,
            height: 40,
            image: new Image()
        };
        player.image.src = "C:\Users\black\Desktop\ISACAAR FILES\Games code\hangman\assets\characters.png";
        
        function drawPlayer() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(player.image, player.x, player.y, player.width, player.height);
        }
        
        function displayWord() {
            wordContainer.innerHTML = '';
            selectedWord.split('').forEach(letter => {
                const letterElement = document.createElement('span');
                letterElement.textContent = guessedLetters.includes(letter) ? letter : '_';
                wordContainer.appendChild(letterElement);
            });
        }
        
        function displayAlphabet() {
            alphabetContainer.innerHTML = '';
            'abcdefghijklmnopqrstuvwxyz'.split('').forEach(letter => {
                const letterElement = document.createElement('div');
                letterElement.textContent = letter;
                letterElement.classList.add('letter');
                if (guessedLetters.includes(letter)) {
                    letterElement.classList.add('disabled');
                }
                letterElement.addEventListener('click', function () {
                    guessLetter(letter);
                });
                alphabetContainer.appendChild(letterElement);
            });
        }
        
        function guessLetter(letter) {
            if (!guessedLetters.includes(letter)) {
                guessedLetters.push(letter);
                if (!selectedWord.includes(letter)) {
                    lives--;
                    livesElement.textContent = `Lives: ${lives}`;
                    if (lives === 0) {
                        showPopup('You Lose! The word was ' + selectedWord);
                    }
                } else {
                    player.x += 50; // Move player to the right
                    if (selectedWord.split('').every(letter => guessedLetters.includes(letter))) {
                        score = 0;
                        score += 10 * lives;

                        scoreElement.textContent = `Score: ${hangmanScore}`;
                        showPopup('You Win! The word was ' + selectedWord);

                        // Update the score in the database
                        updateScores(playerId, score, score);
                    }

                }
                displayWord();
                displayAlphabet();
                drawPlayer();
            }
        }
        
        function showPopup(message) {
            popupContent.textContent = message;
            popup.style.display = 'block';
        }

        function updateScores(playerId, hangmanScore, overallScore) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/update-score', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    player_id: playerId,
                    hangman_score: hangmanScore,
                    overall_score: overallScore,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.hangman_score && data.overall_score) {
                    // Dynamically update the score in the DOM
                    document.querySelector('#score').innerHTML = `Score: ${data.hangman_score}`;
                } else {
                    console.error('Error updating scores:', data.error);
                }
            })
            .catch(error => {
                console.error('Error in AJAX request:', error);
            });
        }



        

        nextBtn.addEventListener('click', function () {
            // Hide the popup
            popup.style.display = 'none';

            // Select a new word for the next round
            selectedWord = words[Math.floor(Math.random() * words.length)];

            // Reset game-specific variables
            guessedLetters = [];
            lives = 10; // Reset lives
            livesElement.textContent = `Lives: ${lives}`;

            // Reset the word and alphabet displays
            displayWord();
            displayAlphabet();

            // Reset player position
            player.x = 50;
            drawPlayer();

            // Disable the "Next Round" button until the player wins again
            nextBtn.disabled = true;
        });


        
        displayWord();
        displayAlphabet();
        drawPlayer();
    });
    </script>
</body>
</html>
