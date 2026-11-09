<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head tetap sama seperti desain aslimu -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Card - Linguana</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .perspective-1000 { perspective: 1000px; }
        .transform-style-3d { transform-style: preserve-3d; }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }
    </style>
</head>
<body class="bg-[#d6f8fc] h-screen flex flex-col font-sans overflow-hidden text-slate-800">

    <main class="flex-grow flex flex-col items-center justify-center p-6 md:p-8 overflow-y-auto relative">
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900 mb-2">Flash Card</h1>
            <p class="text-slate-500 text-sm md:text-base">Tap the card to reveal the translation</p>
        </div>

        @foreach($vocabularies as $index => $item)
            
            <div id="slide-{{ $index }}" class="w-full max-w-3xl flex flex-col items-center {{ $index == 0 ? 'block' : 'hidden' }}">
                
                <!-- Area Kartu -->
                <div class="w-full aspect-[16/9] md:aspect-[2/1] perspective-1000 cursor-pointer select-none" onclick="toggleFlip({{ $index }})">
                    <div id="flashcard-{{ $index }}" class="relative w-full h-full transition-transform duration-500 transform-style-3d">
                        
                        <!-- Sisi Depan (Bahasa Asing) -->
                        <div class="absolute inset-0 bg-white rounded-[2rem] shadow-sm flex flex-col items-center justify-center p-8 border border-slate-100 backface-hidden">
                            <button onclick="event.stopPropagation(); playAudio('{{ addslashes($item->word) }}', '{{ $item->language_code }}');" class="cursor-pointer absolute top-6 right-6 p-3 rounded-full bg-slate-50 text-slate-400 hover:text-[#55BCC9] focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z"></path></svg>
                            </button>
                            <h2 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-4 text-center">{{ $item->word }}</h2>
                        </div>

                        <!-- Sisi Belakang (Terjemahan) -->
                        <div class="absolute inset-0 bg-[#f8ffff] rounded-[2rem] shadow-md flex flex-col items-center justify-center p-8 border-2 border-[#55BCC9] backface-hidden rotate-y-180">
                            <button onclick="event.stopPropagation(); playAudio('{{ addslashes($item->meaning) }}', 'en-US');" class="cursor-pointer absolute top-6 right-6 p-3 rounded-full bg-white text-[#55BCC9] focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z"></path></svg>
                            </button>
                            <h2 class="text-4xl md:text-6xl font-extrabold text-[#2caebf] mb-4 text-center">{{ $item->meaning }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div id="actions-{{ $index }}" class="flex gap-4 w-full mt-8 opacity-0 pointer-events-none transition-opacity duration-500">
                    <button onclick="toggleFlip({{ $index }})" class="cursor-pointer flex-1 py-4 border-2 border-[#60ccda] text-slate-700 font-bold rounded-2xl hover:bg-slate-50">
                        Again
                    </button>
                    <button onclick="nextCard({{ $index }})" class="cursor-pointer flex-1 py-4 bg-[#55BCC9] text-white font-bold rounded-2xl hover:bg-[#2caebf]">
                        I got it!
                    </button>
                </div>

            </div>

        @endforeach

    </main>

    <script>
    const totalCards = {{ count($vocabularies) }};
    const subModuleId = {{ $sub_module_id }};

    // Ambil posisi flashcard terakhir dari sessionStorage, jika kosong mulai dari 0
    let currentCardIndex = parseInt(sessionStorage.getItem('ling_current_fc_' + subModuleId)) || 0;

    // Jalankan saat halaman pertama kali dimuat untuk menyesuaikan slide aktif
    document.addEventListener("DOMContentLoaded", function() {
        for (let i = 0; i < totalCards; i++) {
            const slide = document.getElementById('slide-' + i);
            if (slide) {
                slide.classList.replace('block', 'hidden');
            }
        }

        // Tampilkan slide sesuai posisi terakhir sebelum di-refresh
        const activeSlide = document.getElementById('slide-' + currentCardIndex);
        if (activeSlide) {
            activeSlide.classList.replace('hidden', 'block');
        } else {
            // Jaga-jaga jika index melebihi total karena perubahan data, reset ke 0
            currentCardIndex = 0;
            const firstSlide = document.getElementById('slide-0');
            if (firstSlide) firstSlide.classList.replace('hidden', 'block');
        }
    });

    function toggleFlip(index) {
        const card = document.getElementById('flashcard-' + index);
        const actions = document.getElementById('actions-' + index);
        
        card.classList.toggle('rotate-y-180');
        
        if(card.classList.contains('rotate-y-180')) {
            actions.classList.remove('opacity-0', 'pointer-events-none');
            actions.classList.add('opacity-100');
        } else {
            actions.classList.add('opacity-0', 'pointer-events-none');
            actions.classList.remove('opacity-100');
        }
    }

    function nextCard(currentIndex) {
        if (currentIndex < totalCards - 1) {
            document.getElementById('slide-' + currentIndex).classList.replace('block', 'hidden');
            
            const nextIndex = currentIndex + 1;
            document.getElementById('slide-' + nextIndex).classList.replace('hidden', 'block');
            
            // Simpan posisi kartu saat ini ke sessionStorage berdasarkan sub_module_id
            sessionStorage.setItem('ling_current_fc_' + subModuleId, nextIndex);
        } else {
            // Hapus session jika flashcard sudah selesai dan lanjut ke quiz
            sessionStorage.removeItem('ling_current_fc_' + subModuleId);
            window.location.href = `/general/quiz/${subModuleId}`; 
        }
    }

    function playAudio(text, langCode) {
        window.speechSynthesis.cancel();
        const speech = new SpeechSynthesisUtterance(text);
        speech.lang = langCode; 
        speech.rate = 0.9;
        window.speechSynthesis.speak(speech);
    }
</script>
</body>
</html>