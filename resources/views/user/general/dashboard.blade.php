@extends('user.general.layouts.app')

@section('content')
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- Header Top (Sticky) -->
        <header class="sticky top-0 z-10 flex items-center justify-between px-8 py-6 bg-[#FBFBFB]/90 backdrop-blur-sm">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">Welcome, {{ $user->name }}</h1>
                <p class="text-sm text-slate-500 mt-1">Focus on becoming a little better every day!</p>
            </div>
            <div class="flex items-center gap-4">
                <!-- Active Language Badge/Button -->
                <div class="flex items-center gap-2 px-4 py-2 bg-white rounded-full border border-slate-200 shadow-sm text-sm font-semibold text-slate-700">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#55BCC9]"></span>
                    <span>{{ $currentLanguage->language }}</span>
                </div>

                <!-- Bell Icon -->
                <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center border border-slate-200 shadow-sm transition-colors hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#55BCC9]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>
            </div>
        </header>

        <!-- Dashboard Content Container -->
        <div class="p-8 max-w-7xl mx-auto w-full flex flex-col gap-8">
            
            <!-- 1. Hero Section: Continue Learning -->
            <section class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm relative overflow-hidden">
    <div class="text-xs font-bold text-slate-500 tracking-wider mb-2">CONTINUE LEARNING</div>
    
    @if($activeModule && $activeModule->current_active_sub)
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">
                    {{ $activeModule->title }} — Lesson {{ $activeModule->current_active_sub->order_number }}
                </h2>
                <p class="text-slate-500 mt-1">
                    {{ $activeModule->current_active_sub->title ?? 'Mulai sesi pembelajaranmu' }}
                </p>
            </div>
            
            <!-- Tombol Resume dengan Route & Cursor Pointer -->
            <button onclick="window.location.href='{{ route('user.general.sub-module', ['id' => $activeModule->id]) }}'" 
                    class="px-6 py-3 bg-[#55BCC9] text-white font-bold rounded-xl flex items-center gap-2 hover:bg-[#45a3af] transition-colors cursor-pointer shadow-md">
                Resume 
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                </div>
            </button>
        </div>

        <!-- Progress Bar Dinamis -->
        <div class="flex items-center gap-4 mb-4">
            <div class="flex-1 h-3 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-[#55BCC9] rounded-full transition-all duration-500" style="width: {{ $activeModule->progress_percentage }}%;"></div>
            </div>
            <span class="text-sm font-bold text-slate-500">{{ $activeModule->progress_percentage }}%</span>
        </div>

        <!-- Meta info Dinamis -->
        <div class="flex flex-wrap items-center gap-6 text-sm text-slate-700">
            <!-- Lessons Completed -->
            <span class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-indigo-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg> 
                {{ $activeModule->completed_count }} / {{ $activeModule->sub_modules_count }} lessons
            </span>

            <span class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-orange-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                ~{{ $activeModule->sub_modules_sum_time ?? 15 }} min left
            </span>

            <span class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-amber-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                </svg>
                +{{ $activeModule->point ?? 50 }} XP on completion
            </span>
        </div>
    @else
        <div class="py-6 text-center">
            <h3 class="text-lg font-bold text-slate-800">🎉 Awesome Job!</h3>
            <p class="text-slate-500 text-sm mt-1">You have completed all modules in this learning path.</p>
        </div>
    @endif
