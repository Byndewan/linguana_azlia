<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results - Linguana</title>
    @vite('resources/css/app.css')
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F4F5F7] min-h-screen flex flex-col font-sans text-slate-800 selection:bg-slate-200">

    <!-- ================= HEADER ================= -->
    <header class="bg-white px-6 py-5 flex items-center justify-between border-b border-slate-200 sticky top-0 z-50">
        <a href="#" class="flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-colors font-bold text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path></svg>
            Dashboard
        </a>
        <h1 class="font-extrabold text-slate-900 text-base">Mock Test Results</h1>
        <div class="w-20"></div> <!-- Spacer untuk menyeimbangkan flexbox -->
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-12 flex flex-col gap-10">

        <!-- 1. HEADER & CELEBRATION -->
        <div class="flex flex-col items-center text-center gap-6">
            <!-- Placeholder Ilustrasi/Animasi -->
            <div class="w-full h-40 bg-slate-200/50 rounded-[2rem] flex flex-col items-center justify-center text-slate-400">
                <div class="w-12 h-12 bg-slate-200/80 rounded-2xl flex items-center justify-center mb-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"></path></svg>
                </div>
                <span class="text-xs font-bold uppercase tracking-wider">Results Celebration</span>
            </div>

            <!-- Teks Kesimpulan -->
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-2">Test Complete!</h1>
                <p class="text-slate-500 font-medium text-lg">IELTS Academic — Full Mock Test #4 · March 14, 2024</p>
            </div>
        </div>

        <!-- 2. OVERALL SCORE CARD -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100 flex flex-col items-center text-center relative overflow-hidden">
            <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-4">Overall Band Score</h3>
            <div class="text-[7rem] leading-none font-black text-slate-900 tracking-tighter mb-4">6.5</div>
            <p class="text-slate-500 font-medium mb-10">Target: 7.0 · Previous best: 6.0</p>
            
            <!-- Lingkaran Kecil -->
            <div class="w-24 h-24 rounded-full border-[6px] border-slate-900 flex flex-col items-center justify-center">
                <span class="text-xl font-extrabold text-slate-900 leading-none mb-0.5">6.5</span>
                <span class="text-[9px] uppercase font-bold text-slate-500 tracking-wider">Band</span>
            </div>
        </div>

        <!-- 3. SECTION SCORES (4 Grid) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            
            <!-- Reading -->
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 mb-1">7.0</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Reading</div>
                <div class="w-full bg-slate-100 text-slate-600 text-xs font-bold py-1.5 rounded-full">33/40</div>
            </div>

            <!-- Writing -->
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path></svg>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 mb-1">6.0</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Writing</div>
                <div class="w-full bg-slate-100 text-slate-600 text-xs font-bold py-1.5 rounded-full">T1+T2</div>
            </div>

            <!-- Listening -->
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path></svg>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 mb-1">7.0</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Listening</div>
                <div class="w-full bg-slate-100 text-slate-600 text-xs font-bold py-1.5 rounded-full">30/40</div>
            </div>

            <!-- Speaking -->
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 mb-1">6.5</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Speaking</div>
                <div class="w-full bg-slate-100 text-slate-600 text-xs font-bold py-1.5 rounded-full">Recorded</div>
            </div>

        </div>

        <!-- 4. DETAILED BREAKDOWN (2 Columns Grid) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
            
            <!-- KOLOM KIRI: Performance Breakdown Bar Charts -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 h-fit">
                <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-8">Performance Breakdown</h3>
                
                <div class="flex flex-col gap-6">
                    <!-- Item 1 -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-medium text-slate-500">Reading — True/False/Not Given</span>
                            <span class="text-sm font-extrabold text-slate-900">78%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 w-[78%] rounded-full"></div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-medium text-slate-500">Reading — Matching Headings</span>
                            <span class="text-sm font-extrabold text-slate-900">85%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 w-[85%] rounded-full"></div>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-medium text-slate-500">Listening — Form Completion</span>
                            <span class="text-sm font-extrabold text-slate-900">90%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 w-[90%] rounded-full"></div>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-medium text-slate-500">Listening — Multiple Choice</span>
                            <span class="text-sm font-extrabold text-slate-900">70%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 w-[70%] rounded-full"></div>
                        </div>
                    </div>
                    <!-- Item 5 -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-medium text-slate-500">Writing — Task Achievement</span>
                            <span class="text-sm font-extrabold text-slate-900">65%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 w-[65%] rounded-full"></div>
                        </div>
                    </div>
                    <!-- Item 6 -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-medium text-slate-500">Writing — Coherence</span>
                            <span class="text-sm font-extrabold text-slate-900">68%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 w-[68%] rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: Strengths, Areas to Improve, AI Review -->
            <div class="flex flex-col gap-6 md:gap-8">
                
                <!-- Strengths -->
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Strengths</h3>
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Listening accuracy (top 20%)
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Reading speed and skimming
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Vocabulary range in reading
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Listening — form completion
                        </li>
                    </ul>
                </div>

                <!-- Areas to Improve -->
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Areas to Improve</h3>
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path></svg>
                            Writing Task 2 — argument development
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path></svg>
                            Writing coherence & cohesion
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path></svg>
                            Speaking fluency & hesitation
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-slate-700">
                            <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path></svg>
                            Reading — inference questions
                        </li>
                    </ul>
                </div>

                <!-- AI Review Card -->
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">AI Review</h3>
                    <div class="flex items-start gap-4 mb-5">
                        <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 shrink-0">
                            <!-- Placeholder icon for AI (Sparkles/Brain) -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 mb-1">AI Writing Analysis</h4>
                            <p class="text-sm font-medium text-slate-400 leading-relaxed">Detailed feedback on your Task 2 essay structure, lexical resource, and grammatical range is being generated...</p>
                        </div>
                    </div>
                    <button class="bg-slate-200/70 text-slate-800 font-bold px-6 py-2.5 rounded-xl flex items-center justify-center gap-2 hover:bg-slate-200 transition-colors text-sm ml-[4rem]">
                        View AI Feedback 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- 5. RECOMMENDED PRACTICE (Horizontal Grid) -->
        <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-sm border border-slate-100 mb-8">
            <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Recommended Practice</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                <!-- Card 1 -->
                <div class="border border-slate-200 rounded-3xl p-6 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 mb-5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                    </div>
                    <h4 class="font-extrabold text-slate-900 mb-1">Writing Task 2 Masterclass</h4>
                    <p class="text-xs font-medium text-slate-400 mb-5">Video + Practice</p>
                    <div class="flex items-center gap-2">
                        <span class="bg-slate-100 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            45 min
                        </span>
                        <span class="bg-slate-100 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>
                            +80 XP
                        </span>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="border border-slate-200 rounded-3xl p-6 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 mb-5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                    </div>
                    <h4 class="font-extrabold text-slate-900 mb-1">Inference & Implication Reading</h4>
                    <p class="text-xs font-medium text-slate-400 mb-5">Practice Set</p>
                    <div class="flex items-center gap-2">
                        <span class="bg-slate-100 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            30 min
                        </span>
                        <span class="bg-slate-100 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>
                            +50 XP
                        </span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="border border-slate-200 rounded-3xl p-6 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 mb-5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                    </div>
                    <h4 class="font-extrabold text-slate-900 mb-1">Speaking Fluency Builder</h4>
                    <p class="text-xs font-medium text-slate-400 mb-5">Interactive</p>
                    <div class="flex items-center gap-2">
                        <span class="bg-slate-100 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            20 min
                        </span>
                        <span class="bg-slate-100 text-slate-600 text-[11px] font-bold px-3 py-1.5 rounded-lg flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>
                            +40 XP
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. BOTTOM ACTION BUTTONS -->
        <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-4 pb-12">
            
            <div class="flex flex-col sm:flex-row w-full md:w-auto items-center gap-4">
                <button class="w-full sm:w-auto bg-transparent border-2 border-slate-200 text-slate-600 font-bold px-8 py-4 rounded-2xl flex items-center justify-center gap-2 hover:bg-slate-100 transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path></svg>
                    Retake Test
                </button>
                <button class="w-full sm:w-auto bg-slate-200/70 text-slate-800 font-bold px-8 py-4 rounded-2xl flex items-center justify-center hover:bg-slate-200 transition-colors shadow-sm">
                    Back to Dashboard
                </button>
            </div>

            <button class="w-full md:w-auto bg-[#1E1F2E] text-white font-bold px-8 py-4 rounded-2xl flex items-center justify-center gap-3 hover:bg-[#2a2c40] transition-colors shadow-md shrink-0">
                Start Recommended Practice 
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path></svg>
            </button>
        </div>

    </main>

</body>
</html>