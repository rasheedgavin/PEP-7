<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hangman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/hangman.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Custom Colors */
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

        #game-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
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
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z" />
            </svg>
            <span>Back</span>
        </button>
    </div>

    <header class="bg-header-gradient py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-gold text-5xl font-extrabold uppercase tracking-wide">Interactive Novel</h1>
            <h2 class="text-3xl font-bold mt-2">{{ ucfirst($category) }} - Level {{ $level }}</h2>
            <div id="score" class="mt-2">Score: <span class="font-extrabold text-gold">{{$player->scores->interactive_novel_score}}</span></div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center">
        <div id="game-container" class="bg-header-gradient w-full max-w-4xl rounded-lg shadow-lg p-6">
            {{-- <div id="display-case" class="relative w-full h-64 mb-6 overflow-hidden rounded-lg">
                <img id="background-image" src="{{ asset('storage/public/photos/hangbird.jpg') }}" alt="Background" 
                    class="absolute inset-0 w-full h-full object-cover">
            </div> --}}

            <div id="passage-container" class="text-cream text-2xl font-medium mb-6"></div>

            <div id="question-container" class="text-center">
            <p id="question" class="text-gold text-xl font-bold mb-4"></p>
            <p id="timer" class="mt-2">Time left: 60</p>
            </div>
        </div>
    </main>

    <div class="flex justify-center gap-4 mb-10">
        <button class="answer-btn btn-gradient text-dark px-6 py-3 rounded-full" data-choice="A">A</button>
        <button class="answer-btn btn-gradient text-dark px-6 py-3 rounded-full" data-choice="B">B</button>
        <button class="answer-btn btn-gradient text-dark px-6 py-3 rounded-full" data-choice="C">C</button>
        <button class="answer-btn btn-gradient text-dark px-6 py-3 rounded-full" data-choice="D">D</button>
    </div>

    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="next-btn" class="btn-gradient">Next Level</button>
    </div>

    <footer class="bg-footer-gradient py-6">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN. Designed with passion and creativity.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const levels = {
                easy: {
                    1: {
                        text: 'Once upon a time in a faraway land, there was a small village surrounded by lush forests and sparkling rivers...',
                        question: 'What was the village surrounded by?',
                        options: ['A. A desert and mountains', 'B. A bustling city', 'C. Lush forests and sparkling rivers', 'D. Endless plains'],
                        answer: 'C',
                    },
                    2: {
                        text: 'The villagers were kind and hardworking, living in harmony with nature.',
                        question: 'What describes the villagers?',
                        options: ['A. Lazy and selfish', 'B. Kind and hardworking', 'C. Nomadic hunters', 'D. Adventurous travelers'],
                        answer: 'B',
                    },
                }
            };
    
            const category = "{{ $category }}"; 
            let level = parseInt("{{ $level }}");
            let timeLeft = 60;
            let score = 0;
            let interactievNovelScore = {{$player->scores->interactive_novel_score}};

            const playerId = {{$player->id}}; 
            const passageContainer = document.getElementById('passage-container');
            const questionElement = document.getElementById('question');
            const answerButtons = document.querySelectorAll('.answer-btn');
            const timerElement = document.getElementById('timer');
            const scoreElement = document.getElementById('score');
            const popup = document.getElementById('popup');
            const popupContent = document.getElementById('popup-content');
            const nextBtn = document.getElementById('next-btn');
    
            let timer;
    
            function getLevelData() {
                return levels[category][level];
            }
    
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = seconds % 60;
                return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
            }
    
            function startTimer() {
                timerElement.textContent = `Time left: ${timeLeft}`;
                timer = setInterval(() => {
                    timeLeft--;
                    timerElement.textContent = `Time left: ${timeLeft}`;
                    if (timeLeft <= 0) {
                        clearInterval(timer);
                    }
                }, 1000);
            }
    
            function displayLevel() {
                const levelData = getLevelData();
                passageContainer.textContent = levelData.text;
                questionElement.textContent = levelData.question;
                answerButtons.forEach((btn, index) => {
                    btn.textContent = levelData.options[index];
                });
                timeLeft = 60;
                startTimer();
            }
    
            function checkAnswer(choice) {
                clearInterval(timer);
                const levelData = getLevelData(); 
    
                if (choice === levelData.answer) {
                    score = timeLeft * 5;
                    interactievNovelScore += score;
                    scoreElement.textContent = `Score: ${interactievNovelScore}`;
                    popupContent.textContent = `Correct! +${score} points.`;
                    updateScores(playerId, score, category, level);
                } else {
                    popupContent.textContent = 'Incorrect!';
                }
    
                popup.style.display = 'block';
            }
    
            function updateScores(playerId, score, category, level) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                fetch('/increment/interactive-novel/score', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        player_id: playerId,
                        interactive_novel_score: score,
                        category: category,
                        level: level,
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Score updated:', data.new_interactive_novel_score);
                        } else {
                            console.error('Error updating score:', data.error);
                        }
                    })
                    .catch(err => console.error('Error:', err));
            }
    
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

                const newUrl = `/interactive-novel/${category}/${level}`;
                window.location.href = newUrl;
            });
    
            answerButtons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    const choice = btn.getAttribute('data-choice');
                    checkAnswer(choice);
                });
            });
    
            displayLevel();
        });
    </script>    
</body>
</html>
