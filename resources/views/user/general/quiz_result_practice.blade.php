<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results - Linguana</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .pop-in { animation: popIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="bg-[#e4fbfe] min-h-screen flex flex-col font-sans text-slate-800">

    <main class="flex-grow w-full flex flex-col items-center justify-center p-4 md:p-6 pop-in">
        
        <div class="text-center mb-6">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-2">Excellent Work!</h1>
            <p class="text-sm md:text-base text-slate-500 font-medium">Practice Quiz — Everyday Conversations</p>
        </div>

        <div class="relative flex items-center justify-center mb-8">
            <div class="w-36 h-36 md:w-40 md:h-40 rounded-full border-[10px] border-[#48b8b8] flex flex-col items-center justify-center shadow-lg shadow-[#48b8b8]/10 bg-white/50 backdrop-blur-sm">
                <span class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-1">{{ $score }}</span>
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Score</span>
            </div>
        </div>

        <div class="flex items-center justify-center gap-4 w-full max-w-md mx-auto mb-8">
            
            <div class="bg-white rounded-2xl p-4 w-1/2 text-center shadow-sm border border-slate-100">
                <h3 class="text-2xl font-extrabold text-slate-800 mb-1">{{ $correct }} / {{ $total }}</h3>
                <p class="text-xs font-medium text-slate-500">Correct</p>
            </div>

            <div class="bg-white rounded-2xl p-4 w-1/2 text-center shadow-sm border border-slate-100">
                <h3 class="text-2xl font-extrabold text-[#48b8b8] mb-1">+{{ $xp }}</h3>
                <p class="text-xs font-medium text-slate-500">XP Earned</p>
            </div>

        </div>

        <div class="w-full max-w-3xl bg-white/60 rounded-2xl p-4 mb-8 text-center border border-[#82c9c9]/30">
            <p class="text-sm md:text-base font-semibold text-[#3ca0a0]">
               @if($score >= 80)
                    "You've truly mastered this material! Keep up the great pace and accuracy!"
                @elseif($score >= 50)
                    "Good effort! You're getting the hang of it. A little more practice and you'll be perfect!"
                @else
                    "Don't give up! Review the materials and try again. You can definitely do this!"
                @endif
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 w-full max-w-2xl">
            
            <a href="{{ route('user.general.flashcard', $sub_module_id) }}" class="w-full sm:w-auto px-6 py-3.5 border-2 border-[#88cfd8] rounded-xl font-bold text-slate-700 hover:bg-slate-50 transition-colors flex items-center justify-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Retry Quiz
            </a>

            <a href="{{ route('user.general.dashboard') }}" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-[#cbf4f4] text-slate-700 hover:bg-[#88e1ed] font-bold transition-colors flex items-center justify-center text-sm shadow-sm">
                Back to Dashboard
            </a>

            <a href="{{ route('user.general.sub-module', $module_id) }}" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-[#48b8b8] text-white font-bold hover:bg-[#3ca0a0] transition-colors shadow-lg shadow-[#48b8b8]/30 flex items-center justify-center gap-2 text-sm">
                Continue
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const finishSound = new Audio('/sounds/level_up.wav');
            
            finishSound.play().catch(function(error) {
                console.log('Autoplay dicegah oleh browser:', error);
            });
        });
    </script>

</body>
</html>