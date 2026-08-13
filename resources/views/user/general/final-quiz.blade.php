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
        
        <!-- Kiri: Tombol Close & Progress -->
        <div class="flex items-start gap-4 flex-1">
            <!-- Tombol X (Close) -->
            <button class="text-slate-400 hover:text-slate-800 transition-colors p-1 mt-1 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <!-- Judul & Progress Bar -->
            {{-- <div class="flex flex-col gap-2 w-full max-w-xl">
                <span class="text-sm font-bold text-slate-900">Final Quiz — Everyday Conversations</span>
                <div class="flex items-center gap-2 w-full">
                    <div class="h-1.5 flex-1 bg-slate-500 rounded-full"></div>
                    <div class="h-1.5 flex-1 bg-slate-200 rounded-full"></div>
                    <div class="h-1.5 flex-1 bg-slate-200 rounded-full"></div>
                    <div class="h-1.5 flex-1 bg-slate-200 rounded-full"></div>
                    <div class="h-1.5 flex-1 bg-slate-200 rounded-full"></div>
                </div>
            </div> --}}
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
                1<span class="text-slate-300">/5</span>
            </div>
        </div>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow flex justify-center p-6 md:p-10 overflow-y-auto">
        
        <div class="w-full max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 items-start">
            
            <!-- KOLOM KIRI: Pertanyaan & Pilihan (Col-span 2) -->
            <div class="lg:col-span-2 flex flex-col gap-6 w-full">
                
                <!-- Question Card -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
                    
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider mb-4 uppercase">Question 1</h3>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-8 leading-tight">What does "Hola" mean?</h2>
                    
                    <!-- Pilihan Ganda -->
                    <div class="flex flex-col gap-4">
                        
                        <!-- Pilihan A -->
                        <label class="group flex items-center p-4 md:p-5 rounded-2xl border-2 border-slate-200 bg-slate-50 hover:border-slate-300 cursor-pointer transition-colors">
                            <input type="radio" name="answer" class="hidden">
                            <span class="text-slate-400 font-bold text-lg mr-4 group-hover:text-slate-500">A.</span>
                            <span class="text-slate-900 font-bold text-base md:text-lg">Hello</span>
                        </label>

                        <!-- Pilihan B -->
                        <label class="group flex items-center p-4 md:p-5 rounded-2xl border-2 border-slate-200 bg-slate-50 hover:border-slate-300 cursor-pointer transition-colors">
                            <input type="radio" name="answer" class="hidden">
                            <span class="text-slate-400 font-bold text-lg mr-4 group-hover:text-slate-500">B.</span>
                            <span class="text-slate-900 font-bold text-base md:text-lg">Goodbye</span>
                        </label>

                        <!-- Pilihan C -->
                        <label class="group flex items-center p-4 md:p-5 rounded-2xl border-2 border-slate-200 bg-slate-50 hover:border-slate-300 cursor-pointer transition-colors">
                            <input type="radio" name="answer" class="hidden">
                            <span class="text-slate-400 font-bold text-lg mr-4 group-hover:text-slate-500">C.</span>
                            <span class="text-slate-900 font-bold text-base md:text-lg">Thank you</span>
                        </label>

                        <!-- Pilihan D -->
                        <label class="group flex items-center p-4 md:p-5 rounded-2xl border-2 border-slate-200 bg-slate-50 hover:border-slate-300 cursor-pointer transition-colors">
                            <input type="radio" name="answer" class="hidden">
                            <span class="text-slate-400 font-bold text-lg mr-4 group-hover:text-slate-500">D.</span>
                            <span class="text-slate-900 font-bold text-base md:text-lg">Please</span>
                        </label>

                    </div>
                </div>

                <!-- Tombol Navigasi Bawah -->
                <div class="flex items-center justify-between mt-2 mb-6">
                    <!-- Tombol Previous -->
                    <button class="px-6 py-3.5 border-2 border-[#98e1eb] rounded-xl flex items-center gap-2 font-bold text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Previous
                    </button>
                    
                    <!-- Tombol Next -->
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
                    
                    <!-- Grid Angka Pertanyaan -->
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
                            <span class="text-sm font-bold text-slate-900">20</span>
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

</body>
</html>