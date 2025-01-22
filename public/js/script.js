const chapters = document.querySelectorAll('.chapter');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

let currentChapter = 0;

function updateChapters() {
    chapters.forEach((chapter, index) => {
        chapter.classList.toggle('active', index === currentChapter);
    });
    if (currentChapter === 0) {
        prevButton.style.display = 'none'; 
    }
    else 
    {
        prevButton.style.display = 'block'; 
    }

    if (currentChapter === chapters.length - 1) 
    {
        nextButton.style.display = 'none'; 
    } 
    else 
    {
        nextButton.style.display = 'block'; 
    }
}

prevButton.addEventListener('click', () => {
  if (currentChapter > 0) {
    currentChapter--;
    updateChapters();
  }
});

nextButton.addEventListener('click', () => {
  if (currentChapter < chapters.length - 1) {
    currentChapter++;
    updateChapters();
  }
});

updateChapters();