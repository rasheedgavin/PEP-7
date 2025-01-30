<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Text Twister</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
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
        <p class="text-gold fade-in">&copy; 2025 PEP7.</p>
    </footer>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const levels = {
            easy: {
                1: { letters: 'skala', words: ['kasal', 'lakas', 'sakal', 'sala'] },
                2: { letters: 'gungobant', words: ['bangungot', 'bano', 'bango', 'utot',] },
                3: { letters: 'gapmnatog', words: ['panggamot', 'gamot', 'maga', 'tao'] },
                4: { letters: 'sahankanuday', words: ['nakahandusay', 'anak', 'akay', 'asa'] },
                5: { letters: 'waggawakakagnaa', words: ['pagkakawanggawa', 'gawa', 'gagawa', 'paggawa'] },
                6: { letters: 'ksiamhgi', words: ['himagsik', 'higa', 'himig', 'gimik'] },
                7: { letters: 'hmalai', words: ['himala', 'hila', 'mali', 'lima'] },
                8: { letters: 'aobnnigdraa', words: ['ibong', 'adarna', 'darna', 'ibon'] },
                9: { letters: 'bnaiughop', words: ['panibugho', 'baho', 'puno', 'gabi'] },
                10: { letters: 'mnaakapygriahain', words: ['makapangyarihan', 'kapangyarihan', 'hari', 'panig'] },
            },
            medium: {
                1: { letters: 'kansatulan', words: ['natuklasan', 'sala', 'sana', 'tuklas'] },
                2: { letters: 'wandugakan', words: ['nakadungaw', 'dungaw', 'gawa', 'nawa'] },
                3: { letters: 'naligumhan', words: ['nahumaling', 'mali', 'lima', 'alin'] },
                4: { letters: 'bagmanangana', words: ['nangangamba', 'banga', 'gana', 'mana'] },
                5: { letters: 'kinsiling', words: ['lingkisin', 'linis', 'lingkis', 'sila'] },
                6: { letters: 'pasantalma', words: ['tampalasan', 'sala', 'saan', 'sapa'] },
                7: { letters: 'anapinabula', words: ['pinabulaanan', 'pabulaanan', 'laban', 'lapa'] },
                8: { letters: 'tingangining', words: ['nangingitngit', 'nginig', 'ngitngit', 'tingi'] },
                9: { letters: 'binkulpiga', words: ['pinagkubli', 'kubli', 'bili', 'pula'] },
                10: { letters: 'nawgurunda', words: ['durungawan', 'dawag', 'gawa', 'gana'] },
            },
            hard: {
                1: { letters: 'salpagang', words: ['pagpaslang', 'paslang', 'lasa', 'langgas', 'sapa',] },
                2: { letters: 'hkaarnia', words: ['kaharian', 'hari', 'arian', 'hara'] },
                3: { letters: 'hasnainkampina', words: ['kinapamihasnan', 'pinamihasa', 'minasa', 'mahina'] },
                4: { letters: 'alkagitsatp', words: ['pagtataksil', 'taksil', 'sila', 'sikat'] },
                5: { letters: 'gpagibi', words: ['pagibig', 'ibig', 'igibi', 'gabi'] },
                6: { letters: 'mgaiski', words: ['makisig', 'siga', 'kisig', 'siga'] },
                7: { letters: 'ibakalans', words: ['kalabisan', 'lana', 'labis', 'labi'] },
                8: { letters: 'papygapuoalt', words: ['pagpapatuloy', 'patuloy', 'toy', 'toyo'] },
                9: { letters: 'mapanggial', words: ['mapagaling', 'magaling', 'galing', 'linga'] },
                10: { letters: 'bagukaant', words: ['kagubatan', 'bata', 'gubat', 'ugat'] },
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
                return; 
            }

            console.log(`Checking word: "${word}" against ${levelData.words}`);
            if (levelData.words.includes(word)) {
                foundWords.add(word);
                textTwisterScore += score; 
                updateWordBoxes(word);
                updateScores(playerId, score, category, level); 

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
                        boxes[i].textContent = letter;
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
                    level = 1
                } else if (category === 'medium') {
                    category = 'hard'; 
                    level = 1
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
