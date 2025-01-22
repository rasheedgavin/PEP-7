<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One-Page Novel</title>
</head>
<body>
  <div class="container">
    <div class="chapter active" id="chapter1">
      <h2>Chapter 1: The Discovery</h2>
      <p>Elias found the journal in his grandfather’s workshop. A clock that could turn back time? It seemed impossible.</p>
    </div>
    <div class="chapter" id="chapter2">
      <h2>Chapter 2: The Blueprint</h2>
      <p>The diagrams were precise, every cog and spring documented. He wondered if he could rebuild it.</p>
    </div>
    <div class="chapter" id="chapter3">
      <h2>Chapter 3: The Assembly</h2>
      <p>Late nights, aching fingers, and a heart full of hope—it was finally ready to test.</p>
    </div>
    <div class="chapter" id="chapter4">
      <h2>Chapter 4: The Test</h2>
      <p>Elias turned the key, and the room blurred. Moments later, he stood in the past, facing his younger self.</p>
    </div>
    <div class="chapter" id="chapter5">
      <h2>Chapter 5: The Cost</h2>
      <p>Time had not forgotten its rules. He returned, only to find the journal gone and his past unchanged.</p>
    </div>
    <div class="chapter" id="chapter6">
      <h2>Chapter 6: The Truth</h2>
      <p>Elias understood now: time cannot be rewritten, only lived. He locked the clock away forever.</p>
    </div>
  </div>

  <div class="buttons">
    <button id="prev" disabled>Previous</button>
    <button id="next">Next</button>
  </div>

  <script>
    const chapters = document.querySelectorAll('.chapter');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    let currentChapter = 0;

    function updateChapters() {
      chapters.forEach((chapter, index) => {
        chapter.classList.toggle('active', index === currentChapter);
      });
      prevButton.disabled = currentChapter === 0;
      nextButton.disabled = currentChapter === chapters.length - 1;
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
  </script>
</body>
</html>
