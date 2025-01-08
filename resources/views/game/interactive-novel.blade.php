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
            <div></div>Overall Score: {{$player->scores->overall_score}} 
            <div></div>Hangman Score: {{$player->scores->hangman_score}} 
        </div>
    </div>
    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="restart-btn">Restart</button>
    </div>
    <audio id="ambient-music" loop>
        <source src="path/to/your/ambient-music.mp3" type="audio/mpeg">
    </audio>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const words = ['javascript', 'hangman', 'game', 'interactive', 'programming'];
        let selectedWord = words[Math.floor(Math.random() * words.length)];
        let guessedLetters = [];
        let lives = 10;
        let score = {{$player->scores->overall_score}};
        
        const wordContainer = document.getElementById('word-container');
        const alphabetContainer = document.getElementById('alphabet-container');
        const livesElement = document.getElementById('lives');
        const scoreElement = document.getElementById('score');
        const popup = document.getElementById('popup');
        const popupContent = document.getElementById('popup-content');
        const restartBtn = document.getElementById('restart-btn');
        const ambientMusic = document.getElementById('ambient-music');
        const canvas = document.getElementById('game-canvas');
        let playerHangmanScore = {{ $player->scores->hangman_score }}
        
        ambientMusic.volume = 0.5;
        ambientMusic.play();
        
        const player = {
            x: 50,
            y: 350,
            width: 40,
            height: 40,
            image: new Image()
        };
        player.image.src = "C:\Users\black\Desktop\ISACAAR FILES\Games code\hangman\assets\characters.png"; // Update with the path to your player image
        
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
                        const hangmanScore = lives * 10;
                        score += hangmanScore;

                        scoreElement.textContent = `Overall Score: ${score}`;
                        showPopup('You Win! The word was ' + selectedWord);

                        // Update the score in the database
                        updateScores(playerId, hangmanScore, score);
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
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/update-score';

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            form.innerHTML = `
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="player_id" value="${playerId}">
                <input type="hidden" name="hangman_score" value="${hangmanScore}">
                <input type="hidden" name="overall_score" value="${overallScore}">
            `;

            document.body.appendChild(form);
            form.submit();
        }


        
        restartBtn.addEventListener('click', function () {
            selectedWord = words[Math.floor(Math.random() * words.length)];
            guessedLetters = [];
            lives = 10;
            livesElement.textContent = `Lives: ${lives}`;
            popup.style.display = 'none';
            player.x = 50; // Reset player position
            displayWord();
            displayAlphabet();
            drawPlayer();
        });
        
        displayWord();
        displayAlphabet();
        drawPlayer();
    });
    </script>
</body>
</html>
