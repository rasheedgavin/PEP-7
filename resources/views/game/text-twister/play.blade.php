<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Text Twister Game</title>
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
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px; /* Optional: Rounded corners for better appearance */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Add shadow for depth */
            z-index: 100;
            width: 300px; /* Optional: Set a width for better alignment */
            text-align: center; /* Center text within the popup */
        }


        .popup #next-btn {
            margin-top: 1rem;
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
    <button onclick="window.location.href='{{ route('text-twister.levels', compact('category', 'level')) }}'">back</button>
    <div id="game-container">
        <div id="category-level">{{ ucfirst($category) }} <br> Level {{ $level }}</div>
        <div id="jumbled-letters-container"></div>
        <input type="text" id="word-input" placeholder="Type your word here">
        <button id="submit-word-btn">Submit</button>
        <div id="word-boxes-container"></div>
        <div id="found-words">Found Words: </div>
        <div id="lives">Lives: 10</div>
        <div id="score">Score: {{$player->scores->text_twister_score}}</div>
        <div id="popup">
            <div id="popup-content"></div>
            <button id="next-btn">Next Level</button>
        </div>
    </div>

 
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
