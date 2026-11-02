@extends('user.test-prep.layouts.app')

@section('content')
    <main class="flex-1 p-6 md:p-10 overflow-y-auto bg-[#F4F5F7]">
    <div class="max-w-6xl mx-auto w-full">
        
        <!-- 1. Header Bagian Atas -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">Test Prep Dashboard</h1>
                <p class="text-slate-500 font-medium mt-1"> • Target: Band 7.0 • Exam in 42 days</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 bg-white px-4 py-2.5 rounded-xl font-bold text-sm text-slate-700 shadow-sm border border-slate-100">
                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>
                    1,820 XP
                </div>
                <div class="flex items-center gap-2 bg-white px-4 py-2.5 rounded-xl font-bold text-sm text-slate-700 shadow-sm border border-slate-100">
                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.67 8.21 8.21 0 003 2.48z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"></path></svg>
                    8d streak
                </div>
                <button class="w-10 h-10 bg-white border border-slate-100 rounded-xl flex items-center justify-center text-slate-500 shadow-sm hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path></svg>
                </button>
            </div>
        </div>

        <!-- 2. Exam Countdown Hero -->
        <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100 mb-8 flex flex-col md:flex-row items-center gap-6 md:gap-8">
            <!-- Lingkaran 42 Days -->
            <div class="w-32 h-32 shrink-0 rounded-full border-[10px] border-[#55BCC9] flex flex-col items-center justify-center">
                <span class="text-3xl font-extrabold text-slate-900 leading-none mb-1">42</span>
                <span class="text-[11px] uppercase font-bold text-slate-500 tracking-wider">days left</span>
            </div>
            
            <!-- Detail & Skor -->
            <div class="flex-1 text-center md:text-left">
                <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-1.5">Exam Countdown</h3>
                <h2 class="text-2xl font-bold text-slate-900 mb-1.5"> — April 22, 2024</h2>
                <p class="text-slate-500 text-sm font-medium mb-5">Keep up your pace — you're on track for Band 7.0!</p>
                
                <div class="flex flex-wrap justify-center md:justify-start gap-3">
                    <div class="bg-slate-100 rounded-xl px-4 py-2.5 text-center w-20">
                        <div class="font-extrabold text-slate-900 text-lg leading-none mb-1">6.5</div>
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Reading</div>
                    </div>
                    <div class="bg-slate-100 rounded-xl px-4 py-2.5 text-center w-20">
                        <div class="font-extrabold text-slate-900 text-lg leading-none mb-1">6.0</div>
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Writing</div>
                    </div>
                    <div class="bg-slate-100 rounded-xl px-4 py-2.5 text-center w-20">
                        <div class="font-extrabold text-slate-900 text-lg leading-none mb-1">7.0</div>
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Listening</div>
                    </div>
                    <div class="bg-slate-100 rounded-xl px-4 py-2.5 text-center w-20">
                        <div class="font-extrabold text-slate-900 text-lg leading-none mb-1">6.5</div>
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Speaking</div>
                    </div>
                </div>
            </div>

            <!-- Tombol CTA -->
            <button class="w-full md:w-auto bg-[#55BCC9] text-white font-bold px-8 py-4 rounded-2xl flex items-center justify-center gap-3 hover:bg-[#1aaabd] transition-colors shadow-md mt-4 md:mt-0 shrink-0">
                Take Mock Test 
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path></svg>
            </button>
        </div>

        <!-- 3. Grid Kolom Bawah (2 Kolom Kiri, 1 Kolom Kanan) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
            
            <!-- ====== KOLOM KIRI (Col-Span 2) ====== -->
            <div class="lg:col-span-2 flex flex-col gap-6 md:gap-8">
                
                <!-- Mock Test Progress -->
                <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase">Mock Test Progress</h3>
                        <a href="#" class="text-sm font-bold text-slate-900 hover:text-indigo-600 transition-colors">View all</a>
                    </div>
                    
                    <div class="flex flex-col">
                        <!-- Item 3 -->
                        <div class="flex items-center justify-between py-4 border-b border-slate-100 group cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500 group-hover:bg-slate-200 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-base">Full Mock Test #3</h4>
                                    <p class="text-xs font-medium text-slate-400 mt-1">Mar 10 • R: 7 • W: 6.5 • L: 6 • S: 6.5</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-right">
                                    <div class="font-extrabold text-xl text-slate-900 leading-none">6.5</div>
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide mt-1">Band</div>
                                </div>
                                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="flex items-center justify-between py-4 border-b border-slate-100 group cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500 group-hover:bg-slate-200 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-base">Full Mock Test #2</h4>
                                    <p class="text-xs font-medium text-slate-400 mt-1">Mar 3 • R: 6.5 • W: 6 • L: 5.5 • S: 6</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-right">
                                    <div class="font-extrabold text-xl text-slate-900 leading-none">6.0</div>
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide mt-1">Band</div>
                                </div>
                                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                        <!-- Item 1 -->
                        <div class="flex items-center justify-between pt-4 group cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500 group-hover:bg-slate-200 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-base">Full Mock Test #1</h4>
                                    <p class="text-xs font-medium text-slate-400 mt-1">Feb 25 • R: 6 • W: 5.5 • L: 5 • S: 5.5</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-right">
                                    <div class="font-extrabold text-xl text-slate-900 leading-none">5.5</div>
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wide mt-1">Band</div>
                                </div>
                                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Learning Units (Grid 2x2) -->
                <div>
                    <div class="flex justify-between items-center mb-6 px-1">
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase">Learning Units</h3>
                        <a href="#" class="text-sm font-bold text-slate-900 hover:text-indigo-600 transition-colors flex items-center gap-1">View all <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg></a>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                        <!-- Unit Card 1 -->
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:-translate-y-1 transition-transform cursor-pointer">
                            <div class="flex justify-between items-start mb-6">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                                </div>
                                <span class="bg-slate-200/60 text-slate-700 px-3 py-1 text-xs font-bold rounded-full">Core</span>
                            </div>
                            <h4 class="font-extrabold text-slate-900 text-lg mb-1">Academic Reading</h4>
                            <p class="text-xs font-medium text-slate-400 mb-6">Passage analysis & inference</p>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden mb-2">
                                <div class="h-full bg-slate-900 w-[65%] rounded-full"></div>
                            </div>
                            <p class="text-[11px] font-bold text-slate-400">65% complete</p>
                        </div>

                        <!-- Unit Card 2 -->
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:-translate-y-1 transition-transform cursor-pointer">
                            <div class="flex justify-between items-start mb-6">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                                </div>
                                <span class="bg-slate-200/60 text-slate-700 px-3 py-1 text-xs font-bold rounded-full">Core</span>
                            </div>
                            <h4 class="font-extrabold text-slate-900 text-lg mb-1">Task 2 Writing</h4>
                            <p class="text-xs font-medium text-slate-400 mb-6">Essay structure & cohesion</p>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden mb-2">
                                <div class="h-full bg-slate-900 w-[40%] rounded-full"></div>
                            </div>
                            <p class="text-[11px] font-bold text-slate-400">40% complete</p>
                        </div>

                        <!-- Unit Card 3 -->
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:-translate-y-1 transition-transform cursor-pointer">
                            <div class="flex justify-between items-start mb-6">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                                </div>
                                <span class="bg-slate-200/60 text-slate-700 px-3 py-1 text-xs font-bold rounded-full">Core</span>
                            </div>
                            <h4 class="font-extrabold text-slate-900 text-lg mb-1">Listening Strategies</h4>
                            <p class="text-xs font-medium text-slate-400 mb-6">Note-taking & inference</p>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden mb-2">
                                <div class="h-full bg-slate-900 w-[55%] rounded-full"></div>
                            </div>
                            <p class="text-[11px] font-bold text-slate-400">55% complete</p>
                        </div>

                        <!-- Unit Card 4 -->
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:-translate-y-1 transition-transform cursor-pointer">
                            <div class="flex justify-between items-start mb-6">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                                </div>
                                <span class="bg-slate-200/60 text-slate-700 px-3 py-1 text-xs font-bold rounded-full">Core</span>
                            </div>
                            <h4 class="font-extrabold text-slate-900 text-lg mb-1">Speaking Part 2</h4>
                            <p class="text-xs font-medium text-slate-400 mb-6">Cue card & fluency</p>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden mb-2">
                                <div class="h-full bg-slate-900 w-[30%] rounded-full"></div>
                            </div>
                            <p class="text-[11px] font-bold text-slate-400">30% complete</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ====== KOLOM KANAN (Col-Span 1) ====== -->
            <div class="lg:col-span-1 flex flex-col gap-6 md:gap-8">
                
                <!-- Upcoming Practice -->
                <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Upcoming Practice</h3>
                    
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm mb-0.5">Writing Task 2</h4>
                                <p class="text-xs font-medium text-slate-400">Today 7:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm mb-0.5">Mini Mock — Listening</h4>
                                <p class="text-xs font-medium text-slate-400">Tomorrow</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-500 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm mb-0.5">Speaking Practice</h4>
                                <p class="text-xs font-medium text-slate-400">Wed Mar 15</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Goal -->
                <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100 text-center">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6 text-left">Today's Goal</h3>
                    
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 rounded-full border-[6px] border-[#55BCC9] flex flex-col items-center justify-center">
                            <span class="text-2xl font-extrabold text-slate-900 leading-none">45%</span>
                            <span class="text-[9px] uppercase font-bold text-slate-500 tracking-wider mt-1">complete</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-3 text-left pl-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="w-5 h-5 rounded-md bg-slate-900 flex items-center justify-center text-white shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path></svg>
                            </div>
                            <span class="text-sm font-medium text-slate-400 line-through">Vocabulary set</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="w-5 h-5 rounded-md border-2 border-slate-200 shrink-0"></div>
                            <span class="text-sm font-medium text-slate-700">Reading passage</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="w-5 h-5 rounded-md border-2 border-slate-200 shrink-0"></div>
                            <span class="text-sm font-medium text-slate-700">Writing task</span>
                        </label>
                    </div>
                </div>

                <!-- Band Score Tracker -->
                <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Band Score Tracker</h3>
                    
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold text-slate-400">Reading</span>
                                <span class="text-xs font-extrabold text-slate-900">6.5 → 7</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-slate-900 w-[90%] rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold text-slate-400">Writing</span>
                                <span class="text-xs font-extrabold text-slate-900">6 → 7</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-slate-900 w-[75%] rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold text-slate-400">Listening</span>
                                <span class="text-xs font-extrabold text-slate-900">7 → 7</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-slate-900 w-[100%] rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold text-slate-400">Speaking</span>
                                <span class="text-xs font-extrabold text-slate-900">6.5 → 7</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-slate-900 w-[90%] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
@endsection