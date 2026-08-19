@extends('user.general.layouts.app')

@section('content')
    <main class="flex-1 flex flex-col overflow-y-auto bg-[#F8FAFC] p-6 lg:p-10">
    
    <!-- HEADER SECTION -->
    <div class="mb-8">
        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">Learning Modules</h1>
        <p class="text-slate-500 mt-2 font-medium">Pick a topic and start mastering your vocabulary today.</p>
    </div>

    <!-- MAIN GRID LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT COLUMN: MODULES GRID (Takes up 8 columns) -->
        <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-5 self-start">
            
            <!-- MODULE 1: Everyday Conversations (In Progress) -->
            {{-- <div class="bg-white border-2 border-[#55BCC9]/20 rounded-2xl p-5 shadow-[0_4px_15px_rgba(85,188,201,0.1)] flex flex-col transition-transform hover:-translate-y-1 relative overflow-hidden group">
                <!-- Icon & Title -->
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 shrink-0 rounded-2xl bg-[#55BCC9] flex items-center justify-center text-white shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 leading-tight transition-colors">Everyday Conversations</h3>
                        <p class="text-xs text-slate-400 font-medium mt-1">12 lessons • 2.5 hours</p>
                    </div>
                </div>
                
                <!-- Progress Bar -->
                <div class="mt-auto">
                    <div class="flex justify-between items-end mb-1.5 text-sm font-bold">
                        <span class="text-[#55BCC9]">50%</span>
                        <span class="text-slate-400 text-xs">6/12 done</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2">
                        <div class="bg-[#55BCC9] h-2 rounded-full" style="width: 50%"></div>
                    </div>
                </div>
                
                <a href="{{ route('user.general.sub-module') }}" class="mt-5 text-center w-full bg-[#55BCC9] hover:bg-[#48a9b5] text-white py-2.5 rounded-xl font-semibold transition-colors text-sm">
                    Continue Learning
                </a>
            </div> --}}

            <!-- MODULE 2: Travel & Navigation (Not Started) -->
            @foreach ($modules as $item)
                <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col transition-transform hover:-translate-y-1 group">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 shrink-0 rounded-2xl flex items-center justify-center shadow-sm" style="color: {{ $item->color }}; background-color: {{ $item->background_color }};">
                        {!! $item->icon !!}
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 leading-tight transition-colors">{{ $item->title }}</h3>
                        <p class="text-xs text-slate-400 font-medium mt-1">8 lessons • 1.5 hours</p>
                    </div>
                </div>
                
                <div class="mt-auto">
                    <div class="flex justify-between items-end mb-1.5 text-sm font-bold">
                        <span class="text-slate-300">0%</span>
                        <span class="text-slate-400 text-xs">0/8 done</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2">
                        <div class="bg-slate-300 h-2 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
                
                <a href="{{ route('user.general.sub-module') }}" class="mt-5 text-center w-full bg-slate-50 hover:bg-slate-100 text-slate-700 py-2.5 rounded-xl font-semibold transition-colors text-sm border border-slate-200">
                    Start Module
                </a>
            </div>
            @endforeach
            
            <!-- MODULE 4: Locked -->
            <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.02)] flex flex-col opacity-60 grayscale-[40%] select-none">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 shrink-0 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-500 leading-tight">Business & Work</h3>
                        <p class="text-xs text-slate-400 font-medium mt-1">Unlock at Level 5</p>
                    </div>
                </div>
                
                <div class="mt-auto pt-8">
                    <button disabled class="w-full bg-slate-100 text-slate-400 py-2.5 rounded-xl font-semibold cursor-not-allowed text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
                        Locked
                    </button>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: GLOBAL WIDGETS (Takes up 4 columns) -->
        <div class="lg:col-span-4 flex flex-col gap-6">
            
            <!-- Global Profile/Streak Widget -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
                <h4 class="text-xs font-extrabold text-slate-400 tracking-wider mb-6 uppercase text-center">Daily Goal</h4>
                
                <div class="flex justify-center mb-6">
                    <!-- Circular Progress -->
                    <div class="relative w-32 h-32 flex items-center justify-center">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="transparent" class="text-slate-100" />
                            <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="150" class="text-[#55BCC9]" stroke-linecap="round" />
                        </svg>
                        <div class="absolute flex flex-col items-center">
                            <span class="text-2xl font-bold text-slate-800">12</span>
                            <span class="text-xs font-bold text-slate-400">/ 30 MIN</span>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.866 8.21 8.21 0 0 0 3 2.48Z" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800">3 Day Streak!</p>
                            <p class="text-xs text-slate-400 font-medium">Keep it up!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Global Stats Widget -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
                <h4 class="text-xs font-extrabold text-slate-400 tracking-wider mb-5 uppercase">Overall Stats</h4>
                
                <div class="flex flex-col gap-4 text-sm">
                    <div class="flex justify-between items-center bg-slate-50 px-4 py-3 rounded-xl border border-slate-100">
                        <span class="text-slate-500 font-medium flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>
                            Total XP
                        </span>
                        <span class="font-bold text-slate-800">1,240</span>
                    </div>
                    <div class="flex justify-between items-center bg-slate-50 px-4 py-3 rounded-xl border border-slate-100">
                        <span class="text-slate-500 font-medium flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-indigo-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                            Words Mastered
                        </span>
                        <span class="font-bold text-slate-800">142</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection