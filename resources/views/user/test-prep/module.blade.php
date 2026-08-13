@extends('user.test-prep.layouts.app')

@section('content')
<!-- ================= MAIN CONTENT AREA ================= -->
<main class="flex-1 flex flex-col h-full overflow-y-auto bg-[#F4F5F7]">
    
    <!-- HEADER MODUL (Putih) -->
    <div class="bg-white px-6 md:px-10 py-6 border-b border-slate-200 shrink-0">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-6">
            
            <div class="flex items-start gap-4 md:gap-6">
                <!-- Back Button -->
                <button class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-500 hover:bg-slate-50 transition-colors shrink-0 mt-1 md:mt-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Judul & Meta Info -->
                <div class="flex flex-col">
                    <div class="flex flex-wrap items-center gap-3 mb-2">
                        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900">Academic Reading</h1>
                        <span class="bg-slate-200/60 text-slate-700 px-3 py-1 text-xs font-bold rounded-full">Core Module</span>
                        <span class="bg-slate-200/60 text-slate-700 px-3 py-1 text-xs font-bold rounded-full flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"></path></svg>
                            IELTS
                        </span>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-slate-500">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h12M6 12h12M6 18h12"></path></svg>
                            6 units
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            ~2.5 hours
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"></path></svg>
                            Band target: 7.0
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lingkaran Progress 33% -->
            <div class="w-16 h-16 md:w-20 md:h-20 shrink-0 rounded-full border-[6px] md:border-[8px] border-slate-900 flex flex-col items-center justify-center mt-4 md:mt-0">
                <span class="text-sm md:text-lg font-extrabold text-slate-900 leading-none">33%</span>
            </div>

        </div>
    </div>

    <!-- BODY KONTEN (Background Abu-abu) -->
    <div class="p-6 md:p-10 w-full">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 items-start">
            
            <!-- ====== KOLOM KIRI (Daftar Modul) ====== -->
            <div class="lg:col-span-2 flex flex-col gap-5">
                
                <!-- Progress Bar Lurus -->
                <div class="w-full max-w-sm h-3 bg-slate-200 rounded-full overflow-hidden mb-2">
                    <div class="h-full bg-slate-900 w-[33%] rounded-full"></div>
                </div>

                <!-- 1. Lesson Completed -->
                <div class="bg-white rounded-3xl p-5 shadow-sm border border-slate-100 flex items-center justify-between group cursor-pointer hover:border-slate-200 transition-colors">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-slate-900 text-white flex items-center justify-center shrink-0 shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-900 text-lg">Understanding the Test Format</h3>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-400 mt-1">
                                <span>Video + Lesson</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 15 min</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-slate-300 pr-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <!-- 2. Lesson Completed -->
                <div class="bg-white rounded-3xl p-5 shadow-sm border border-slate-100 flex items-center justify-between group cursor-pointer hover:border-slate-200 transition-colors">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-slate-900 text-white flex items-center justify-center shrink-0 shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-900 text-lg">Skimming & Scanning Techniques</h3>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-400 mt-1">
                                <span>Video + Quiz</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 20 min</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-slate-300 pr-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <!-- 3. Current Active Lesson -->
                <div class="bg-white rounded-3xl p-5 shadow-md border-2 border-slate-900 flex items-center justify-between transform transition-transform hover:-translate-y-0.5 relative">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full border-2 border-slate-900 bg-white text-slate-900 flex items-center justify-center shrink-0 font-extrabold text-lg">
                            3
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-900 text-lg">True / False / Not Given</h3>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-400 mt-1">
                                <span>Practice Set</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 25 min</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-slate-900 text-white font-bold px-6 py-3 rounded-xl flex items-center gap-2 hover:bg-slate-800 transition-colors shadow-sm shrink-0">
                        Start 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347c-.75.412-1.667-.13-1.667-.986V5.653z"></path></svg>
                    </button>
                </div>

                <!-- 4. Locked Lesson -->
                <div class="bg-white/60 rounded-3xl p-5 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-300 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-400 text-lg">Matching Headings</h3>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-300 mt-1">
                                <span>Video + Practice</span>
                                <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 30 min</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Locked Lesson -->
                <div class="bg-white/60 rounded-3xl p-5 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-300 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-400 text-lg">Summary Completion</h3>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-300 mt-1">
                                <span>Practice Set</span>
                                <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 20 min</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Locked Mock Test -->
                <div class="bg-white/60 rounded-3xl p-5 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-300 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-slate-400 text-lg">Mini Mock — Reading</h3>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-300 mt-1">
                                <span>Mock Test</span>
                                <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 60 min</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ====== KOLOM KANAN (Widgets) ====== -->
            <div class="lg:col-span-1 flex flex-col gap-6 md:gap-8">
                
                <!-- Widget 1: Mini Dictionary -->
                <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-5">Mini Dictionary</h3>
                    
                    <!-- Search Input -->
                    <div class="relative mb-6">
                        <input type="text" placeholder="Search terms..." class="w-full bg-slate-100 text-slate-700 text-sm font-medium rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-slate-300 transition-all placeholder:text-slate-400">
                    </div>

                    <!-- Vocab List -->
                    <div class="flex flex-col gap-4">
                        <div class="border-b border-slate-100 pb-4">
                            <h4 class="font-bold text-slate-900">Inference</h4>
                            <p class="text-xs text-slate-400 mt-0.5">IELTS Academic Vocabulary</p>
                        </div>
                        <div class="border-b border-slate-100 pb-4">
                            <h4 class="font-bold text-slate-900">Paraphrase</h4>
                            <p class="text-xs text-slate-400 mt-0.5">IELTS Academic Vocabulary</p>
                        </div>
                        <div class="border-b border-slate-100 pb-4">
                            <h4 class="font-bold text-slate-900">Cohesion</h4>
                            <p class="text-xs text-slate-400 mt-0.5">IELTS Academic Vocabulary</p>
                        </div>
                        <div class="border-b border-slate-100 pb-4">
                            <h4 class="font-bold text-slate-900">Coherence</h4>
                            <p class="text-xs text-slate-400 mt-0.5">IELTS Academic Vocabulary</p>
                        </div>
                        <div class="pb-1">
                            <h4 class="font-bold text-slate-900">Lexical Range</h4>
                            <p class="text-xs text-slate-400 mt-0.5">IELTS Academic Vocabulary</p>
                        </div>
                    </div>
                </div>

                <!-- Widget 2: Section Performance -->
                <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Section Performance</h3>
                    
                    <div class="flex flex-col gap-5 mb-8">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-slate-400">Accuracy</span>
                            <span class="text-sm font-extrabold text-slate-900">68%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-slate-400">Speed</span>
                            <span class="text-sm font-extrabold text-slate-900">Moderate</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-slate-400">Vocab range</span>
                            <span class="text-sm font-extrabold text-slate-900">Good</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-slate-400">Strategy use</span>
                            <span class="text-sm font-extrabold text-slate-900">Developing</span>
                        </div>
                    </div>

                    <button class="w-full bg-slate-200/70 text-slate-800 font-bold px-6 py-4 rounded-xl flex items-center justify-between hover:bg-slate-200 transition-colors">
                        Continue Learning 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>

            </div>

        </div>
    </div>
</main>
@endsection