</section>

            <!-- Bottom Layout: CSS Grid (2 Columns Left, 1 Column Right) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- KIRI: Modules & Activity (Takes up 2 columns) -->
                <div class="lg:col-span-2 flex flex-col gap-8">
                    
                    <!-- Learning Modules Grid -->
                    <section>
                        <div class="flex justify-between items-end mb-4">
                            <h3 class="text-sm font-bold text-slate-400 tracking-wider">LEARNING MODULES</h3>
                            <a href="#" class="text-sm font-bold text-slate-900 flex items-center gap-1">View all 
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Card 1 -->
                            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-12 h-12 flex justify-center items-center bg-[#55BCC9] rounded-2xl text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                        </svg>
                                    </div>
                                    {{-- <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">Beginner</span> --}}
                                </div>
                                <h4 class="font-bold text-lg mb-1">Everyday Conversations</h4>
                                <p class="text-sm text-slate-500 mb-6 flex-grow">Greetings & Phrases • 12 lessons</p>
                                <div class="h-2 bg-slate-100 rounded-full mb-3"><div class="h-full bg-[#55BCC9] w-[72%] rounded-full"></div></div>
                                <div class="flex justify-between items-center text-sm font-bold">
                                    <span class="text-slate-400">72% complete</span>
                                    <span class="text-slate-900">Continue</span>
                                </div>
                            </div>

                            <!-- Card 2 (Wireframe clone) -->
                            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-12 h-12 flex justify-center items-center bg-[#55BCC9] rounded-2xl text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                        </svg>
                                    </div>
                                    {{-- <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">Intermediate</span> --}}
                                </div>
                                <h4 class="font-bold text-lg mb-1">Travel & Navigation</h4>
                                <p class="text-sm text-slate-500 mb-6 flex-grow">Directions & Transport • 15 lessons</p>
                                <div class="h-2 bg-slate-100 rounded-full mb-3"><div class="h-full bg-[#55BCC9] w-[45%] rounded-full"></div></div>
                                <div class="flex justify-between items-center text-sm font-bold">
                                    <span class="text-slate-400">45% complete</span>
                                    <span class="text-slate-900">Continue</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Recent Activity List -->
                    <section>
                        <h3 class="text-sm font-bold text-slate-400 tracking-wider mb-4">RECENT ACTIVITY</h3>
                        <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-2">
                            
                            <!-- List Item 1 -->
                            <div class="flex items-center gap-4 p-4 hover:bg-slate-50 rounded-2xl transition-colors">
                                <div class="w-10 h-10 flex justify-center items-center bg-[#55BCC9] text-white rounded-xl shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h5 class="font-bold text-sm">Completed Lesson 8 — Everyday Conversations</h5>
                                    <span class="text-xs text-slate-400">2h ago</span>
                                </div>
                                <div class="text-sm font-bold text-slate-500">+30 XP</div>
                            </div>
                            
                            <!-- List Item 2 -->
                            <div class="flex items-center gap-4 p-4 hover:bg-slate-50 rounded-2xl transition-colors border-t border-slate-50">
                                <div class="w-10 h-10 flex justify-center items-center bg-[#55BCC9] text-white rounded-xl shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h5 class="font-bold text-sm">Earned: Vocabulary Master Badge</h5>
                                    <span class="text-xs text-slate-400">Yesterday</span>
                                </div>
                                <div class="text-sm font-bold text-slate-500">+50 XP</div>
                            </div>

                        </div>
                    </section>

                </div>

                <!-- KANAN: Widgets (Takes up 1 column) -->
                <div class="lg:col-span-1 flex flex-col gap-8">
                    
                    <!-- Daily Goal Widget -->
                    <section>
                        <h3 class="text-sm font-bold text-slate-400 tracking-wider mb-4 text-center">DAILY GOAL</h3>
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center">
                            
                            <!-- Circular Progress Placeholder -->
                            <div class="w-32 h-32 rounded-full border-[8px] border-[#55BCC9] flex flex-col items-center justify-center mb-6">
                                <span class="text-2xl font-extrabold">60<span>/100</span></span>
                                <span class="text-xs text-slate-400 font-bold">XP today</span>
                            </div>

                            <!-- Progress Lines -->
                            <div class="w-full flex flex-col gap-4">
                                <div>
                                    <div class="flex justify-between text-xs font-bold mb-1"><span class="text-slate-400">Lessons completed</span><span>2 / 3</span></div>
                                    <div class="h-1.5 bg-slate-100 rounded-full"><div class="h-full bg-[#55BCC9] w-[66%] rounded-full"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs font-bold mb-1"><span class="text-slate-400">Vocabulary practiced</span><span>18 / 25</span></div>
                                    <div class="h-1.5 bg-slate-100 rounded-full"><div class="h-full bg-[#55BCC9] w-[75%] rounded-full"></div></div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Recommended Widget -->
                    {{-- <section>
                        <h3 class="text-sm font-bold text-slate-400 tracking-wider mb-4">RECOMMENDED FOR YOU</h3>
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                            <div class="w-full h-32 bg-slate-100 rounded-2xl mb-4 flex items-center justify-center text-slate-400 text-sm font-bold">Image Placeholder</div>
                            <h4 class="font-bold text-lg mb-2">Phrasal Verbs Deep Dive</h4>
                            <p class="text-sm text-slate-500 mb-4">Master 50 essential phrasal verbs used in daily conversation.</p>
                            
                            <!-- Badges -->
                            <div class="flex gap-2 mb-6 flex-wrap">
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">45 min</span>
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">Intermediate</span>
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">+120 XP</span>
                            </div>

                            <button class="w-full py-3 bg-[#7ae0ed] hover:bg-[#62cddb] font-bold rounded-xl transition-colors">Add to Path</button>
                        </div>
                    </section> --}}

                </div>
            </div>

        </div>
    </main>
@endsection