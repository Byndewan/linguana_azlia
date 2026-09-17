<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Quiz - Linguana</title>
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
            
            <!-- Question Counter -->
            <div class="text-slate-400 font-bold text-sm tracking-widest">
                1<span class="text-slate-300">/{{ $totalQuestions ?? 5 }}</span>
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
                    
                    @php
                        // Contoh variabel dummy untuk simulasi tipe soal. 
                        // Nanti bisa diganti dengan data asli dari Controller ($question->type)
                        // Tipe yang tersedia: 'listen_select', 'listen_type', 'fill_blank_mc', 'fill_blank_input'
                        $currentType = $question->type ?? 'listen_select'; 
                    @endphp

                    <h3 class="text-xs font-bold text-slate-400 tracking-wider mb-4 uppercase">
                        Question 1 
                    </h3>

                    <!-- TAMPILAN JIKA SOAL ADALAH AUDIO (Listen & Select / Listen & Type) -->
                    @if($currentType == 'listen_select' || $currentType == 'listen_type')
                        <div class="mb-6 flex items-center gap-4 bg-cyan-50 p-4 rounded-2xl border border-cyan-100">
                            <button onclick="playAudio()" class="w-12 h-12 rounded-full bg-[#55bcc9] text-white flex items-center justify-center hover:bg-[#25adbe] transition-colors shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                </svg>
                            </button>
                            <div>
                                <h4 class="text-sm font-bold text-slate-700">Audio Pronunciation</h4>
                                <p class="text-xs text-slate-400">Click the button to listen to the native speaker</p>
                            </div>
                        </div>
                    @endif

                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-8 leading-tight">
                        {{ $question->question_text ?? 'What does "Hola" mean?' }}
                    </h2>
                    
                    <!-- AREA INTERAKSI BERDASARKAN TIPE SOAL -->
                    <div class="flex flex-col gap-4">
                        
                        {{-- 1. VARIASI: LISTEN & SELECT / FILL IN THE BLANK (MULTIPLE CHOICE) --}}
                        @if($currentType == 'listen_select' || $currentType == 'fill_blank_mc')
                            @php
                                // Ambil opsi dari database atau gunakan dummy default
                                $options = isset($question->options) ? json_decode($question->options, true) : ['A' => 'Hello', 'B' => 'Goodbye', 'C' => 'Thank you', 'D' => 'Please'];
                            @endphp

                            @foreach($options as $key => $val)
                            <label class="group flex items-center p-4 md:p-5 rounded-2xl border-2 border-slate-200 bg-slate-50 hover:border-[#55bcc9] cursor-pointer transition-colors">
                                <input type="radio" name="answer" value="{{ $key }}" class="hidden">
                                <span class="text-slate-400 font-bold text-lg mr-4 group-hover:text-[#55bcc9]">{{ strtoupper($key) }}.</span>
                                <span class="text-slate-900 font-bold text-base md:text-lg">{{ $val }}</span>
                            </label>
                            @endforeach

                        {{-- 2. VARIASI: LISTEN & TYPE / FILL IN THE BLANK (INPUT TEXT) --}}
                        @elseif($currentType == 'listen_type' || $currentType == 'fill_blank_input')
                            <div class="flex flex-col gap-3">
                                <label class="text-sm font-semibold text-slate-600">Type your answer below:</label>
                                <input type="text" name="answer_input" placeholder="Type the translation or sentence..." class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-5 py-4 text-base md:text-lg font-medium text-slate-800 focus:outline-none focus:border-[#55bcc9] transition-colors">
                            </div>
                        @endif

                    </div>
                </div>

                <!-- Tombol Navigasi Bawah -->
                <div class="flex items-center justify-between mt-2 mb-6">
                    <button class="px-6 py-3.5 border-2 border-[#98e1eb] rounded-xl flex items-center gap-2 font-bold text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Previous
                    </button>
                    
                    <button class="px-8 py-3.5 bg-[#55bcc9] text-white rounded-xl flex items-center gap-2 font-bold hover:bg-[#25adbe] transition-colors shadow-md">
                        Next
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
                        <button class="w-10 h-10 rounded-full bg-[#55bcc9] text-white flex items-center justify-center font-bold text-sm shadow-md">1</button>
                        <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors flex items-center justify-center font-bold text-sm">2</button>
                        <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors flex items-center justify-center font-bold text-sm">3</button>
                        <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors flex items-center justify-center font-bold text-sm">4</button>
                        <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors flex items-center justify-center font-bold text-sm">5</button>
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
                            <span class="text-sm font-bold text-slate-900">30</span>
                        </div>
                        <div class="flex justify-between items-center py-3.5 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Time Limit</span>
                            <span class="text-sm font-bold text-slate-900">30 min</span>
                        </div>
                        <div class="flex justify-between items-center py-3.5 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Passing Score</span>
                            <span class="text-sm font-bold text-slate-900">70%</span>
                        </div>
                        <div class="flex justify-between items-center py-3.5 pt-4">
                            <span class="text-sm font-medium text-slate-400">XP Reward</span>
                            <span class="text-sm font-bold text-slate-900">+150 XP</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <script>
        function playAudio() {
            if ('speechSynthesis' in window) {
                let utterance = new SpeechSynthesisUtterance("Hola");
                utterance.lang = 'es-ES'; 
                window.speechSynthesis.speak(utterance);
            } else {
                alert("Audio playback not supported in this browser.");
            }
        }
    </script>
</body>
</html>