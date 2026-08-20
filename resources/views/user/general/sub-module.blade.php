@extends('user.general.layouts.app')

@section('content')
    <main class="flex-1 flex flex-col overflow-y-auto bg-[#F8FAFC] p-6 lg:p-10">
    
    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-4">
            <!-- Back Button -->
            <a href="{{ route('user.general.module') }}">
                <button class="cursor-pointer w-10 h-10 shrink-0 flex items-center justify-center rounded-full border border-slate-200 bg-white text-slate-500 hover:bg-slate-50 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            </a>
    
            <!-- Title & Meta -->
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">{{ $module->title }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mt-2 font-medium">
                    <span class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-indigo-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                        {{ $module->sub_modules_count }} lessons
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-orange-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        {{ $module->sub_modules_sum_time ?? 0 }} minutes total
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>
                        +{{ $module->sub_modules_sum_point ?? 0 }} XP
                    </span>
                </div>
            </div>
        </div>

        <!-- Circular Progress Top Right -->
        <div class="relative w-14 h-14 shrink-0 flex items-center justify-center rounded-full bg-white border-[3px] border-[#55BCC9] shadow-sm">
            <span class="text-sm font-bold text-slate-700">50%</span>
        </div>
    </div>

    <!-- MAIN GRID LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT COLUMN: LESSONS LIST (Takes up 8 columns on large screen) -->
        <div class="lg:col-span-8 flex flex-col gap-5">
            
            <!-- Progress Bar -->
            <div class="flex items-center gap-4 mb-2">
                <div class="w-full bg-slate-200 rounded-full h-2.5">
                    <div class="bg-[#55BCC9] h-2.5 rounded-full" style="width: 50%"></div>
                </div>
            </div>

            <!-- CARD 1: Completed Lesson -->
            {{-- <div class="bg-white border border-slate-100 rounded-2xl p-4 lg:p-5 flex items-center gap-4 shadow-[0_2px_10px_rgba(0,0,0,0.03)] transition-transform hover:-translate-y-0.5">
                <div class="w-12 h-12 shrink-0 rounded-full bg-[#55BCC9] flex items-center justify-center text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-slate-800">Lesson 1: Introduction & Greetings</h3>
                    <div class="flex items-center gap-3 text-sm text-slate-400 font-medium mt-1">
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-orange-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg> 8 min</span>
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg> +30 XP</span>
                    </div>
                </div>
            </div> --}}

            <!-- CARD 2: Active Lesson -->
            {{-- <div class="bg-white border-2 border-[#55BCC9]/20 rounded-2xl p-4 lg:p-5 flex items-center gap-4 shadow-[0_4px_15px_rgba(85,188,201,0.1)] transition-transform hover:-translate-y-0.5 relative overflow-hidden">
                <div class="w-12 h-12 shrink-0 rounded-full border-2 border-slate-200 flex items-center justify-center font-bold text-lg text-slate-700 bg-slate-50">
                    2
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-slate-800">Lesson 3: Family & Relationships</h3>
                    <div class="flex items-center gap-3 text-sm text-slate-400 font-medium mt-1">
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-orange-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg> 8 min</span>
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg> +30 XP</span>
                    </div>
                </div>
                <a href="#" class="hidden md:flex items-center gap-2 bg-[#55BCC9] hover:bg-[#48a9b5] text-white px-5 py-2.5 rounded-xl font-semibold transition-colors">
                    Start
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347c-.75.412-1.667-.13-1.667-.986V5.653Z" /></svg>
                </a>
            </div> --}}

            @foreach ($module->subModules as $item)
                <div class="bg-white border-2 border-[#55BCC9]/20 rounded-2xl p-4 lg:p-5 flex items-center gap-4 shadow-[0_4px_15px_rgba(85,188,201,0.1)] transition-transform hover:-translate-y-0.5 relative overflow-hidden">
                <div class="w-12 h-12 shrink-0 rounded-full border-2 border-slate-200 flex items-center justify-center font-bold text-lg text-slate-700 bg-slate-50">
                    {{ $item->order_number }}
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-slate-800">Lesson {{ $item->order_number }}: {{ $item->title }}</h3>
                    <div class="flex items-center gap-3 text-sm text-slate-400 font-medium mt-1">
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-orange-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg> {{ $item->time }} min</span>
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg> +{{ $item->point }} XP</span>
                    </div>
                </div>
            </div>
            @endforeach
            

            <!-- CARD 3: Locked Lesson -->
            <div class="bg-white border border-slate-100 rounded-2xl p-4 lg:p-5 flex items-center gap-4 shadow-[0_2px_10px_rgba(0,0,0,0.02)] opacity-60 grayscale-[30%] select-none">
                <div class="w-12 h-12 shrink-0 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-slate-500">Lesson 5: Expressing Feelings</h3>
                    <div class="flex items-center gap-3 text-sm text-slate-400 font-medium mt-1">
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg> 8 min</span>
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg> +30 XP</span>
                    </div>
                </div>
            </div>

            <!-- CARD 4: Final Quiz -->
            <div class="bg-white border border-slate-100 rounded-2xl p-5 lg:p-6 flex flex-col md:flex-row md:items-center gap-5 shadow-[0_2px_10px_rgba(0,0,0,0.03)] mt-2">
                <div class="w-14 h-14 shrink-0 rounded-2xl bg-[#55BCC9] flex items-center justify-center text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" /></svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-slate-800">Final Module Quiz</h3>
                    <p class="text-sm text-slate-500 font-medium mt-1">Complete all lessons to unlock — 20 questions</p>
                    <div class="flex items-center gap-2 mt-3">
                        <span class="bg-amber-50 text-amber-600 px-2.5 py-1 rounded-md text-xs font-bold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg> +150 XP on pass
                        </span>
                        <span class="bg-slate-100 text-slate-600 px-2.5 py-1 rounded-md text-xs font-bold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg> 30 min
                        </span>
                    </div>
                </div>
                <button disabled class="flex items-center gap-2 bg-slate-100 text-slate-400 px-5 py-2.5 rounded-xl font-semibold cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
                    Unlock
                </button>
            </div>

        </div>

        <!-- RIGHT COLUMN: WIDGETS (Takes up 4 columns on large screen) -->
        <div class="lg:col-span-4 flex flex-col gap-6">
            
            <!-- Mini Dictionary Widget -->
            <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
                <h4 class="text-xs font-extrabold text-slate-400 tracking-wider mb-4 uppercase">Mini Dictionary</h4>
                
                <div class="relative mb-5">
                    <input type="text" placeholder="Search vocabulary..." class="w-full bg-slate-50 border border-slate-200 text-sm rounded-xl pl-4 pr-10 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#55BCC9]/50 transition-shadow text-slate-700">
                </div>

                <div class="flex flex-col gap-4">
                    <!-- Word 1 -->
                    <div class="flex items-center justify-between group cursor-pointer">
                        <div>
                            <p class="font-bold text-slate-800 text-sm group-hover:text-[#55BCC9] transition-colors">Hola</p>
                            <p class="text-xs text-slate-400 mt-0.5">Spanish • Greeting</p>
                        </div>
                        <button class="w-8 h-8 rounded-full flex items-center justify-center text-[#55BCC9] hover:bg-cyan-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" /></svg>
                        </button>
                    </div>
                    <hr class="border-slate-100">
                    
                    <!-- Word 2 -->
                    <div class="flex items-center justify-between group cursor-pointer">
                        <div>
                            <p class="font-bold text-slate-800 text-sm group-hover:text-[#55BCC9] transition-colors">Buenos días</p>
                            <p class="text-xs text-slate-400 mt-0.5">Spanish • Greeting</p>
                        </div>
                        <button class="w-8 h-8 rounded-full flex items-center justify-center text-[#55BCC9] hover:bg-cyan-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" /></svg>
                        </button>
                    </div>
                    <hr class="border-slate-100">

                    <!-- Word 3 -->
                    <div class="flex items-center justify-between group cursor-pointer">
                        <div>
                            <p class="font-bold text-slate-800 text-sm group-hover:text-[#55BCC9] transition-colors">Por favor</p>
                            <p class="text-xs text-slate-400 mt-0.5">Spanish • Greeting</p>
                        </div>
                        <button class="w-8 h-8 rounded-full flex items-center justify-center text-[#55BCC9] hover:bg-cyan-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" /></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Module Progress Widget -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
                <h4 class="text-xs font-extrabold text-slate-400 tracking-wider mb-6 uppercase">Module Progress</h4>
                
                <div class="flex justify-center mb-8">
                    <!-- Fake SVG Circle Progress -->
                    <div class="relative w-28 h-28 flex items-center justify-center">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="transparent" class="text-slate-100" />
                            <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="125.6" class="text-[#55BCC9]" stroke-linecap="round" />
                        </svg>
                        <span class="absolute text-2xl font-bold text-slate-800">50%</span>
                    </div>
                </div>

                <div class="flex flex-col gap-4 text-sm">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Lessons done</span>
                        <span class="font-bold text-slate-800">3 / 6</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Vocabulary learned</span>
                        <div class="text-right">
                            <span class="font-bold text-slate-800 block leading-tight">24</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">words</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Quiz score avg</span>
                        <span class="font-bold text-slate-800">—</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Time invested</span>
                        <span class="font-bold text-slate-800">38 min</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection