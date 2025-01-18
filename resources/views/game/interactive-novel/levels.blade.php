<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Levels</title>
    <style>
        .levels {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            max-width: 600px;
            margin: 0 auto;
        }
        .level {
            padding: 10px;
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            background: #fff;
        }
        .level.locked {
            background: #f0f0f0;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>{{ ucfirst($category) }} Levels</h1>
    <button onclick="window.location.href='{{ route('dashboard') }}'">home</button>
    <button onclick="window.location.href='{{ route('interactive-novel.categories', compact('category')) }}'">back</button>
    <div class="levels">
        @for ($i = 1; $i <= 5; $i++)
            <div 
                class="level {{ $progress->interactive_novel_level_unlocked($category, $i) ? '' : 'locked' }}" 
                data-level="{{ $i }}">
                {{ $i }}
            </div>
        @endfor
    </div>    
    <script>
        document.querySelectorAll('.level').forEach(levelEl => {
            const category = "{{ $category }}"

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
