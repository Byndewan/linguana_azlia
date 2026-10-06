@extends('user.test-prep.layouts.app')

@section('content')
    <main class="flex-1 flex flex-col overflow-y-auto bg-[#F8FAFC] p-6 lg:p-10">
    
        <!-- BACK BUTTON & HEADER SECTION -->
        <div class="mb-8">
            <a href="{{ route('user.test-prep.module') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-400 hover:text-slate-600 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Back to Modules
            </a>
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">Reading Comprehension Sub-Modules</h1>
                    <p class="text-slate-500 mt-1 font-medium">Select a sub-topic or passage type below to start focused practice.</p>
                </div>
                <!-- Progress Indicator -->
                <div class="bg-white border border-slate-100 px-4 py-3 rounded-2xl shadow-sm flex items-center gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Section Progress</p>
                        <p class="text-sm font-bold text-slate-800 mt-0.5">2 of 5 Completed</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-sky-50 flex items-center justify-center text-sky-600 font-bold text-sm">
                        40%
                    </div>
                </div>
            </div>
        </div>

        <!-- SUB-MODULES GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Sub-Module Card 1: Completed -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between group hover:border-sky-200 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg">Completed</span>
                        <span class="text-xs font-semibold text-slate-400">10 Questions</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-800 group-hover:text-sky-600 transition-colors">Natural Sciences: Ecosystem Dynamics</h3>
                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">Practice reading academic passages related to environmental science and biology adaptations.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500">Score: 9/10</span>
                    <a href="#" class="text-xs font-bold text-sky-600 hover:text-sky-700 inline-flex items-center gap-1">
                        Reviewing <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                    </a>
                </div>
            </div>

            <!-- Sub-Module Card 2: In Progress / Active -->
            <div class="bg-white border border-sky-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold px-3 py-1 bg-sky-50 text-sky-600 rounded-lg">In Progress</span>
                        <span class="text-xs font-semibold text-slate-400">12 Questions</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-800 group-hover:text-sky-600 transition-colors">Arts & Literature: Renaissance Movements</h3>
                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">Analyze complex vocabulary and author intent in historical art history texts.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500">Last attempt: 50%</span>
                    <a href="#" class="px-4 py-2 bg-[#55BCC9] hover:bg-[#03a9bf] text-white text-xs font-bold rounded-xl transition-colors">
                        Continue
                    </a>
                </div>
            </div>

            <!-- Sub-Module Card 3: Not Started -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between group hover:border-sky-200 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold px-3 py-1 bg-slate-100 text-slate-500 rounded-lg">Not Started</span>
                        <span class="text-xs font-semibold text-slate-400">15 Questions</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-800 group-hover:text-sky-600 transition-colors">Social Sciences: Urbanization Trends</h3>
                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">Examine demographic shifts, economic factors, and urban infrastructure evolution.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400">Estimated: 12 mins</span>
                    <a href="#" class="px-4 py-2 bg-slate-100 hover:bg-[#55BCC9] hover:text-white text-slate-600 text-xs font-bold rounded-xl transition-colors">
                        Start Practice
                    </a>
                </div>
            </div>

            <!-- Sub-Module Card 4: Not Started -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between group hover:border-sky-200 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold px-3 py-1 bg-slate-100 text-slate-500 rounded-lg">Not Started</span>
                        <span class="text-xs font-semibold text-slate-400">10 Questions</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-800 group-hover:text-sky-600 transition-colors">Technology & Innovation: AI History</h3>
                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">Comprehend technical passages outlining the transition of computing paradigms.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400">Estimated: 10 mins</span>
                    <a href="#" class="px-4 py-2 bg-slate-100 hover:bg-[#55BCC9] hover:text-white text-slate-600 text-xs font-bold rounded-xl transition-colors">
                        Start Practice
                    </a>
                </div>
            </div>

            <!-- Sub-Module Card 5: Not Started -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between group hover:border-sky-200 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold px-3 py-1 bg-slate-100 text-slate-500 rounded-lg">Not Started</span>
                        <span class="text-xs font-semibold text-slate-400">14 Questions</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-800 group-hover:text-sky-600 transition-colors">Psychology: Cognitive Development</h3>
                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">Read theoretical arguments and empirical studies regarding human learning behavior.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-400">Estimated: 15 mins</span>
                    <a href="#" class="px-4 py-2 bg-slate-100 hover:bg-[#55BCC9] hover:text-white text-slate-600 text-xs font-bold rounded-xl transition-colors">
                        Start Practice
                    </a>
                </div>
            </div>

        </div>
    </main>
@endsection