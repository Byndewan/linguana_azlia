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
                <p class="text-slate-500 font-medium mb-10 text-sm md:text-base">Final Quiz — Everyday Conversations Module</p>
                
                <!-- Lingkaran Skor Utama -->
                <div class="w-40 h-40 rounded-full border-[10px] border-[#55bcc9] flex flex-col items-center justify-center bg-[#d6f8fc]  shadow-sm">
                    <span class="text-4xl font-extrabold text-slate-900 mb-1">85%</span>
                    <span class="text-sm font-medium text-slate-400">Score</span>
                </div>
            </div>

            <!-- 2. Stats Row (3 Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-2xl font-extrabold text-slate-900 mb-1">17 / 20</span>
                    <span class="text-xs font-medium text-slate-400">Correct</span>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-2xl font-extrabold text-slate-900 mb-1">+128 XP</span>
                    <span class="text-xs font-medium text-slate-400">XP Earned</span>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-2xl font-extrabold text-slate-900 mb-1">22 min</span>
                    <span class="text-xs font-medium text-slate-400">Time Taken</span>
                </div>
            </div>

            <!-- 3. Performance Breakdown -->
            <div class="bg-white rounded-3xl p-6 md:p-8 w-full border border-slate-100 shadow-sm flex flex-col gap-6">
                <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">Performance Breakdown</h3>
                
                <!-- Item: Vocabulary -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-end">
                        <span class="font-bold text-slate-900 text-sm">Vocabulary</span>
                        <span class="text-xs font-medium text-slate-400">8/8 correct</span>
                    </div>
                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-[#55bcc9] w-full rounded-full"></div>
                    </div>
                </div>

                <!-- Item: Grammar -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-end">
                        <span class="font-bold text-slate-900 text-sm">Grammar</span>
                        <span class="text-xs font-medium text-slate-400">5/6 correct</span>
                    </div>
                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-[#55bcc9] w-[83%] rounded-full"></div>
                    </div>
                </div>

                <!-- Item: Listening -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-end">
                        <span class="font-bold text-slate-900 text-sm">Listening Comprehension</span>
                        <span class="text-xs font-medium text-slate-400">2/4 correct</span>
                    </div>
                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-[#55bcc9] w-[50%] rounded-full"></div>
                    </div>
                </div>

                <!-- Item: Phrase Construction -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-end">
                        <span class="font-bold text-slate-900 text-sm">Phrase Construction</span>
                        <span class="text-xs font-medium text-slate-400">2/2 correct</span>
                    </div>
                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-[#55bcc9] w-full rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- 4. Strengths & Needs Practice -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full">
                
                <!-- Strengths -->
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-5">Strengths</h3>
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-[#55bcc9] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            Vocabulary recall
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-[#55bcc9] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            Common phrases
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-[#55bcc9] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            Written comprehension
                        </li>
                    </ul>
                </div>

                <!-- Needs Practice -->
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-5">Needs Practice</h3>
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <div class="w-4 h-4 rounded-full border-2 border-[#b2e8ef] shrink-0 ml-0.5"></div>
                            Listening comprehension
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <div class="w-4 h-4 rounded-full border-2 border-[#b2e8ef]  shrink-0 ml-0.5"></div>
                            Spoken phrases
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 5. Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center gap-4 w-full mt-4 mb-8">
                
                <!-- Secondary Buttons -->
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-3.5 border-2 border-[#88cfd8] rounded-xl font-bold text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Retry Quiz
                    </button>
                    <button class="flex-1 sm:flex-none px-6 py-3.5 bg-[#b2e7ee] rounded-xl font-bold text-slate-700 hover:bg-[#88e1ed] transition-colors text-center">
                        Back to Dashboard
                    </button>
                </div>

                <button class="w-full sm:flex-1 px-6 py-3.5 bg-[#55bcc9] text-white rounded-xl flex items-center justify-center gap-2 font-bold hover:bg-[#55bcc9] transition-colors shadow-md">
                    Continue Learning
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>

        </div>
    </main>

</body>
</html>