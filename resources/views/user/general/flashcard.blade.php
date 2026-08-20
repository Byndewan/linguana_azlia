<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Card - Linguana</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .perspective-1000 { perspective: 1000px; }
        .transform-style-3d { transform-style: preserve-3d; }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }
    </style>
</head>
<body class="bg-[#d6f8fc] h-screen flex flex-col font-sans overflow-hidden text-slate-800">

    <!-- ================= HEADER ================= -->
    {{-- <header class="bg-white border-b border-slate-50 px-6 py-4 flex items-center justify-between shrink-0">
        
        <!-- Kiri: Tombol Close & Progress -->
        <div class="flex items-center gap-6">
            <!-- Tombol X (Close) -->
            <button class="text-slate-400 hover:text-slate-800 transition-colors p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <!-- Progress Bar Info -->
            <div class="flex flex-col gap-1.5 mt-1">
                <!-- Baris Progress -->
                <div class="flex items-center gap-2">
                    <div class="w-12 h-1.5 bg-slate-900 rounded-full"></div>
                    <div class="w-12 h-1.5 bg-slate-200 rounded-full"></div>
                    <div class="w-12 h-1.5 bg-slate-200 rounded-full"></div>
                    <div class="w-12 h-1.5 bg-slate-200 rounded-full"></div>
                    <div class="w-12 h-1.5 bg-slate-200 rounded-full"></div>
                </div>
                <!-- Teks Step -->
                <span class="text-xs font-bold text-slate-400">Flash Card • Step 1 of 5</span>
            </div>
        </div>

        <!-- Kanan: Timer & XP Badge -->
        <div class="flex items-center gap-3">
            <!-- Timer Badge -->
            <div class="flex items-center gap-2 bg-slate-100 text-slate-700 px-4 py-2 rounded-full font-bold text-sm">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                </svg>
                1:45
            </div>
            
            <!-- XP Badge -->
            <div class="flex items-center gap-2 bg-slate-100 text-slate-700 px-4 py-2 rounded-full font-bold text-sm">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                +45 XP
            </div>
        </div>
    </header> --}}

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow flex flex-col items-center justify-center p-6 md:p-12 overflow-y-auto">
        
        <!-- Judul Instruksi -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900 mb-2">Flash Card</h1>
            <p class="text-slate-500 text-sm md:text-base">Tap the card to reveal the translation</p>
        </div>

        <div class="w-full max-w-3xl aspect-[16/9] md:aspect-[2/1] perspective-1000 cursor-pointer select-none mx-auto" onclick="toggleFlip()">
            
            <!-- Inner Card (Yang akan berputar) -->
            <div id="flashcard" class="relative w-full h-full transition-transform duration-500 transform-style-3d">
                
                <!-- Sisi Depan (Front) -->
                <div class="absolute inset-0 bg-white rounded-[2rem] shadow-sm flex flex-col items-center justify-center p-8 border border-slate-100 backface-hidden">
                    <h2 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-4 text-center">Buenos días</h2>
                    <p class="text-slate-400 font-medium text-sm md:text-base">Tap to reveal</p>
                </div>

                <!-- Sisi Belakang (Back) -->
                <div class="absolute inset-0 bg-[#f8ffff] rounded-[2rem] shadow-md flex flex-col items-center justify-center p-8 border-2 border-[#55BCC9] backface-hidden rotate-y-180">
                    <h2 class="text-4xl md:text-6xl font-extrabold text-[#2caebf] mb-4 text-center">Good morning</h2>
                    <p class="text-slate-500 font-medium text-sm md:text-base">Translation</p>
                </div>
                
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div id="action-buttons" class="flex items-center justify-center gap-4 w-full max-w-2xl mt-8 flex-col sm:flex-row opacity-0 pointer-events-none transition-opacity duration-500">
            
            <!-- Tombol "Again" -->
            <button class="w-full sm:flex-1 py-4 border-2 border-[#60ccda] bg-transparent text-slate-700 font-bold rounded-2xl flex items-center justify-center gap-2 hover:bg-slate-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Again
            </button>

            <!-- Tombol "I got it!" -->
            <button class="w-full sm:flex-1 py-4 bg-[#55BCC9] text-white font-bold rounded-2xl flex items-center justify-center gap-2 hover:bg-[#2caebf] transition-colors shadow-md">
                I got it!
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

    </main>

    <script>
    function toggleFlip() {
        const card = document.getElementById('flashcard');
        card.classList.toggle('rotate-y-180');
        
        const actionButtons = document.getElementById('action-buttons');
        actionButtons.classList.remove('opacity-0', 'pointer-events-none');
        actionButtons.classList.add('opacity-100');
    }
</script>

</body>
</html>