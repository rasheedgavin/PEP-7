<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Twister Game</title>
    <link rel="stylesheet" href="texttwister.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        #game-container {
            margin-top: 20px;
        }

        #letters-container, #jumbled-letters-container {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #word-input {
            font-size: 18px;
            padding: 10px;
            margin-bottom: 20px;
        }

        #submit-word-btn {
            font-size: 18px;
            padding: 10px 20px;
        }

        #word-boxes-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .word-box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            margin: 5px;
            border: 1px solid #000;
            font-size: 18px;
            background-color: #fff;
        }

        #found-words {
            font-size: 18px;
            margin-top: 20px;
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
    <h1>Text Twister Game</h1>
    <div id="game-container">
        <div id="letters-container"></div>
        <input type="text" id="word-input" placeholder="Type your word here">
        <button id="submit-word-btn">Submit</button>
        <div id="jumbled-letters-container"></div>
        <div id="word-boxes-container"></div>
        <div id="lives">Lives: 3</div>
    </div>
    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="restart-btn">Restart</button>
    </div>
    <audio id="ambient-music" loop>
        <source src="path/to/your/ambient-music.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const letters = ['t', 'w', 'i', 's', 't', 'e', 'r']; 
            const words = ['twister', 'twist', 'site', 'rest', 'rite', 'tier', 'wise']; 
            let foundWords = [];
            let lives = 3;
            
            const lettersContainer = document.getElementById('letters-container');
            const wordInput = document.getElementById('word-input');
            const submitWordBtn = document.getElementById('submit-word-btn');
            const jumbledLettersContainer = document.getElementById('jumbled-letters-container');
            const wordBoxesContainer = document.getElementById('word-boxes-container');
            const livesElement = document.getElementById('lives');
            const popup = document.getElementById('popup');
            const popupContent = document.getElementById('popup-content');
            const restartBtn = document.getElementById('restart-btn');
            const ambientMusic = document.getElementById('ambient-music');
            
            ambientMusic.volume = 0.5;
            ambientMusic.play();
            
            function shuffleArray(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }
            
            function displayLetters() {
                lettersContainer.innerHTML = letters.join(' ');
            }
            
            function displayJumbledLetters() {
                const jumbledLetters = [...letters];
                shuffleArray(jumbledLetters);
                jumbledLettersContainer.innerHTML = jumbledLetters.join(' ');
            }
            
            function displayFoundWords() {
                foundWordsContainer.innerHTML = `Found Words: ${foundWords.join(', ')}`;
            }
            
            function displayWordBoxes() {
                wordBoxesContainer.innerHTML = '';
                words.forEach(word => {
                    const wordContainer = document.createElement('div');
                    wordContainer.style.marginBottom = '10px';
                    word.split('').forEach(() => {
                        const wordBox = document.createElement('div');
                        wordBox.classList.add('word-box');
                        wordContainer.appendChild(wordBox);
                    });
                    wordBoxesContainer.appendChild(wordContainer);
                });
            }
            
            function checkWord(word) {
                if (words.includes(word) && !foundWords.includes(word)) {
                    foundWords.push(word);
                    displayFoundWords();
                    updateWordBoxes(word);
                    if (foundWords.length === words.length) {
                        showPopup('You Win!');
                    }
                } else {
                    lives--;
                    livesElement.textContent = `Lives: ${lives}`;
                    if (lives === 0) {
                        showPopup('You Lose! The possible words were: ' + words.join(', '));
                    }
                }
            }
            
            function updateWordBoxes(word) {
                const wordContainers = wordBoxesContainer.childNodes;
                for (let i = 0; i < wordContainers.length; i++) {
                    const boxes = wordContainers[i].childNodes;
                    if (words[i] === word) {
                        for (let j = 0; j < boxes.length; j++) {
                            boxes[j].textContent = word[j];
                        }
                        break;
                    }
                }
            }
            
            function showPopup(message) {
                popupContent.textContent = message;
                popup.style.display = 'block';
            }
            
            submitWordBtn.addEventListener('click', function () {
                const word = wordInput.value.trim().toLowerCase();
                if (word) {
                    checkWord(word);
                    wordInput.value = '';
                }
            });
            
            restartBtn.addEventListener('click', function () {
                foundWords = [];
                lives = 3;
                livesElement.textContent = `Lives: ${lives}`;
                foundWordsContainer.innerHTML = '';
                popup.style.display = 'none';
                displayLetters();
                displayJumbledLetters();
                displayWordBoxes();
            });
            
            displayLetters();
            displayJumbledLetters();
            displayWordBoxes();
        });
    </script>
</body>
</html>