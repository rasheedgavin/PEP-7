document.addEventListener('DOMContentLoaded', function () {
    const gameState = {
        category: null,
        level: null,
        hangmanScore: 0,
        playerId: null,
        lives: 10,
        score: 0,
        revealedLetters: [],
        currentLetterIndex: 0,
        player: {
            x: 1,
            y: 1,
            width: 300,
            height: 150,
            image: new Image()
        },
        levels: {
            easy: {
                1: { word: 'cat', description: 'A small domesticated carnivorous mammal.' },
                2: { word: 'dog', description: 'A domesticated carnivorous mammal that barks.' },
            },
            medium: {
                1: { word: 'apple', description: 'A sweet, edible fruit from the apple tree.' },
                2: { word: 'grape', description: 'A small, sweet fruit used to make wine.' },
            },
            hard: {
                1: { word: 'elephant', description: 'A large mammal with a trunk.' },
                2: { word: 'dinosaur', description: 'A diverse group of extinct reptiles.' },
            }
        }
    };

    function initGame(category, level, hangmanScore, playerId) {
        gameState.category = category;
        gameState.level = level;
        gameState.hangmanScore = hangmanScore;
        gameState.playerId = playerId;

        gameState.player.image.src = "https://images.squarespace-cdn.com/content/v1/508da03be4b0d28844ddf21c/1534914532437-34NQK7MID0YWD35MTUOB/Rocco.jpg";
        gameState.player.image.onload = drawPlayer;

        displayWordAndDescription();
        displayAlphabet();
    }

    function getLevelData() {
        return gameState.levels[gameState.category][gameState.level];
    }

    function displayWordAndDescription() {
        const levelData = getLevelData();
        const wordContainer = document.getElementById('word-container');
        wordContainer.innerHTML = '';

        levelData.word.split('').forEach((char, index) => {
            const letterElement = document.createElement('span');
            letterElement.textContent = gameState.revealedLetters[index] ? `${char} ` : '_ ';
            wordContainer.appendChild(letterElement);
        });

        const descriptionContainer = document.getElementById('description-container');
        descriptionContainer.textContent = `Description: ${levelData.description}`;
    }

    function displayAlphabet() {
        const alphabetContainer = document.getElementById('alphabet-container');
        alphabetContainer.innerHTML = '';

        'abcdefghijklmnopqrstuvwxyz'.split('').forEach(letter => {
            const letterElement = document.createElement('div');
            letterElement.textContent = letter;
            letterElement.classList.add('letter');
            letterElement.addEventListener('click', () => guessLetter(letter));
            alphabetContainer.appendChild(letterElement);
        });
    }

    function guessLetter(letter) {
        const levelData = getLevelData();
        const selectedWord = levelData.word;

        let correctGuess = false;

        selectedWord.split('').forEach((char, index) => {
            if (char === letter && !gameState.revealedLetters[index]) {
                gameState.revealedLetters[index] = true;
                correctGuess = true;
            }
        });

        if (correctGuess) {
            if (gameState.revealedLetters.every(Boolean)) {
                gameState.score = gameState.lives * 10;
                gameState.hangmanScore += gameState.score;
                updateScores(gameState.playerId, gameState.score, gameState.category, gameState.level);
                showPopup(`Correct! You earned ${gameState.score} points! Click "Next" to proceed.`, true);
            }
        } else {
            gameState.lives--;
            gameState.player.y += 15;
            document.getElementById('lives').textContent = `Lives: ${gameState.lives}`;
            if (gameState.lives === 0) {
                showPopup(`You Lose! The word was "${selectedWord}"`, true);
            }
        }

        displayWordAndDescription();
        drawPlayer();
        document.getElementById('score').textContent = `Score: ${gameState.hangmanScore}`;
    }

    function showPopup(message, showNext = false) {
        const popup = document.getElementById('popup');
        const popupContent = document.getElementById('popup-content');
        const nextBtn = document.getElementById('next-btn');
        popupContent.textContent = message;
        popup.style.display = 'block';
        nextBtn.style.display = showNext ? 'inline-block' : 'none';
    }

    function updateScores(playerId, score, category, level) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/increment/hangman/score', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                player_id: playerId,
                hangman_score: score,
                category: category,
                level: level,
            }),
        }).catch(err => console.error('Error updating score:', err));
    }

    function handleNextLevel() {
        const newLevel = gameState.level + 1;
        if (newLevel > 10) {
            if (gameState.category === 'easy') {
                gameState.category = 'medium';
                gameState.level = 1;
            } else if (gameState.category === 'medium') {
                gameState.category = 'hard';
                gameState.level = 1;
            } else {
                showPopup('Congratulations! You completed all levels!', false);
                return;
            }
        } else {
            gameState.level = newLevel;
        }
        window.location.href = `/hangman/${gameState.category}/${gameState.level}`;
    }

    function drawPlayer() {
        const canvas = document.getElementById('game-canvas');
        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(gameState.player.image, gameState.player.x, gameState.player.y, gameState.player.width, gameState.player.height);
    }

    const gameContainer = document.getElementById('game-container');
    const category = gameContainer.getAttribute('data-category');
    const level = parseInt(gameContainer.getAttribute('data-level'));
    const hangmanScore = parseInt(gameContainer.getAttribute('data-hangman-score'));
    const playerId = parseInt(gameContainer.getAttribute('data-player-id'));

    initGame(category, level, hangmanScore, playerId);

    document.getElementById('next-btn').addEventListener('click', handleNextLevel);
});
