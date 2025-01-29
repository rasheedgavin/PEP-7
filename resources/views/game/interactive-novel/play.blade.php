<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Interactive Novel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="absolute top-4 left-4">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="flex items-center px-4 py-2 space-x-2 rounded-full btn-gradient text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z" />
            </svg>
            <span>Back</span>
        </button>
    </div>

    <header class="py-6 bg-header-gradient">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold tracking-wide uppercase text-gold">Interactive Novel</h1>
            <h2 class="mt-2 text-3xl font-bold">{{ ucfirst($category) }} - Level {{ $level }}</h2>
            <div id="score" class="mt-2">Score: <span class="font-extrabold text-gold">{{$player->scores->interactive_novel_score}}</span></div>
        </div>
    </header>

    <main class="flex items-center justify-center flex-1">
        <div id="game-container" class="w-full max-w-4xl p-6 rounded-lg shadow-lg bg-header-gradient">
            {{-- <div id="display-case" class="relative w-full h-64 mb-6 overflow-hidden rounded-lg">
                <img id="background-image" src="{{ asset('storage/public/photos/hangbird.jpg') }}" alt="Background"
                    class="absolute inset-0 object-cover w-full h-full">
            </div> --}}

            <div id="passage-container" class="mb-6 text-2xl font-medium text-cream"></div>

            <div id="question-container" class="text-center">
            <p id="question" class="mb-4 text-xl font-bold text-gold"></p>
            <p id="timer" class="mt-2">Time left: 60</p>
            </div>
        </div>
    </main>

    <div class="flex justify-center gap-4 mb-10">
        <button class="px-6 py-3 rounded-full answer-btn btn-gradient text-dark" data-choice="A">A</button>
        <button class="px-6 py-3 rounded-full answer-btn btn-gradient text-dark" data-choice="B">B</button>
        <button class="px-6 py-3 rounded-full answer-btn btn-gradient text-dark" data-choice="C">C</button>
        <button class="px-6 py-3 rounded-full answer-btn btn-gradient text-dark" data-choice="D">D</button>
    </div>

    <div id="popup" class="popup">
        <div id="popup-content"></div>
        <button id="next-btn" class="btn-gradient">Next Level</button>
    </div>

    <footer class="py-6 bg-footer-gradient">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP SEVEN.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const levels = {
                easy: {
                    1: {
                        question: 'Ano ang kaharian ang pinamumunuan nina Don Fernando at Donya Valeriana?',
                        options: ['A. Armenya', 'B. Persya', 'C. Inglatera', 'D. Berbanya'],
                        answer: 'D',
                    },
                    2: {
                        question: 'Ano ang mahiwagang ibon ang makakapagpagaling sa malubhang sakit ni Don Fernando?',
                        options: ['A. Phoenix', 'B. Adarna', 'C. Kalapati', 'D. Agila'],
                        answer: 'B',
                    },
                    3: {
                        question: 'Sino ang Prinsesa ng kahariang Reyno delos Cristales na napangasawa ni Don Juan?',
                        options: ['A. Maria Blanca', 'B. Juana', 'C. Isabel', 'D. Leonora'],
                        answer: 'A',
                    },
                    4: {
                        question: 'Sino ang unang inibig ni Don Juan?',
                        options: ['A. Maria Blanca', 'B. Juana', 'C. Isabel', 'D. Leonora'],
                        answer: 'B',
                    },
                    5: {
                        question: 'Saan naghari si Don Juan sa huli?',
                        options: ['A. Berbanya', 'B. Armenya', 'C. Reyno delos Cristales', 'D. Inglatera'],
                        answer: 'C',
                    }
                },

                medium: {
                    1: {
                        question: 'Sino ang tinutukoy ni Donya Juana na malupit na nagbabantay ng magandang hardin sa Armenya?',
                        options: ['A. Ang Higante', 'B. Ang Unano', 'C. Si Don Pedro', 'D. Ang Serpyente'],
                        answer: 'A',
                    },
                    2: {
                        question: 'Saan matatagpuan ang Ibong Adarna?',
                        options: ['A. Sa bundok ng Tabor', 'B. Sa balon', 'C. Sa puno ng Piedras Platas', 'D. Sa sanga'],
                        answer: 'C',
                    },
                    3: {
                        question: 'Gaano katagal ang inabot ni Don Pedro upang tuluyang matunton ang daan paakyat sa bundok ng Tabor?',
                        options: ['A. 5 buwan', 'B. 3 buwan', 'C. 1 taon', 'D. 9 na buwan'],
                        answer: 'B',
                    },
                    4: {
                        question: 'Anong ibon ang sinakyan ni Don Juan patungo sa kaharian ng Reyno delos Cristales?',
                        options: ['A. Adarna', 'B. Agila', 'C. Palkon', 'D. Phoenix'],
                        answer: 'B',
                    },
                    5: {
                        question: 'Ano ang nangyayari sa ibong adarna sa tuwing umaawit ito?',
                        options: ['A. Nagpapalit ng anyo ang mga balahibo nito', 'B. Naging maaninag ang mga balahibo nito', 'C. Nag-aapoy ang mga balahibo nito', 'D. Nagpapalit ng kulay ang mga balahibo nito'],
                        answer: 'D',
                    }
                },

                hard: {
                    1: {
                        question: 'Ano ang naging dahilan ng pagkabigo nina Don Pedro at Don Diego sa paghuli sa mahiwagang ibon?',
                        options: ['A. Naging bato sila dahil natapakan nila ang dumi nito.', 'B. Naging bato sila dahil hindi magandang tinig ang kanilang narinig.', 'C. Naging bato sila dahil nadapuan sila ng dumi nito.', 'D. Naging bato sila dahil nakita nila ang mga mata nito.'],
                        answer: 'A',
                    },
                    2: {
                        question: 'Ano ang ginawa ni Prinsesa Maria Blanca upang hindi na sila tuluyang maabutan ng hari sa paghabol sa kanilang magkasintahan?',
                        options: ['A. Naghulog siya ng mga karayom na agad naging bakal na tinik.', 'B. Naghulog siya ng mga buhangin na agad naging madulas na putikan.', 'C. Inilaglag niya ang kaniyang sabon upang maging bundok ang patag na daan.', 'D. Inilaglag niya ang kohe na kaniyang dala at naging isang karagatan ang dating tuyot na lupa.'],
                        answer: 'D',
                    },
                    3: {
                        question: 'Ano ang nabangungutan ni Haring Fernando?',
                        options: ['A. PInaslang ang kaniyang asawa', 'B. Naging bato sina Don Pedro at Don DIego', 'C. Walang nakahanap ng lunas sa kaniyang sakit', 'D. Pinatay si Don Juan ng kaniyang mga kapatid'],
                        answer: 'D',
                    },
                    4: {
                        question: 'Sino ang nagligtas at naggamot kay Don Juan matapos siyang pagtaksilan at bugbugin ng kaniyang mga kapatid?',
                        options: ['A. Prinsesa Isabela', 'B. Ibong Adarna', 'C. Matandang Ermitanyo', 'D. Batang Unano'],
                        answer: 'C',
                    },
                    5: {
                        question: 'Ano ang nakita ni Don Juan sa pinakailalim ng balon?',
                        options: ['A. Tumpok ng mga ginto, pilak at diyamante', 'B. Magandang Hardin', 'C. Walang hanggang kadiliman', 'D. Ang puno kung saan naninirahan ang ibong adarna'],
                        answer: 'B',
                    }
                },
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
                if (level > 5) {
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
