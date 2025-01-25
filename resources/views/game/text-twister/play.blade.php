<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Text Twister Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom Tailwind Extensions */
        .bg-header-gradient {
            background: linear-gradient(to right, #1e1e1e, #3b2f2f);
        }
        .bg-body-gradient {
            background: linear-gradient(to bottom, #5c4033, #3b2f2f);
        }
        .bg-footer-gradient {
            background: linear-gradient(to left, #3b2f2f, #1e1e1e);
        }
        .text-gold {
            color: #F4D03F;
        }
        .text-cream {
            color: #F8F1E8;
        }
        .btn-gradient {
            background: linear-gradient(to right, #F4D03F, #8B5E3C);
            box-shadow: 0 0 10px rgba(244, 208, 63, 0.6);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
        .btn-gradient:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(244, 208, 63, 0.9);
        }
        #word-boxes-container {
            display: flex;
            justify-content: center;
            gap: 3px; 
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .word-box {
            display: flex;
            width: 35px; 
            height: 45px;
            margin: 5px;
            padding: 7px 10px;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(to bottom, #F4D03F, #8B5E3C);
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

    </style>
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <!-- Header -->
    <header class="bg-header-gradient py-6 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Text Twister</h1>
            <h2 id="category-level" class="text-gold text-3xl font-bold mb-4">
                {{ ucfirst($category) }} - Level {{ $level }}
            </h2>
            <div id="lives" class="text-gold">Lives: 10</div>
            <div id="score" class="text-gold">Score: {{$player->scores->text_twister_score}}</div>
        </div>
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('dashboard') }}'"
                class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>
    </header>

    <!-- Back Button -->
    <div class="absolute top-4 left-4">
        <button onclick="window.location.href='{{ route('text-twister.levels', compact('category', 'level')) }}'" 
            class="btn-gradient text-dark py-2 px-6 rounded-full shadow-md">
            Back
        </button>
    </div>

    <!-- Game Container -->
    <main class="flex-1 container mx-auto px-6 py-12 flex justify-center">
        <div id="game-container" class="bg-header-gradient p-8 rounded-lg shadow-lg text-center w-full max-w-2xl">

            <!-- Jumbled Letters -->
            <div id="jumbled-letters-container" class="text-gold text-4xl font-bold mb-8"></div>

            <!-- Input and Submit Button -->
            <div class="flex justify-center gap-4 mb-6">
                <input type="text" id="word-input" placeholder="Type your word here"
                    class="text-lg p-4 rounded-lg border-2 border-gold bg-transparent text-cream w-full max-w-xs">
                <button id="submit-word-btn" class="btn-gradient text-dark px-6 py-3 rounded-full shadow-md">
                    Submit
                </button>
            </div>

            <!-- Word Boxes -->
            <div id="word-boxes-container"></div>


        </div>
    </main>

    <!-- Popup -->
    <div id="popup" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-75 hidden">
        <div class="bg-header-gradient text-center p-8 rounded-lg shadow-lg w-full max-w-md">
            <div id="popup-content" class="text-cream text-xl mb-6"></div>
            <button id="next-btn" class="btn-gradient text-dark px-8 py-3 rounded-full shadow-md">
                Next Level
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and creativity.</p>
        </div>
    </footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const levels = {
            easy: {
                1: { letters: 'cat', words: ['cat', 'at', 'act'] },
                2: { letters: 'dog', words: ['dog', 'do', 'go'] },
                3: { letters: 'bat', words: ['bat', 'at', 'tab'] },
                4: { letters: 'rat', words: ['rat', 'at', 'art'] },
                5: { letters: 'bee', words: ['bee', 'be'] },
                6: { letters: 'cow', words: ['cow', 'ow', 'wo'] },
                7: { letters: 'pig', words: ['pig', 'pi'] },
                8: { letters: 'hen', words: ['hen', 'he'] },
                9: { letters: 'owl', words: ['owl', 'wo', 'low'] },
                10: { letters: 'fox', words: ['fox', 'of'] },
            },
            medium: {
                1: { letters: 'apple', words: ['apple', 'lap', 'pal'] },
                2: { letters: 'grape', words: ['grape', 'gap', 'rage'] },
                3: { letters: 'peach', words: ['peach', 'cap', 'ace'] },
                4: { letters: 'mango', words: ['mango', 'man', 'go'] },
                5: { letters: 'lemon', words: ['lemon', 'mole', 'no'] },
                6: { letters: 'melon', words: ['melon', 'one', 'men'] },
                7: { letters: 'cherry', words: ['cherry', 'cry', 'her'] },
                8: { letters: 'banana', words: ['banana', 'ban', 'nan'] },
                9: { letters: 'papaya', words: ['papaya', 'pay', 'pa'] },
                10: { letters: 'guava', words: ['guava', 'vag', 'ava'] },
            },
            hard: {
                1: { letters: 'elephant', words: ['elephant', 'tent', 'pen'] },
                2: { letters: 'dinosaur', words: ['dinosaur', 'rad', 'sand'] },
                3: { letters: 'kangaroo', words: ['kangaroo', 'ran', 'oak'] },
                4: { letters: 'platypus', words: ['platypus', 'play', 'tap'] },
                5: { letters: 'rhinoceros', words: ['rhinoceros', 'rose', 'horn'] },
                6: { letters: 'alligator', words: ['alligator', 'tail', 'go'] },
                7: { letters: 'crocodile', words: ['crocodile', 'cold', 'ride'] },
                8: { letters: 'chameleon', words: ['chameleon', 'man', 'calm'] },
                9: { letters: 'hedgehog', words: ['hedgehog', 'hog', 'dog'] },
                10: { letters: 'salamander', words: ['salamander', 'sand', 'land'] },
            },
        };

        let category = "{{ $category }}";
        let level = parseInt("{{ $level }}");
        let lives = 10;
        let score = 50;
        let textTwisterScore = {{$player->scores->text_twister_score}};
        let playerId = {{$player->id}};

        const foundWords = new Set();

        const jumbledLettersContainer = document.getElementById('jumbled-letters-container');
        const wordInput = document.getElementById('word-input');
        const submitWordBtn = document.getElementById('submit-word-btn');
        const wordBoxesContainer = document.getElementById('word-boxes-container');
        const foundWordsElement = document.getElementById('found-words');
        const livesElement = document.getElementById('lives');
        const scoreElement = document.getElementById('score');
        const popup = document.getElementById('popup');
        const popupContent = document.getElementById('popup-content');
        const nextBtn = document.getElementById('next-btn');

        function getLevelData() {
            return levels[category][level];
        }

        function displayJumbledLetters() {
            const levelData = getLevelData();
            const jumbled = levelData.letters.split('').sort(() => Math.random() - 0.5).join('');
            jumbledLettersContainer.textContent = `${jumbled}`;
        }

        function displayWordBoxes() {
            wordBoxesContainer.innerHTML = '';
            const levelData = getLevelData();
            levelData.words.forEach(word => {
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

        function displayFoundWords() {
            foundWordsElement.textContent = `Found Words: ${Array.from(foundWords).join(', ')}`;
        }

        function checkWord(word) {
            const levelData = getLevelData();
            if (levelData.words.includes(word) && !foundWords.has(word)) {
                foundWords.add(word); // Add the word to the found set
                textTwisterScore += score; // Increment the score
                scoreElement.textContent = `Score: ${textTwisterScore}`; // Update UI
                updateWordBoxes(word); // Fill the correct boxes
                displayFoundWords(); // Update found words on UI
                updateScores(playerId, score, category, level); // Send score update to backend

                // Check if all words are found to trigger level completion popup
                if (foundWords.size === levelData.words.length) {
                    showPopup(`Correct! You earned ${score} points! Click "Next" to proceed.`, true);
                }
            } else {
                lives--; // Decrement lives if the word is invalid
                livesElement.textContent = `Lives: ${lives}`; // Update UI
                if (lives === 0) {
                    // Game over popup
                    showPopup(`You Lose! Words were: ${levelData.words.join(', ')}`, false);
                }
            }
        }


        function updateWordBoxes(word) {
            const levelData = getLevelData();
            const wordContainers = Array.from(wordBoxesContainer.childNodes);
            wordContainers.forEach((container, index) => {
                if (levelData.words[index] === word) {
                    const boxes = container.childNodes;
                    for (let j = 0; j < boxes.length; j++) {
                        boxes[j].textContent = word[j];
                    }
                }
            });
        }

        function showPopup(message, showNextBtn = false) {
            popupContent.textContent = message;
            popup.style.display = 'block'; // Show the popup
            nextBtn.style.display = showNextBtn ? 'block' : 'none'; // Show Next button if applicable

        }

        function updateScores(playerId, score, category, level) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/increment/text-twister/score', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    player_id: playerId,
                    text_twister_score: score,
                    category: category,
                    level: level,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Score updated:', data.new_text_twister_score);
                } else {
                    console.error('Error updating score:', data.error);
                }
            })
            .catch(err => console.error('Error:', err));
        }

        function resetGame() {
            lives = 10;
            foundWords.clear();
            displayJumbledLetters();
            displayWordBoxes();
            displayFoundWords();
            popup.style.display = 'none';
        }

        submitWordBtn.addEventListener('click', function () {
            const word = wordInput.value.trim().toLowerCase();
            if (word) {
                checkWord(word);
                wordInput.value = '';
            }
        });

        nextBtn.addEventListener('click', function () {
            popup.style.display = 'none';
            level++;
            if (level > 10) {
                if (category === 'easy') {
                    category = 'medium';
                } else if (category === 'medium') {
                    category = 'hard';
                } else {
                    showPopup('Congratulations! You completed all levels!');
                    return;
                }
                level = 1;
            }
            const newUrl = `/text-twister/${category}/${level}`;
            window.location.href = newUrl;
        });

        resetGame();
    });

</script>
</body>
</html>
