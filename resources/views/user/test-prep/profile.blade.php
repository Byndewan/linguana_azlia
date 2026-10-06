@extends('user.test-prep.layouts.app')

@section('content')
    <main class="flex-grow overflow-y-auto p-6 md:p-10">
        
        <div class="max-w-5xl mx-auto flex flex-col gap-6 w-full">
            
            <!-- 1. HEADER PROFIL -->
            <div class="bg-white rounded-3xl p-6 md:p-8 flex flex-col md:flex-row items-center md:items-start justify-between gap-6 border border-slate-100 shadow-sm">
                
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-left">
                    <!-- Foto Profil Placeholder -->
                    <div class="relative">
                        <div class="w-24 h-24 flex items-center justify-center text-3xl font-bold text-slate-500"><img src="{{ asset("assets/profile-dashboard.jpeg") }}" class="rounded-full" alt=""></div>
                        <button class="absolute -bottom-2 -right-2 w-8 h-8 bg-[#1E1F2E] text-white rounded-full flex items-center justify-center shadow-md border-2 border-white hover:bg-slate-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </button>
                    </div>
                    
                    <!-- Teks Profil -->
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-extrabold text-slate-900">Azlia Nisrina</h1>
                        <p class="text-slate-400 font-medium mt-1 mb-4">azlia@gmail.com</p>
                        
                        <!-- Badges/Tags Profil -->
                        <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                            <span class="px-3 py-1.5 bg-[#abe3e9] text-slate-600 font-bold text-xs rounded-full">Member since Jan 2024</span>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi Kanan -->
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto mt-4 md:mt-0">
                    <button class="px-6 py-3 bg-[#55BCC9] text-white font-bold rounded-xl shadow-md hover:bg-[#27aabb] transition-colors w-full sm:w-auto text-sm">
                        Edit Profile
                    </button>
                    <button class="px-6 py-3 border border-[#89dbe6] text-slate-700 font-bold rounded-xl hover:bg-slate-50 transition-colors w-full sm:w-auto text-sm">
                        Change Password
                    </button>
                </div>
            </div>

            <!-- 2. GRID STATISTIK -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm">
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-xl flex items-center justify-center mb-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                        </div>
                    </div>
                    <span class="text-2xl font-extrabold text-slate-900 mb-0.5">2,340</span>
                    <span class="text-xs font-medium text-slate-400">Total XP</span>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center mb-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </div>
                    </div>
                    <span class="text-2xl font-extrabold text-slate-900 mb-0.5">18</span>
                    <span class="text-xs font-medium text-slate-400">Quiz Passed</span>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm">
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center mb-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                    </div>
                    <span class="text-2xl font-extrabold text-slate-900 mb-0.5">7</span>
                    <span class="text-xs font-medium text-slate-400">Modules Done</span>
                </div>
                <!-- Card 4 -->
                <div class="bg-white rounded-3xl p-6 flex flex-col items-center justify-center border border-slate-100 shadow-sm">
                    <div class="w-12 h-12 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center mb-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </div>
                    </div>
                    <span class="text-2xl font-extrabold text-slate-900 mb-0.5">12</span>
                    <span class="text-xs font-medium text-slate-400">Words Learned</span>
                </div>
            </div>

            <!-- 3. PREFERENCES & PROGRESS (2 Kolom) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Kiri: Learning Preferences -->
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm flex flex-col gap-5">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-1">Learning Preferences</h3>
                    
                    <div class="flex flex-col">
                        <div class="flex justify-between items-center py-4 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Learning Language</span>
                            <span class="text-sm font-bold text-slate-900">Spanish (Español)</span>
                        </div>
                        <div class="flex justify-between items-center py-4 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Learning Path</span>
                            <span class="text-sm font-bold text-slate-900">General Learning</span>
                        </div>
                        <div class="flex justify-between items-center py-4 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Daily XP Goal</span>
                            <span class="text-sm font-bold text-slate-900">100 XP / day</span>
                        </div>
                        <div class="flex justify-between items-center py-4 border-b border-slate-100">
                            <span class="text-sm font-medium text-slate-400">Lesson Difficulty</span>
                            <span class="text-sm font-bold text-slate-900">Intermediate</span>
                        </div>
                        <div class="flex justify-between items-center pt-4">
                            <span class="text-sm font-medium text-slate-400">Reminder Time</span>
                            <span class="text-sm font-bold text-slate-900">7:00 AM daily</span>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Overall Progress -->
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm flex flex-col gap-6">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase">Overall Progress</h3>
                    
                    <!-- Circular Chart & Label -->
                    <div class="flex justify-center my-2">
                        <div class="w-32 h-32 rounded-full border-[10px] border-[#55BCC9] flex flex-col items-center justify-center shadow-sm">
                            <span class="font-extrabold text-2xl text-slate-900">B1</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Current Level</span>
                        </div>
                    </div>

                    <!-- Progress Bars -->
                    <div class="flex flex-col gap-4 mt-2">
                        <!-- Speaking -->
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-medium text-slate-400">Speaking</span>
                                <span class="text-xs font-bold text-slate-900">55%</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-[#55BCC9] w-[55%] rounded-full"></div>
                            </div>
                        </div>
                        <!-- Listening -->
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-medium text-slate-400">Listening</span>
                                <span class="text-xs font-bold text-slate-900">70%</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-[#55BCC9] w-[70%] rounded-full"></div>
                            </div>
                        </div>
                        <!-- Reading -->
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-medium text-slate-400">Reading</span>
                                <span class="text-xs font-bold text-slate-900">80%</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-[#55BCC9] w-[80%] rounded-full"></div>
                            </div>
                        </div>
                        <!-- Writing -->
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-medium text-slate-400">Writing</span>
                                <span class="text-xs font-bold text-slate-900">65%</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-[#55BCC9] w-[65%] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 4. BADGES & ACHIEVEMENTS -->
            {{-- <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm mb-10">
                <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-6">Badges & Achievements</h3>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                    
                    <!-- Badge 1 -->
                    <div class="bg-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 text-center aspect-square hover:bg-slate-200 transition-colors cursor-pointer">
                        <div class="w-6 h-6 bg-slate-300 rounded"></div>
                        <span class="text-xs font-bold text-slate-500 leading-tight mt-1">10-Day<br>Streak</span>
                    </div>
                    
                    <!-- Badge 2 -->
                    <div class="bg-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 text-center aspect-square hover:bg-slate-200 transition-colors cursor-pointer">
                        <div class="w-6 h-6 bg-slate-300 rounded"></div>
                        <span class="text-xs font-bold text-slate-500 leading-tight mt-1">Quiz Master</span>
                    </div>
                    
                    <!-- Badge 3 -->
                    <div class="bg-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 text-center aspect-square hover:bg-slate-200 transition-colors cursor-pointer">
                        <div class="w-6 h-6 bg-slate-300 rounded"></div>
                        <span class="text-xs font-bold text-slate-500 leading-tight mt-1">Vocab Pro</span>
                    </div>

                    <div class="bg-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 text-center aspect-square hover:bg-slate-200 transition-colors cursor-pointer">
                        <div class="w-6 h-6 bg-slate-300 rounded"></div>
                        <span class="text-xs font-bold text-slate-500 leading-tight mt-1">Grammar<br>Guru</span>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 text-center aspect-square opacity-60">
                        <div class="w-6 h-6 bg-slate-200 rounded"></div>
                        <span class="text-xs font-bold text-slate-300 leading-tight mt-1">Speed<br>Learner</span>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 text-center aspect-square opacity-60">
                        <div class="w-6 h-6 bg-slate-200 rounded"></div>
                        <span class="text-xs font-bold text-slate-300 leading-tight mt-1">Multilingual</span>
                    </div>

                </div>
            </div> --}}

        </div>
    </main>
@endsection