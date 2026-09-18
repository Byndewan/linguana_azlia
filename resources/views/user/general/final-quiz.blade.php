<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Quiz - Linguana</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#d6f8fc] h-screen flex flex-col font-sans overflow-hidden text-slate-800">

    <!-- ================= HEADER ================= -->
    <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between shrink-0 z-10 relative shadow-sm">
        
        <!-- Kiri: Tombol Close -->
        <div class="flex items-start gap-4 flex-1">
            <a href="{{ route('user.general.sub-module', $module->id ?? 1) }}" class="text-slate-400 hover:text-slate-800 transition-colors p-1 mt-1 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
        </div>

        <!-- Kanan: Timer & Counter -->
        <div class="flex items-center gap-4 shrink-0 pl-4">
            <!-- Timer Badge -->
            <div class="flex items-center gap-2 bg-slate-100 text-slate-700 px-4 py-2 rounded-xl font-bold text-sm">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                </svg>
                28:45
            </div>
            
            <!-- Question Counter Dinamis -->
            <div class="text-slate-400 font-bold text-sm tracking-widest">
                <span id="current-question-num">1</span><span class="text-slate-300">/{{ $finalQuizzes->count() }}</span>
            </div>
        </div>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow flex justify-center p-6 md:p-10 overflow-y-auto">
        
        <div class="w-full max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 items-start">
            
            <!-- KOLOM KIRI: Pertanyaan & Pilihan Dinamis (Col-span 2) -->
            <div class="lg:col-span-2 flex flex-col gap-6 w-full">
                
                <!-- Question Card -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
                    
                    <h3 id="question-title-label" class="text-xs font-bold text-slate-400 tracking-wider mb-4 uppercase">
                        Question 1 
                    </h3>

                    <!-- TAMPILAN AUDIO PLAYER (Muncul otomatis jika tipe soal audio) -->
                    <div id="audio-container" class="mb-6 hidden items-center gap-4 bg-cyan-50 p-4 rounded-2xl border border-cyan-100">
                        <button onclick="playCurrentAudio()" class="w-12 h-12 rounded-full bg-[#55bcc9] text-white flex items-center justify-center hover:bg-[#25adbe] transition-colors shadow-sm shrink-0 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                            </svg>
                        </button>
                        <div>
                            <h4 class="text-sm font-bold text-slate-700">Audio Pronunciation</h4>
                            <p class="text-xs text-slate-400">Click the button to listen to the native speaker</p>
                        </div>
                    </div>

                    <h2 id="question-text" class="text-2xl md:text-xl font-bold text-slate-900 mb-8 leading-tight">
                        Loading question...
                    </h2>
                    
                    <div id="interaction-area" class="flex flex-col gap-4">
                    </div>
                </div>

                <!-- Tombol Navigasi Bawah -->
                <div class="flex items-center justify-between mt-2 mb-6">
                    <button id="prev-btn" onclick="prevQuestion()" class="px-6 py-3.5 border-2 border-[#98e1eb] rounded-xl flex items-center gap-2 font-bold text-slate-700 hover:bg-slate-50 transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Previous
                    </button>
                    
                    <button id="next-btn" onclick="handleNextButton()" class="px-8 py-3.5 bg-[#55bcc9] text-white rounded-xl flex items-center gap-2 font-bold hover:bg-[#25adbe] transition-colors shadow-md cursor-pointer">
                        <span id="next-btn-text">Next</span>
                        <svg id="next-btn-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>

            </div>

            <!-- KOLOM KANAN: Navigasi & Info (Col-span 1) -->
            <div class="lg:col-span-1 flex flex-col gap-6 w-full">
                
                <!-- Widget: Question Navigator -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider mb-4 uppercase">Question Navigator</h3>
                    
                    <div class="flex flex-wrap gap-2.5 mb-6">
                        @foreach($finalQuizzes as $index =>$quiz)
                            @php
                                $questionNumber =$index + 1;
                                $isActive =$index === 0; 
                            @endphp

                            <button 
                                type="button"
                                onclick="goToQuestion({{ $index }})" 
                                id="nav-btn-{{ $index }}"
                                class="w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer 
                                    {{ $isActive ? 'bg-[#55bcc9] text-white shadow-md' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                {{ $questionNumber }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Legenda Navigator -->
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-3.5 h-3.5 rounded bg-[#55bcc9]"></div>
                            <span class="text-sm font-medium text-slate-500">Current</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3.5 h-3.5 rounded bg-[#acdee5]"></div>
                            <span class="text-sm font-medium text-slate-400">Answered</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3.5 h-3.5 rounded bg-slate-100"></div>
                            <span class="text-sm font-medium text-slate-400">Unanswered</span>
                        </div>
                    </div>
                </div>

                <!-- Widget: Quiz Info -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider mb-2 uppercase">Quiz Info</h3>
                    
                    <div class="flex flex-col">
                        <div class="flex justify-between items-center py-3.5 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Total Questions</span>
                            <span class="text-sm font-bold text-slate-900">{{ $finalQuizzes->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3.5 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Time Limit</span>
                            <span class="text-sm font-bold text-slate-900">{{ $module->time }} min</span>
                        </div>
                        <div class="flex justify-between items-center py-3.5 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Passing Score</span>
                            <span class="text-sm font-bold text-slate-900">70%</span>
                        </div>
                        <div class="flex justify-between items-center py-3.5 pt-4">
                            <span class="text-sm font-medium text-slate-400">XP Reward</span>
                            <span class="text-sm font-bold text-slate-900">+{{ $module->point }} XP</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <!-- ================= JAVASCRIPT LOGIC ================= -->
    <script>
        // Simpan jawaban user & indeks soal aktif
        let userAnswers = {};
        const questions = @json($finalQuizzes);
        let currentIndex = 0;

        function playCurrentAudio() {
            const q = questions[currentIndex];
            if (!q || !q.question_audio) return;

            window.speechSynthesis.cancel();
            const speech = new SpeechSynthesisUtterance(q.question_audio);
            speech.lang = q.language_code || 'es-ES'; 
            speech.rate = 0.9;
            window.speechSynthesis.speak(speech);
        }

        function renderQuestion(index) {
            if (questions.length === 0) return;

            const q = questions[index];
            
            document.getElementById('current-question-num').innerText = index + 1;
            document.getElementById('question-title-label').innerText = `Question ${index + 1}`;
            
            const questionTextContainer = document.getElementById('question-text');
            if (q.question_text.includes('[blank]')) {
                const parts = q.question_text.split('[blank]');
                questionTextContainer.innerHTML = parts.join('<span class="inline-block border-b-2 border-slate-400 w-20 mx-1 text-center font-bold text-slate-700"></span>');
            } else {
                questionTextContainer.innerText = q.question_text;
            }

            const audioContainer = document.getElementById('audio-container');
            if (q.type === 'listen_select' || q.type === 'listen_type') {
                audioContainer.classList.remove('hidden');
                audioContainer.classList.add('flex');
            } else {
                audioContainer.classList.add('hidden');
                audioContainer.classList.remove('flex');
            }

            questions.forEach((_, i) => {
                const btn = document.getElementById(`nav-btn-${i}`);
                if (btn) {
                    const isAnswered = userAnswers[i] !== undefined && userAnswers[i] !== '';

                    if (i === index) {
                        btn.className = "w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer bg-[#55bcc9] text-white shadow-md";
                    } else if (isAnswered) {
                        btn.className = "w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer bg-[#acdee5] text-slate-700 shadow-sm";
                    } else {
                        btn.className = "w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer bg-slate-100 text-slate-500 hover:bg-slate-200";
                    }
                }
            });

            const nextBtnText = document.getElementById('next-btn-text');
            const nextBtnIcon = document.getElementById('next-btn-icon');
            const nextBtnElement = document.getElementById('next-btn');

            if (index === questions.length - 1) {
                nextBtnText.innerText = "Submit Quiz";
                nextBtnElement.className = "px-8 py-3.5 bg-[#55bcc9] text-white rounded-xl flex items-center gap-2 font-bold hover:bg-[#25adbe] transition-colors shadow-md cursor-pointer";
                nextBtnIcon.classList.add('hidden'); 
            } else {
                nextBtnText.innerText = "Next";
                nextBtnElement.className = "px-8 py-3.5 bg-[#55bcc9] text-white rounded-xl flex items-center gap-2 font-bold hover:bg-[#25adbe] transition-colors shadow-md cursor-pointer";
                nextBtnIcon.classList.remove('hidden');
            }

            const prevBtnElement = document.getElementById('prev-btn');
            if (index === 0) {
                prevBtnElement.classList.add('hidden');
            } else {
                prevBtnElement.classList.remove('hidden');
            }

            renderInteractionArea(q);
        }

        function submitQuiz() {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to finish and submit your final quiz!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#55bcc9", 
                cancelButtonColor: "#d33", 
                confirmButtonText: "Yes, submit it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("Jawaban akhir user:", userAnswers);
                    
                    Swal.fire({
                        title: "Submitted!",
                        text: "Your final quiz has been submitted successfully.",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "{{ route('user.general.quiz-result', $module->id) }}";
                    });
                }
            });
        }

        function handleNextButton() {
            if (currentIndex < questions.length - 1) {
                currentIndex++;
                renderQuestion(currentIndex);
            } else {
                submitQuiz();
            }
        }

        function prevQuestion() {
            if (currentIndex > 0) {
                currentIndex--;
                renderQuestion(currentIndex);
            }
        }

        function goToQuestion(index) {
            currentIndex = index;
            renderQuestion(currentIndex);
        }

        document.addEventListener("DOMContentLoaded", () => {
            renderQuestion(0);
        });

        function renderInteractionArea(q) {
            const container = document.getElementById('interaction-area');
            container.innerHTML = ''; 

            if (q.type === 'listen_select' || q.type === 'fill_blank_mc') {
                let options = {};
                try {
                    options = typeof q.options === 'string' ? JSON.parse(q.options) : q.options;
                } catch (e) {
                    options = { A: 'Option A', B: 'Option B', C: 'Option C', D: 'Option D' };
                }

                const savedAnswer = userAnswers[currentIndex] || '';

                for (const [key, val] of Object.entries(options)) {
                    const isSelected = savedAnswer === key;
                    
                    // Styling dinamis jika dipilih
                    const borderClass = isSelected ? 'border-[#55bcc9] bg-cyan-50/60 shadow-sm' : 'border-slate-200 bg-slate-50 hover:border-[#55bcc9]';
                    const textMarkerClass = isSelected ? 'text-[#55bcc9]' : 'text-slate-400 group-hover:text-[#55bcc9]';

                    container.innerHTML += `
                        <label onclick="selectOption('${key}')" class="group flex items-center p-4 md:p-5 rounded-2xl border-2 ${borderClass} cursor-pointer transition-all">
                            <input type="radio" name="user_answer" value="${key}" ${isSelected ? 'checked' : ''} class="hidden">
                            <span class="${textMarkerClass} font-bold text-lg mr-4">${key.toUpperCase()}.</span>
                            <span class="text-slate-900 font-bold text-base md:text-lg">${val}</span>
                        </label>
                    `;
                }
            } else if (q.type === 'listen_type' || q.type === 'fill_blank_input') {
                const savedText = userAnswers[currentIndex] || '';
                container.innerHTML = `
                    <div class="flex flex-col gap-3">
                        <label class="text-sm font-semibold text-slate-600">Type your answer below:</label>
                        <input type="text" id="user_text_answer" value="${savedText}" oninput="saveTextAnswer(this.value)" placeholder="Type the translation or sentence..." class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-4 text-base md:text-lg font-medium text-slate-800 focus:outline-none focus:border-[#55bcc9] transition-colors">
                    </div>
                `;
            }
        }

        function selectOption(key) {
            userAnswers[currentIndex] = key; 
            
            const navBtn = document.getElementById(`nav-btn-${currentIndex}`);
            if (navBtn && !navBtn.classList.contains('bg-[#55bcc9]')) {
                navBtn.className = "w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer bg-[#acdee5] text-slate-700 shadow-sm";
            }

            renderInteractionArea(questions[currentIndex]); 
        }

        function saveTextAnswer(val) {
            userAnswers[currentIndex] = val;
            const navBtn = document.getElementById(`nav-btn-${currentIndex}`);
            if (navBtn && val.trim() !== '' && !navBtn.classList.contains('bg-[#55bcc9]')) {
                navBtn.className = "w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer bg-[#acdee5] text-slate-700 shadow-sm";
            } else if (navBtn && val.trim() === '' && !navBtn.classList.contains('bg-[#55bcc9]')) {
                navBtn.className = "w-10 h-10 rounded-full font-bold text-sm transition-all flex items-center justify-center cursor-pointer bg-slate-100 text-slate-500 hover:bg-slate-200";
            }
        }

        function nextQuestion() {
            if (currentIndex < questions.length - 1) {
                currentIndex++;
                renderQuestion(currentIndex);
            }
        }

        function prevQuestion() {
            if (currentIndex > 0) {
                currentIndex--;
                renderQuestion(currentIndex);
            }
        }

        function goToQuestion(index) {
            currentIndex = index;
            renderQuestion(currentIndex);
        }

        document.addEventListener("DOMContentLoaded", () => {
            renderQuestion(0);
        });
    </script>
</body>
</html>