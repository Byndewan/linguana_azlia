<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Quiz - Linguana</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#e4fbfe] h-screen flex flex-col font-sans overflow-hidden text-slate-800">

    <main class="flex-grow flex flex-col items-center justify-center p-6 md:p-8 w-full relative">
        
        <!-- Wadah Soal -->
        <div class="w-full max-w-4xl relative h-[80vh]">
            
            @foreach($quizItems as $index => $item)
                
                <div class="quiz-slide absolute inset-0 w-full transition-opacity duration-300 {{ $index == 0 ? 'opacity-100 z-10 pointer-events-auto' : 'opacity-0 z-0 pointer-events-none' }}" id="slide-{{ $index }}">
                    
                    @if($item->type == 'fill_blank_mc')
                        @include('user.general.fill_blank_mc', ['data' => $item])

                    @elseif($item->type == 'fill_blank_input')
                        @include('user.general.fill_blank_input', ['data' => $item])

                    @elseif($item->type == 'listen_select')
                        @include('user.general.listen_and_select', ['data' => $item])

                    @elseif($item->type == 'listen_type')
                        @include('user.general.listen_and_type', ['data' => $item])
                    @endif

                </div>

            @endforeach

        </div>

    </main>

    <!-- Tombol Navigasi Master -->
    <div class="w-full fixed bottom-0 left-0 p-6 flex justify-between items-center bg-white border-t border-slate-200 z-50">
        <button onclick="prevQuiz()" class="px-6 py-3 rounded-2xl border-2 border-[#82c9c9] text-[#48b8b8] font-bold hover:bg-[#e6f4f4] transition-colors">
            Previous
        </button>
        
        <button onclick="nextQuiz()" class="px-8 py-3 rounded-2xl bg-[#48b8b8] text-white font-bold hover:bg-[#3ca0a0] transition-colors shadow-md">
            Next
        </button>
    </div>

    <!-- Script Master untuk ganti soal -->
    <script>
        let currentQuiz = 0;
        const totalQuizzes = {{ count($quizItems) }};

        function nextQuiz() {
            if (currentQuiz < totalQuizzes - 1) {
                // Sembunyikan soal sekarang
                const currentSlide = document.getElementById('slide-' + currentQuiz);
                currentSlide.classList.replace('opacity-100', 'opacity-0');
                currentSlide.classList.replace('z-10', 'z-0');
                currentSlide.classList.replace('pointer-events-auto', 'pointer-events-none');
                
                // Munculkan soal berikutnya
                currentQuiz++;
                const nextSlide = document.getElementById('slide-' + currentQuiz);
                nextSlide.classList.replace('opacity-0', 'opacity-100');
                nextSlide.classList.replace('z-0', 'z-10');
                nextSlide.classList.replace('pointer-events-none', 'pointer-events-auto');
            } else {
                alert('Selamat! Semua soal latihan sudah selesai.');
                // Di sini nanti arahkan kembali ke halaman list Sub Modul atau skor
                window.location.href = '/user/dashboard'; 
            }
        }

        function prevQuiz() {
            if (currentQuiz > 0) {
                const currentSlide = document.getElementById('slide-' + currentQuiz);
                currentSlide.classList.replace('opacity-100', 'opacity-0');
                currentSlide.classList.replace('z-10', 'z-0');
                currentSlide.classList.replace('pointer-events-auto', 'pointer-events-none');
                
                currentQuiz--;
                const prevSlide = document.getElementById('slide-' + currentQuiz);
                prevSlide.classList.replace('opacity-0', 'opacity-100');
                prevSlide.classList.replace('z-0', 'z-10');
                prevSlide.classList.replace('pointer-events-none', 'pointer-events-auto');
            }
        }
        
        // Letakkan fungsi playAudio di master agar bisa dipakai semua jenis soal
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