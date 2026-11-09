<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Practice Quiz - Linguana</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .fade-in { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-[#e4fbfe] h-screen w-full flex flex-col font-sans text-slate-800 overflow-hidden">

    <main class="flex-grow w-full overflow-y-auto flex flex-col p-4 md:p-8">
        
        <div class="flex-grow w-full max-w-2xl mx-auto flex flex-col justify-center items-center">
            
            @foreach($quizItems as $index => $item)
                <div class="quiz-slide w-full flex-col gap-4 fade-in {{ $index == 0 ? 'flex' : 'hidden' }}" id="slide-{{ $index }}" data-correct="{{ $item->correct_answer }}" data-type="{{ $item->type }}" data-id="{{ $item->id }}">
                    
                    <!-- Area Komponen Kuis -->
                    <div class="w-full shadow-sm rounded-3xl">
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

                    <!-- Area Feedback (Awalnya Sembunyi) -->
                    <div id="feedback-box-{{ $index }}" class="hidden w-full rounded-2xl p-4 text-center text-white font-bold transition-all mt-4">
                        <span id="feedback-text-{{ $index }}" class="text-lg"></span>
                        <p id="correct-answer-text-{{ $index }}" class="hidden text-sm font-medium mt-1 opacity-90"></p>
                    </div>

                    <!-- Area Navigasi -->
                    <div class="w-full flex items-center justify-between mt-2 px-1">
                        
                        <button onclick="prevQuiz()" class="cursor-pointer flex items-center gap-2 px-6 py-3 rounded-2xl border-2 border-[#82c9c9] text-[#48b8b8] font-semibold hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous
                        </button>
                        
                        <!-- Tombol Check (Muncul duluan) -->
                        <button id="btn-check-{{ $index }}" onclick="checkAnswer({{ $index }})" class="cursor-pointer flex items-center gap-2 px-8 py-3 rounded-2xl bg-[#55BCC9] text-white font-semibold hover:bg-[#46a8b5] transition-colors shadow-lg">
                            Check Answer
                        </button>

                        <!-- Tombol Next (Sembunyi sampai dijawab) -->
                        <button id="btn-next-{{ $index }}" onclick="nextQuiz()" class="cursor-pointer hidden items-center gap-2 px-8 py-3 rounded-2xl bg-[#48b8b8] text-white font-semibold hover:bg-[#3ca0a0] transition-colors shadow-lg shadow-[#48b8b8]/30">
                            Next
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    </main>

    <script>
    // 1. Ambil posisi kuis terakhir dari sessionStorage (jika ada, kalau tidak mulai dari 0)
    let currentQuiz = parseInt(sessionStorage.getItem('ling_current_quiz')) || 0;
    const totalQuizzes = {{ count($quizItems) }};

    let totalCorrect = parseInt(sessionStorage.getItem('ling_total_correct')) || 0;
    let totalXP = parseInt(sessionStorage.getItem('ling_total_xp')) || 0;

    // Simpan riwayat jawaban yang sudah di-submit agar tidak bisa diubah/dijawab ulang saat refresh
    let answeredQuestions = JSON.parse(sessionStorage.getItem('ling_answered_questions')) || {};

    // 2. Jalankan saat halaman pertama kali dimuat (menyesuaikan slide aktif & memulihkan jawaban)
    document.addEventListener("DOMContentLoaded", function() {
        // Sembunyikan semua slide terlebih dahulu
        for (let i = 0; i < totalQuizzes; i++) {
            const slide = document.getElementById('slide-' + i);
            if (slide) slide.classList.replace('flex', 'hidden');
        }

        // Tampilkan slide sesuai posisi terakhir sebelum refresh
        const activeSlide = document.getElementById('slide-' + currentQuiz);
        if (activeSlide) activeSlide.classList.replace('hidden', 'flex');

        // Pulihkan status soal-soal yang sudah terlanjur dicek/dijawab sebelum refresh
        for (let index in answeredQuestions) {
            restoreQuizState(parseInt(index), answeredQuestions[index]);
        }
    });

    // Fungsi untuk mengembalikan tampilan soal yang sudah dijawab agar tetap terkunci
    function restoreQuizState(index, data) {
        const slide = document.getElementById('slide-' + index);
        if (!slide) return;

        const itemId = slide.getAttribute('data-id');
        const type = slide.getAttribute('data-type');
        const feedbackBox = document.getElementById('feedback-box-' + index);
        const feedbackText = document.getElementById('feedback-text-' + index);
        const correctAnswerText = document.getElementById('correct-answer-text-' + index);
        
        // Sembunyikan tombol Check, tampilkan tombol Next
        const btnCheck = document.getElementById('btn-check-' + index);
        const btnNext = document.getElementById('btn-next-' + index);
        if (btnCheck) btnCheck.classList.add('hidden');
        if (btnNext) {
            btnNext.classList.remove('hidden');
            btnNext.classList.add('flex');
        }

        feedbackBox.classList.remove('hidden');

        // Kembalikan input pilihan user sebelumnya
        if (type === 'fill_blank_mc' || type === 'listen_select') {
            const radio = document.querySelector(`input[name="answer_${itemId}"][value="${data.userAnswer}"]`);
            if (radio) radio.checked = true;

            const radios = document.querySelectorAll(`input[name="answer_${itemId}"]`);
            radios.forEach(r => {
                r.disabled = true;
                const labelTarget = r.closest('label');
                if(labelTarget) labelTarget.classList.replace('cursor-pointer', 'cursor-not-allowed');
            });
        } else {
            const inputField = document.querySelector(`[name="answer_${itemId}"]`);
            if (inputField) {
                inputField.value = data.userAnswer;
                inputField.disabled = true;
                inputField.classList.add('bg-slate-100', 'cursor-not-allowed', 'opacity-80');
            }
        }

        // Tampilkan kotak hijau / merah sesuai hasil sebelumnya
        if (data.isCorrect) {
            feedbackBox.classList.add('bg-green-500');
            feedbackText.innerHTML = `
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Excellent! That is correct!</span>
                </div>
            `;
        } else {
            feedbackBox.classList.add('bg-red-500');
            feedbackText.innerHTML = `
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Oops, that is not quite right</span>
                </div>
            `;
            if (correctAnswerText) {
                correctAnswerText.innerText = 'Correct answer: ' + slide.getAttribute('data-correct');
                correctAnswerText.classList.remove('hidden');
            }
        }
    }

    function nextQuiz() {
        if (currentQuiz < totalQuizzes - 1) {
            document.getElementById('slide-' + currentQuiz).classList.replace('flex', 'hidden');
            
            currentQuiz++;
            document.getElementById('slide-' + currentQuiz).classList.replace('hidden', 'flex');
            
            // Simpan posisi quiz saat ini ke sessionStorage agar tidak balik ke awal saat di-refresh
            sessionStorage.setItem('ling_current_quiz', currentQuiz);
        } else {
            const btnNext = document.getElementById('btn-next-' + currentQuiz);
            btnNext.innerHTML = 'Saving...';
            btnNext.disabled = true;
            btnNext.classList.add('opacity-75', 'cursor-not-allowed');

            const subModuleId = "{{ request()->route('sub_module_id') }}"; 

            fetch(`{{ route('user.general.quiz.submit') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    sub_module_id: subModuleId,
                    total_correct: totalCorrect,
                    total_xp: totalXP,
                    total_quizzes: totalQuizzes
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Hapus session storage jika kuis sudah selesai & berhasil disubmit
                    sessionStorage.removeItem('ling_current_quiz');
                    sessionStorage.removeItem('ling_total_correct');
                    sessionStorage.removeItem('ling_total_xp');
                    sessionStorage.removeItem('ling_answered_questions');

                    window.location.href = data.redirect_url;
                } else {
                    alert('Oops, terjadi kesalahan saat menyimpan skor.');
                    btnNext.innerHTML = 'Try Again';
                    btnNext.disabled = false;
                    btnNext.classList.remove('opacity-75', 'cursor-not-allowed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal terhubung ke server.');
                btnNext.innerHTML = 'Try Again';
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-75', 'cursor-not-allowed');
            });
        }
    }

    function prevQuiz() {
        if (currentQuiz > 0) {
            document.getElementById('slide-' + currentQuiz).classList.replace('flex', 'hidden');
            
            currentQuiz--;
            document.getElementById('slide-' + currentQuiz).classList.replace('hidden', 'flex');
            
            sessionStorage.setItem('ling_current_quiz', currentQuiz);
        } else {
            const subModuleId = "{{ request()->route('sub_module_id') }}";
            window.location.href = `/general/flashcard/${subModuleId}`; 
        }
    }
    
    function playAudio(text, langCode) {
        window.speechSynthesis.cancel();
        const speech = new SpeechSynthesisUtterance(text);
        speech.lang = langCode; 
        speech.rate = 0.9;
        window.speechSynthesis.speak(speech);
    }

    function checkAnswer(index) {
        const slide = document.getElementById('slide-' + index);
        const type = slide.getAttribute('data-type');
        const itemId = slide.getAttribute('data-id');
        const correctAnswer = slide.getAttribute('data-correct').trim().toLowerCase();
        
        let userAnswer = '';

        if (type === 'fill_blank_mc' || type === 'listen_select') {
            const selected = document.querySelector(`input[name="answer_${itemId}"]:checked`);
            if (!selected) {
                alert('Pilih salah satu jawaban dulu ya!');
                return;
            }
            userAnswer = selected.value.trim().toLowerCase();
        } else {
            const input = document.querySelector(`[name="answer_${itemId}"]`);
            if (!input.value.trim()) {
                alert('Ketik jawabanmu dulu ya!');
                return;
            }
            userAnswer = input.value.trim().toLowerCase();
        }

        const isCorrect = (userAnswer === correctAnswer);

        // Simpan status jawaban ke sessionStorage agar terkunci jika di-refresh
        answeredQuestions[index] = {
            userAnswer: userAnswer,
            isCorrect: isCorrect
        };
        sessionStorage.setItem('ling_answered_questions', JSON.stringify(answeredQuestions));

        const feedbackBox = document.getElementById('feedback-box-' + index);
        const feedbackText = document.getElementById('feedback-text-' + index);
        const correctAnswerText = document.getElementById('correct-answer-text-' + index);
        
        document.getElementById('btn-check-' + index).classList.add('hidden');
        const btnNext = document.getElementById('btn-next-' + index);
        btnNext.classList.remove('hidden');
        btnNext.classList.add('flex'); 

        feedbackBox.classList.remove('hidden');

        // Cek Benar atau Salah
        if (isCorrect) {
            const correctSound = new Audio('/sounds/correct.wav');
            correctSound.play();

            totalCorrect++;
            totalXP += 10;

            sessionStorage.setItem('ling_total_correct', totalCorrect);
            sessionStorage.setItem('ling_total_xp', totalXP);

            feedbackBox.classList.add('bg-green-500');
            feedbackText.innerHTML = `
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Excellent! That is correct!</span>
                </div>
            `;
        } else {
            const wrongSound = new Audio('/sounds/wrong.mp3');
            wrongSound.play();

            feedbackBox.classList.add('bg-red-500');
            feedbackText.innerHTML = `
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Oops, that is not quite right</span>
                </div>
            `;
            correctAnswerText.innerText = 'Correct answer: ' + slide.getAttribute('data-correct');
            correctAnswerText.classList.remove('hidden');
        }

        if (type === 'fill_blank_mc' || type === 'listen_select') {
            const radios = document.querySelectorAll(`input[name="answer_${itemId}"]`);
            radios.forEach(radio => {
                radio.disabled = true;
                
                const labelTarget = radio.closest('label');
                labelTarget.classList.replace('cursor-pointer', 'cursor-not-allowed');
                
                const divBox = radio.nextElementSibling;
                if (divBox) {
                    divBox.classList.remove('hover:border-[#55BCC9]', 'hover:bg-[#f2fcfe]');
                }
                
                const spanAbjad = labelTarget.querySelector('span');
                if (spanAbjad) {
                    spanAbjad.classList.remove('group-hover:text-[#55BCC9]');
                }
            });
        } else {
            const inputField = document.querySelector(`[name="answer_${itemId}"]`);
            inputField.disabled = true;
            inputField.classList.add('bg-slate-100', 'cursor-not-allowed', 'opacity-80');
        }
    }
</script>
</body>
</html>