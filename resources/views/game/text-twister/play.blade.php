<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Text Twister</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/hangman.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
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
        
        #game-container{
            width: 800px; 
            height: 600px; 
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        #word-boxes-container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            gap: 15px; 
            margin: 20px 0;
        }

        .word-box {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom, #F4D03F, #8B5E3C);
            color: #1e1e1e;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        }
        .popup #next-btn {
            margin-top: 1rem;
        }

    </style>
</head>
<body>
    <div class="absolute top-4 left-4">
        <button onclick="window.location='{{ route('dashboard') }}'" 
            class="btn-gradient text-dark py-2 px-4 rounded-full flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <header class="bg-header-gradient py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Text Twister</h1>
            <h2 id="category-level" class="text-3xl font-bold mb-4">
                {{ ucfirst($category) }} - Level {{ $level }}
            </h2>
            <div id="score" class="text-crem text-lg italic mt -2">Score: <span class="text-gold font-extrabold">{{ $player->scores->text_twister_score }}</span></div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center">
        <div id="game-container" class="bg-header-gradient w-full max-w-3xl p-8 rounded-lg shadow-lg">
            <div id="jumbled-letters-container" class="text-gold text-4xl font-bold mb-6"></div>

            <div class="flex justify-center items-center gap-4 mb-6">
                <input type="text" id="word-input" placeholder="Type your word here"
                    class="text-lg p-4 rounded-lg border-2 border-gold bg-transparent text-cream w-full max-w-xs">
                <button id="submit-word-btn" class="btn-gradient text-dark px-6 py-3 rounded-full">
                    Submit
                </button>
            </div>

            <div id="word-boxes-container"></div>
        </div>
    </main>

    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="next-btn" class="btn-gradient">Next Level</button>
    </div>
    
    <footer class="bg-footer-gradient py-4 mt-8">
        <p class="text-gold fade-in">&copy; 2025 Hangman Game.</p>
    </footer>

</body>

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
                10: { letters: 'fox', words: ['fox', 'of', 'fo', 'ox', 'xo'] },
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
            const data = levels[category][level];
            data.words = data.words.map(word => word.toLowerCase());
            return data;
        }

        function displayJumbledLetters() {
            levelData = getLevelData();
            const jumbled = levelData.letters.split('').sort(() => Math.random() - 0.5).join(' ');
            jumbledLettersContainer.textContent = jumbled;
        }

        function displayWordBoxes() {
            wordBoxesContainer.innerHTML = ''; 
            const levelData = getLevelData();

            levelData.words.forEach(word => {
                const wordRow = document.createElement('div');
                wordRow.style.display = 'flex'; 
                wordRow.style.justifyContent = 'center';
                wordRow.style.marginBottom = '10px'; 

                word.split('').forEach(() => {
                    const wordBox = document.createElement('div');
                    wordBox.classList.add('word-box');
                    wordRow.appendChild(wordBox);
                });

                wordBoxesContainer.appendChild(wordRow); 
            });
        }



        function displayFoundWords() {
            foundWordsElement.textContent = `Found Words: ${Array.from(foundWords).join(', ')}`;
        }

        function checkWord(word) {
            const levelData = getLevelData();
            word = word.trim().toLowerCase();

            if (foundWords.has(word)) {
                console.log('Word already found:', word);
                return; // Avoid duplicate entries
            }

            console.log(`Checking word: "${word}" against ${levelData.words}`);
            if (levelData.words.includes(word)) {
                foundWords.add(word);
                textTwisterScore += score; // Increment score
                updateWordBoxes(word);
                updateScores(playerId, score, category, level); // Update UI with the found word

                if (foundWords.size === levelData.words.length) {
                    showPopup(`Great job! You've found all words!`, true);
                }
            }
            
        }



        function updateWordBoxes(word) {
            const levelData = getLevelData();
            const wordContainers = Array.from(wordBoxesContainer.childNodes);

            wordContainers.forEach((container, index) => {
                if (levelData.words[index] === word) {
                    const boxes = container.childNodes;
                    word.split('').forEach((letter, i) => {
                        boxes[i].textContent = letter; // Fill each box with the correct letter
                    });
                }
            });
        }


        function showPopup(message, showNextBtn = false) {
            popupContent.textContent = message;
            popup.style.display = 'block'; 
            nextBtn.style.display = showNextBtn ? 'inline-block' : 'none'; 
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

        wordInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                const word = wordInput.value.trim().toLowerCase();
                if (word) {
                    checkWord(word);
                    wordInput.value = '';
                }
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
                    showPopup('Congratulations! You completed all levels!', false);
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
