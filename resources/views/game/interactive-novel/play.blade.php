<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Interactive Novel with Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        #game-container {
            margin-top: 20px;
        }

        #display-case {
            position: relative;
            width: 800px;
            height: 400px;
            margin: 0 auto;
            border: 2px solid #000;
            overflow: hidden;
            background-color: #fff;
        }

        .display-image {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #passage-container, #question-container {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .answer-options {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .answer-btn {
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #timer, #score {
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
    <h1>Interactive Novel with Quiz</h1>
    <button onclick="window.location.href='{{ route('dashboard') }}'">Home</button>
    <button onclick="window.location.href='{{ route('interactive-novel.levels', compact('category', 'level')) }}'">Back</button>

    <div id="game-container">
        <div id="display-case">
            <img id="background-image" src="path/to/background-image.jpg" alt="Background" class="display-image">
            <img id="character-image" src="path/to/character-image.png" alt="Character" class="display-image">
        </div>
        <div id="passage-container"></div>
        <div id="question-container">
            <p id="question"></p>
            <div class="answer-options">
                <button class="answer-btn" data-choice="A">A</button>
                <button class="answer-btn" data-choice="B">B</button>
                <button class="answer-btn" data-choice="C">C</button>
                <button class="answer-btn" data-choice="D">D</button>
            </div>
        </div>
        <div id="timer">Time left: 60</div>
        <div id="score">Score: {{$player->scores->interactive_novel_score}} </div>
    </div>

    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="next-btn">Next Level</button>
    </div>

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
