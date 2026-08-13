@extends('user.general.layouts.app')

@section('content')
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- Header Section (White Background) -->
        <header class="bg-white border-b border-slate-200 sticky top-0 z-10 px-8 py-6 flex justify-between items-center shrink-0">
            <div class="flex items-start gap-4">
                <!-- Back Button -->
                <button class="mt-1 p-1 text-slate-400 hover:text-slate-800 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-2xl font-extrabold text-slate-900">Everyday Conversations</h1>
                    </div>
                    <div class="flex items-center gap-4 text-sm font-medium text-slate-700">
                        <span class="flex items-center gap-1.5">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div> 12 lessons</span>
                        <span class="flex items-center gap-1.5"><div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-orange-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div> ~2.5 hours total</span>
                        <span class="flex items-center gap-1.5"><div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-amber-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                        </div> +420 XP</span>
                    </div>
                </div>
            </div>
            
            <!-- Circular Progress in Header -->
            <div class="w-16 h-16 rounded-full border-4 border-[#55BCC9] flex items-center justify-center">
                <span class="font-extrabold text-sm text-slate-900">50%</span>
            </div>
        </header>

        <!-- Module Content Container -->
        <div class="p-8 max-w-7xl mx-auto w-full">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- LEFT COLUMN: Lessons List (Col-span 2) -->
                <div class="lg:col-span-2 flex flex-col gap-4">
                    
                    <!-- Progress Bar Overall -->
                    <div class="h-3 bg-slate-200 rounded-full mb-2 w-full max-w-md overflow-hidden">
                        <div class="h-full bg-[#55BCC9] w-[50%] rounded-full"></div>
                    </div>

                    <!-- Lesson Card: Completed -->
                    <div class="bg-white p-5 rounded-2xl flex items-center justify-between shadow-sm border border-slate-100 transition-transform hover:-translate-y-0.5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#55BCC9] rounded-full flex items-center justify-center shrink-0">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </div> 
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-lg">Lesson 1: Introduction & Greetings</h4>
                                <p class="text-sm font-medium text-slate-600 mt-0.5 flex items-center gap-3">
                                    <span class="inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg> 8 min
                                    </span> 
                                    <span class="inline-flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-amber-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    +30 XP
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Lesson Card: Completed -->
                    <div class="bg-white p-5 rounded-2xl flex items-center justify-between shadow-sm border border-slate-100 transition-transform hover:-translate-y-0.5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#55BCC9] rounded-full flex items-center justify-center shrink-0">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </div> 
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-lg">Lesson 1: Introduction & Greetings</h4>
                                <p class="text-sm font-medium text-slate-600 mt-0.5 flex items-center gap-3">
                                    <span class="inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg> 8 min
                                    </span> 
                                    <span class="inline-flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-amber-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    +30 XP
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Lesson Card: Active (Next to do) -->
                    <div class="bg-white p-5 rounded-2xl flex items-center justify-between shadow-md border-2 border-slate-100 transition-transform hover:-translate-y-0.5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 border-2 border-[#55BCC9] rounded-full flex items-center justify-center shrink-0 font-extrabold text-slate-900">
                                3
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-lg">Lesson 3: Family & Relationships</h4>
                                <p class="text-sm font-medium text-slate-600 mt-0.5 flex items-center gap-3">
                                    <span class="inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg> 8 min
                                    </span> 
                                    <span class="inline-flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-amber-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    +30 XP
                                    </span>
                                </p>
                            </div>
                        </div>
                        <button class="bg-[#55BCC9] text-white font-bold px-6 py-2.5 rounded-xl flex items-center gap-2 hover:bg-[#21adbf]">
                            Start 
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Lesson Card: Locked -->
                    <div class="bg-white/60 p-5 rounded-2xl flex items-center justify-between border border-slate-100 opacity-70">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#55BCC9] rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-500 text-lg">Lesson 5: Expressing Feelings</h4>
                                <p class="text-sm font-medium text-slate-400 mt-0.5 flex items-center gap-3">
                                    <span class="inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg> 8 min
                                    </span> 
                                    <span class="inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-amber-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                        </svg>
                                    +30 XP
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Final Quiz Card -->
                    <div class="bg-white p-6 rounded-3xl mt-4 flex justify-between items-center shadow-sm border border-slate-100">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 bg-[#55BCC9] rounded-2xl flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-extrabold text-slate-900 text-xl">Final Module Quiz</h3>
                                <p class="text-slate-500 font-medium text-sm mt-1 mb-3">Complete all lessons to unlock — 20 questions</p>
                                <div class="flex gap-2">
                                    <span class="px-3 py-1 bg-[#cef3f8] text-slate-700 text-xs font-bold rounded-full inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-4 h-4 text-amber-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                        </svg> +150 XP on pass
                                    </span>
                                    <span class="px-3 py-1 bg-[#cef3f8] text-slate-700 text-xs font-bold rounded-full inline-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-4 h-4 text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                         30 min
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button class="bg-slate-100 text-slate-500 font-bold px-6 py-3 rounded-xl flex items-center gap-2 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg> Unlock
                        </button>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Widgets (Col-span 1) -->
                <div class="lg:col-span-1 flex flex-col gap-6">
                    
                    <!-- Mini Dictionary Widget -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider mb-4">MINI DICTIONARY</h3>
                        
                        <!-- Search Bar -->
                        <div class="relative mb-6">
                            <input type="text" placeholder="Search vocabulary..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-4 text-sm focus:outline-none focus:border-slate-400">
                        </div>

                        <!-- Vocab List -->
                        <div class="flex flex-col">
                            <!-- Item 1 -->
                            <div class="flex justify-between items-center py-3 border-b border-slate-50">
                                <div>
                                    <h5 class="font-bold text-slate-900">Hola</h5>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Spanish • Greeting</p>
                                </div>
                                <button class="w-8 h-8 rounded-full hover:bg-slate-50 flex items-center justify-center text-slate-400">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#55BCC9]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <!-- Item 2 -->
                            <div class="flex justify-between items-center py-3 border-b border-slate-50">
                                <div>
                                    <h5 class="font-bold text-slate-900">Buenos días</h5>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Spanish • Greeting</p>
                                </div>
                                <button class="w-8 h-8 rounded-full hover:bg-slate-50 flex items-center justify-center text-slate-400">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#55BCC9]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <!-- Item 3 -->
                            <div class="flex justify-between items-center py-3 border-b border-slate-50">
                                <div>
                                    <h5 class="font-bold text-slate-900">Por favor</h5>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Spanish • Greeting</p>
                                </div>
                                <button class="w-8 h-8 rounded-full hover:bg-slate-50 flex items-center justify-center text-slate-400">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#55BCC9]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Module Progress Widget -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <h3 class="text-xs font-bold text-slate-400 tracking-wider mb-6">MODULE PROGRESS</h3>
                        
                        <!-- Circular Chart Placeholder -->
                        <div class="flex justify-center mb-8">
                            <div class="w-28 h-28 rounded-full border-8 border-[#55BCC9] flex items-center justify-center">
                                <span class="font-extrabold text-xl text-slate-900">50%</span>
                            </div>
                        </div>

                        <!-- Stats Rows -->
                        <div class="flex flex-col gap-4">
                            <div class="flex justify-between items-center pb-3 border-b border-slate-50">
                                <span class="text-sm text-slate-400 font-medium">Lessons done</span>
                                <span class="text-sm font-bold text-slate-900">3 / 6</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-slate-50">
                                <span class="text-sm text-slate-400 font-medium">Vocabulary learned</span>
                                <span class="text-sm font-bold text-slate-900 text-right">24<br>words</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-slate-50">
                                <span class="text-sm text-slate-400 font-medium">Quiz score avg</span>
                                <span class="text-sm font-bold text-slate-900">—</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-400 font-medium">Time invested</span>
                                <span class="text-sm font-bold text-slate-900">38 min</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection