<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Novel Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
  
</head>
<body class="bg-body-gradient text-cream min-h-screen flex flex-col justify-between">

    <div class="absolute top-4 left-4 fade-in">
        <button onclick="window.location='{{ route('dashboard') }}'"
            class="btn-gradient text-dark py-2 px-4 rounded-full shadow-lg flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
            </svg>
            <span>Back</span>
        </button>
    </div>

    <header class="bg-header-gradient shadow-lg py-6 fade-in">
        <div class="container mx-auto px-6 flex flex-col items-center">
            <h1 class="text-gold text-4xl font-extrabold uppercase tracking-wide">
                {{ ucfirst($category) }} Levels
            </h1>
            <div class="mt-4 flex justify-center space-x-4">
                <button onclick="window.location.href='{{ route('interactive-novel.categories') }}'" class="btn-gradient text-dark py-2 px-6 rounded-full shadow-lg">
                    Categories
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 fade-in">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
            @for ($i = 1; $i <= 5; $i++)
                <div 
                    class="card bg-header-gradient shadow-lg rounded-lg p-4 text-center text-gold font-bold text-2xl cursor-pointer transform transition 
                           {{ $progress->interactive_novel_level_unlocked($category, $i) ? '' : 'locked' }}"
                    data-level="{{ $i }}">
                    {{ $i }}
                </div>
            @endfor
        </div>
    </main>

    <footer class="bg-footer-gradient py-4 fade-in">
        <div class="container mx-auto text-center">
            <p class="text-gold">&copy; 2025 PEP7.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.card').forEach(levelEl => {
            const category = "{{ $category }}";

            levelEl.addEventListener('click', function () {
                if (this.classList.contains('locked')) {
                    alert('Complete previous levels first!');
                    return;
                }
                const level = this.getAttribute('data-level');
                window.location.href = `/interactive-novel/${category}/${level}`;
            });
        });
    </script>
</body>
</html>
