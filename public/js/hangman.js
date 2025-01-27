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
        levels:  {
            easy: {
                1: { word: 'adarna', description: 'Isang mahiwagang ibon na may kakayahang magpagaling ng anumang sakit sa pamamagitan ng kanyang nakakaengganyong awit.' },
                2: { word: 'berbanya', description: 'Ang kaharian ng mga pangunahing tauhan, pinamumunuan nina Haring Fernando at Reyna Valeriana.' },
                3: { word: 'habilin', description: 'Ang mga bilin o utos na iniwan ng isang mahalagang tao.' },
                4: { word: 'albanya', description: 'Isa pang kaharian na madalas na binabanggit bilang karatig ng Berbanya.' },
                5: { word: 'tinudla', description: 'Isang kilos ng pagpanâ o pagtama sa isang bagay gamit ang matalim na sandata tulad ng sibat o pana.' },
                6: { word: 'nagusal', description: 'Ang pagsasabi o pagbibigkas ng mga panalangin o dasal na puno ng taimtim na hangarin.' },
                7: { word: 'marilag', description: 'Tumutukoy sa kagandahan at kariktan na umaakit sa sinumang tumitingin.' },
                8: { word: 'maharlika', description: 'Nagsasaad ng pagiging marangal o may mataas na antas sa lipunan noong sinaunang panahon.' },
                9: { word: 'hilakbot', description: 'Damdamin ng matinding takot na dulot ng isang hindi inaasahang pangyayari.' },
                10: { word: 'panibugho', description: 'Ang malalim na anyo ng selos o inggit, na nagdudulot ng poot sa ibang tao.' },
                11: { word: 'talim', description: 'Matulis at matalas na bahagi ng anumang bagay, kadalasang ginagamit bilang sandata.' },
                12: { word: 'mahiwaga', description: 'Naglalarawan ng isang bagay na hindi maipaliwanag o labis na misteryoso.' },
                13: { word: 'kalatas', description: 'Tumutukoy sa isang mensahe o liham na ipinapadala upang magbigay ng mahalagang balita.' },
                14: { word: 'paglalakbay', description: 'Isang mahaba at mapanganib na pagpunta sa malalayong lugar upang tuparin ang isang misyon.' },
                15: { word: 'paguumapaw', description: 'Pagkakaroon ng sobra o lagpas sa inaasahang dami, tulad ng emosyon o tubig.' }
            },
            medium: {
                1: { word: 'masangsang', description: 'Isang hindi kaaya-ayang amoy na nakakairita sa pang-amoy.' },
                2: { word: 'pangarapin', description: 'Isang marubdob na pagnanasa o hangarin na abutin ang isang layunin.' },
                3: { word: 'ipinagkanulo', description: 'Ang pagkilos ng pagtaksil o paglilinlang sa isang tao o grupo.' },
                4: { word: 'liyag', description: 'Isang salita para sa minamahal o iniibig.' },
                5: { word: 'makaliligtas', description: 'Kakayahang makaiwas sa anumang panganib o kapahamakan.' },
                6: { word: 'panghihinayang', description: 'Pagsisisi na dulot ng pagkawala ng pagkakataon o mahalagang bagay.' },
                7: { word: 'sinagoga', description: 'Isang banal na lugar ng pagsamba na madalas ginagamit bilang kanlungan.' },
                8: { word: 'naganyaya', description: 'Pagkilos ng pag-imbita sa iba upang dumalo sa isang mahalagang okasyon.' },
                9: { word: 'tinugon', description: 'Pagsagot sa tanong o pagtugon sa isang panawagan.' },
                10: { word: 'kariktan', description: 'Kakaibang kagandahan na kapansin-pansin at kahanga-hanga.' },
                11: { word: 'kasamaan', description: 'Mga kilos na labag sa kagandahang-asal o moralidad.' },
                12: { word: 'kasawian', description: 'Ang karanasan ng kabiguan o matinding kamalasan sa buhay.' },
                13: { word: 'kaligayahan', description: 'Matinding tuwa na nararamdaman mula sa tagumpay o magandang karanasan.' },
                14: { word: 'masukal', description: 'Mataba at makapal na lugar na puno ng halaman o gubat.' },
                15: { word: 'naglalayag', description: 'Isang paglalakbay sa karagatan gamit ang bangka o barko.' }
            },
            hard: {
                1: { word: 'nagmumuni', description: 'Pag-iisip nang malalim upang pagnilayan ang mga pangyayari.' },
                2: { word: 'mapanglaw', description: 'Kalungkutan na dulot ng katahimikan o pagkawala.' },
                3: { word: 'piedrasplatas', description: 'Isang mahiwagang puno na may kumikinang na pilak na dahon, tahanan ng Ibong Adarna.' },
                4: { word: 'mapagmataas', description: 'Pagkilos na nagpapakita ng kayabangan o pagiging hambog.' },
                5: { word: 'kawal', description: 'Sundalo na naglilingkod bilang tagapagtanggol ng kaharian.' },
                6: { word: 'nasiphayo', description: 'Nawalan ng pag-asa o nadismaya dahil sa kabiguan.' },
                7: { word: 'masilakbo', description: 'Biglaan at marahas na damdamin tulad ng galit o pagnanasa.' },
                8: { word: 'tampok', description: 'Isang bagay o tao na kilala o nagbibigay ng pansin.' },
                9: { word: 'pagayop', description: 'Pagpapakita ng paghamak o pag-alipusta sa iba.' },
                10: { word: 'pagyuko', description: 'Pagpapakumbaba o pagsuko sa isang mas mataas na kapangyarihan.' },
                11: { word: 'lilo', description: 'Isang tao na traydor o taksil.' },
                12: { word: 'panata', description: 'Isang pangako o taimtim na panalangin para sa isang hangarin.' },
                13: { word: 'takipsilim', description: 'Oras ng dapithapon bago lubusang dumilim ang paligid.' },
                14: { word: 'pagkamuhi', description: 'Matinding galit o poot sa isang tao o bagay.' },
                15: { word: 'pighati', description: 'Matinding lungkot o dalamhati na dulot ng malalim na sugat sa damdamin.' }
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

        gameState.player.image.src = imageUrl;
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
            gameState.player.y -= 15;
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
