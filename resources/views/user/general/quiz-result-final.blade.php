<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results - Linguana</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#d6f8fc]">

    <!-- ================= HEADER ================= -->
    <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between shrink-0 z-10 shadow-sm">
        <!-- Back Button -->
        <a href="#" class="flex items-center gap-2 text-slate-500 hover:text-slate-900 font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Dashboard
        </a>
        
        <!-- Title -->
        <div class="font-extrabold text-slate-900">
            Quiz Results
        </div>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow overflow-y-auto flex justify-center p-6 md:p-10">
        
        <div class="w-full max-w-3xl flex flex-col items-center gap-8">
            
            <!-- 1. Title & Circular Score -->
            <div class="text-center flex flex-col items-center mt-2 md:mt-6 w-full">
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">Excellent Work!</h1>
                <p class="text-slate-500 font-medium mb-10 text-sm md:text-base">Final Quiz — {{ $module->title }}</p>
                
                <!-- Lingkaran Skor Utama -->
                <div class="w-40 h-40 rounded-full border-[10px] border-[#55bcc9] flex flex-col items-center justify-center bg-[#d6f8fc]  shadow-sm">
                    <span class="text-4xl font-extrabold text-slate-900 mb-1">{{ $score }}%</span>
                    <span class="text-sm font-medium text-slate-400">Score</span>
                </div>
            </div>

            <!-- 2. Stats Row (3 Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-2xl font-extrabold text-slate-900 mb-1">{{ $correct }} / {{ $total }}</span>
                    <span class="text-xs font-medium text-slate-400">Correct</span>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-2xl font-extrabold text-slate-900 mb-1">+{{ $module_xp }} XP</span>
                    <span class="text-xs font-medium text-slate-400">XP Earned</span>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-2xl font-extrabold text-slate-900 mb-1">22 min</span>
                    <span class="text-xs font-medium text-slate-400">Time Taken</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 md:p-8 w-full border border-slate-100 shadow-sm flex flex-col gap-6">
                <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">Quiz Result Status</h3>
                
                <div class="flex items-center justify-between p-5 rounded-2xl {{ $status == 'passed' ? 'bg-emerald-50 border border-emerald-100' : 'bg-rose-50 border border-rose-100' }}">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold {{ $status == 'passed' ? 'bg-emerald-500 text-white' : 'bg-rose-500 text-white' }}">
                            {!! $status == 'passed' ? '&#10003;' : '&#10005;' !!}
                        </div>
                        <div>
                            <h4 class="font-bold text-base {{ $status == 'passed' ? 'text-emerald-900' : 'text-rose-900' }}">
                                {{ $status == 'passed' ? 'Congratulations, You Passed!' : 'Keep Trying, Not Passed Yet' }}
                            </h4>
                            <p class="text-xs {{ $status == 'passed' ? 'text-emerald-600' : 'text-rose-600' }} mt-0.5">
                                {{ $status == 'passed' ? 'You have successfully met the passing score criteria.' : 'Your score is below the minimum passing threshold.' }}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-semibold text-slate-400 block uppercase">Final Score</span>
                        <span class="text-2xl font-extrabold {{ $status == 'passed' ? 'text-emerald-600' : 'text-rose-600' }}">{{ $score }}%</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full">
                
                <!-- Total Correct Answers -->
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm flex items-center justify-between">
                    <div>
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">Correct Answers</h3>
                        <div class="text-2xl font-extrabold text-slate-800">{{ $correct }} <span class="text-sm font-normal text-slate-400">/ {{ $total }} Questions</span></div>
                        <p class="text-xs text-slate-400 mt-1">Total questions answered correctly.</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-cyan-50 flex items-center justify-center text-[#55bcc9] text-xl font-bold">
                        ✓
                    </div>
                </div>

                <!-- Total Incorrect / Remaining -->
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm flex items-center justify-between">
                    <div>
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">Incorrect Answers</h3>
                        <div class="text-2xl font-extrabold text-slate-800">{{ $total - $correct }} <span class="text-sm font-normal text-slate-400">/ {{ $total }} Questions</span></div>
                        <p class="text-xs text-slate-400 mt-1">Needs review in future sessions.</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-400 text-xl font-bold">
                        ✕
                    </div>
                </div>
            </div>

            <!-- 5. Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center gap-4 w-full mt-4 mb-8">
                
                <!-- Secondary Buttons -->
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-3.5 border-2 border-[#88cfd8] rounded-xl font-bold text-slate-700 hover:bg-slate-50 transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Retry Quiz
                    </button>
                    <button onclick="window.location.href='{{ route('user.general.module') }}'" class="flex-1 sm:flex-none px-6 py-3.5 bg-[#b2e7ee] rounded-xl font-bold text-slate-700 hover:bg-[#88e1ed] transition-colors text-center cursor-pointer">
                        Back to Dashboard
                    </button>
                </div>

                <button class="w-full sm:flex-1 px-6 py-3.5 bg-[#55bcc9] text-white rounded-xl flex items-center justify-center gap-2 font-bold hover:bg-[#55bcc9] transition-colors shadow-md cursor-pointer">
                    Continue Learning
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>

        </div>
    </main>

</body>
</html>