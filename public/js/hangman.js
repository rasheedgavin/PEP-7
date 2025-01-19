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
                3: { word: 'bat', description: 'A flying mammal that uses echolocation.' },
                4: { word: 'rat', description: 'A medium-sized rodent.' },
                5: { word: 'bee', description: 'An insect known for producing honey.' },
                6: { word: 'cow', description: 'A large domesticated bovine animal.' },
                7: { word: 'pig', description: 'A domesticated swine often kept for meat.' },
                8: { word: 'hen', description: 'A female chicken.' },
                9: { word: 'owl', description: 'A nocturnal bird of prey with a flat face.' },
                10: { word: 'fox', description: 'A small, wild, omnivorous mammal.' }
            },
            medium: {
                1: { word: 'apple', description: 'A sweet, edible fruit from the apple tree.' },
                2: { word: 'grape', description: 'A small, sweet fruit used to make wine.' },
                3: { word: 'peach', description: 'A soft, juicy fruit with a fuzzy skin.' },
                4: { word: 'mango', description: 'A tropical fruit with sweet orange flesh.' },
                5: { word: 'lemon', description: 'A yellow citrus fruit known for its sour taste.' },
                6: { word: 'melon', description: 'A large fruit with a sweet, juicy flesh.' },
                7: { word: 'cherry', description: 'A small, round fruit with a pit, often red or black.' },
                8: { word: 'banana', description: 'A long, curved fruit with soft flesh inside.' },
                9: { word: 'papaya', description: 'A tropical fruit with orange flesh and black seeds.' },
                10: { word: 'guava', description: 'A tropical fruit with green skin and pink or white flesh.' }
            },
            hard: {
                1: { word: 'elephant', description: 'A large mammal with a trunk.' },
                2: { word: 'dinosaur', description: 'A diverse group of extinct reptiles.' },
                3: { word: 'kangaroo', description: 'A marsupial native to Australia.' },
                4: { word: 'platypus', description: 'A mammal that lays eggs and has a duck-like bill.' },
                5: { word: 'rhinoceros', description: 'A large herbivorous mammal with a horn on its nose.' },
                6: { word: 'alligator', description: 'A large reptile with a broad snout, found in the Americas.' },
                7: { word: 'crocodile', description: 'A large predatory reptile found in tropical regions.' },
                8: { word: 'chameleon', description: 'A reptile known for its ability to change color.' },
                9: { word: 'hedgehog', description: 'A small mammal with spines on its back.' },
                10: { word: 'salamander', description: 'An amphibian with a lizard-like appearance.' }
            }
        }
    };

    function initGame(category, level, hangmanScore, playerId) {
        gameState.category = category;
        gameState.level = level;
        gameState.hangmanScore = hangmanScore;
        gameState.playerId = playerId;

        const levelData = getLevelData();
        gameState.revealedLetters = new Array(levelData.word.length).fill(false);
        gameState.currentLetterIndex = 0;

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
    
            letterElement.textContent = gameState.revealedLetters[index] ? char.toUpperCase() : '';
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
    
        const alphabetContainer = document.getElementById('alphabet-container');
        const letterElements = Array.from(alphabetContainer.children);
        const clickedLetter = letterElements.find(el => el.textContent === letter);
    
        if (letter === selectedWord[gameState.currentLetterIndex]) {
            gameState.revealedLetters[gameState.currentLetterIndex] = true;
            gameState.currentLetterIndex++;
    
            if (gameState.currentLetterIndex === selectedWord.length) {
                gameState.score = gameState.lives * 10;
                gameState.hangmanScore += gameState.score;
                updateScores(gameState.playerId, gameState.score, gameState.category, gameState.level);
                showPopup(`Correct! You earned ${gameState.score} points!`, true);
            }
        } else {
            if (gameState.lives > 0){
                gameState.lives--;
            }
            gameState.player.y += 15;
            document.getElementById('lives').textContent = `Lives: ${gameState.lives}`;
            if (gameState.lives === 0) {
                showPopup(`You Lose!`, false);
            }
        }
    
        clickedLetter.classList.add('disabled');
    
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

        document.addEventListener('keydown', handleNextKeyPress);
    }

    function handleNextKeyPress(event) {
        if (event.key === 'Enter') {
            const popup = document.getElementById('popup');
            if (popup.style.display === 'block') {
                popup.style.display = 'none';
                handleNextLevel();
                document.removeEventListener('keydown', handleNextKeyPress); // Clean up
            }
        }
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

    function drawPlayer() {
        const canvas = document.getElementById('game-canvas');
        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(gameState.player.image, gameState.player.x, gameState.player.y, gameState.player.width, gameState.player.height);
    }

    document.addEventListener('keydown', function (event) {
        const letter = event.key.toLowerCase();
        if (/^[a-z]$/.test(letter)) {
            guessLetter(letter);
        }
    });

    const gameContainer = document.getElementById('game-container');
    const category = gameContainer.getAttribute('data-category');
    const level = parseInt(gameContainer.getAttribute('data-level'));
    const hangmanScore = parseInt(gameContainer.getAttribute('data-hangman-score'));
    const playerId = parseInt(gameContainer.getAttribute('data-player-id'));

    initGame(category, level, hangmanScore, playerId);

    document.getElementById('next-btn').addEventListener('click', handleNextLevel);
});
