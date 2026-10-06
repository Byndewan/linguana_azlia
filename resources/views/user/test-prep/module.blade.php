@extends('user.test-prep.layouts.app')

@section('content')
    <main class="flex-1 flex flex-col overflow-y-auto bg-[#F8FAFC] p-6 lg:p-10">
    
        <!-- HEADER SECTION -->
        <div class="mb-8">
            <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">Test Preparation Modules</h1>
            <p class="text-slate-500 mt-2 font-medium">Choose a section below to start practicing your exam skills.</p>
        </div>

        <!-- MAIN GRID LAYOUT -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- LEFT COLUMN: TEST SECTIONS (4 TOEFL iBT Modules) -->
            <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-5 self-start">
                
                <!-- Section 1: Reading -->
                <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex flex-col group">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 shrink-0 rounded-2xl bg-sky-100 flex items-center justify-center text-sky-600 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Reading Comprehension</h3>
                            <p class="text-xs text-slate-400 font-medium mt-1">5 Passages • 60 Minutes</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-4">
                        <span class="text-xs text-slate-400 font-semibold">Status: Ready to Practice</span>
                    </div>
                    <a href="{{ route('user.test-prep.reading') }}" class="mt-5 text-center w-full bg-[#55BCC9] hover:bg-[#03a9bf] text-white py-2.5 rounded-xl font-semibold transition-colors text-sm">
                        Start Section
                    </a>
                </div>

                <!-- Section 2: Listening -->
                <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex flex-col group">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 shrink-0 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Listening</h3>
                            <p class="text-xs text-slate-400 font-medium mt-1">4 Audio Tracks • 30 Minutes</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-4">
                        <span class="text-xs text-slate-400 font-semibold">Status: Ready to Practice</span>
                    </div>
                    <a href="{{ route('user.test-prep.listening') }}" class="mt-5 text-center w-full bg-[#55BCC9] hover:bg-[#03a9bf] text-white py-2.5 rounded-xl font-semibold transition-colors text-sm">
                        Start Section
                    </a>
                </div>
                
                <!-- Section 3: Writing -->
                <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex flex-col group">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 shrink-0 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Writing</h3>
                            <p class="text-xs text-slate-400 font-medium mt-1">Integrated & Academic • 29 Minutes</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-4">
                        <span class="text-xs text-slate-400 font-semibold">Status: Ready to Practice</span>
                    </div>
                    <a href="{{ route('user.test-prep.writing') }}" class="mt-5 text-center w-full bg-[#55BCC9] hover:bg-[#03a9bf] text-white py-2.5 rounded-xl font-semibold transition-colors text-sm">
                        Start Section
                    </a>
                </div>

                <!-- Section 4: Speaking -->
                <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm flex flex-col group">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 shrink-0 rounded-2xl bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 116 0v8.25a3 3 0 0 1-3 3Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Speaking</h3>
                            <p class="text-xs text-slate-400 font-medium mt-1">Express & Integrate • 16 Minutes</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-4">
                        <span class="text-xs text-slate-400 font-semibold">Status: Ready to Practice</span>
                    </div>
                    <a href="{{ route('user.test-prep.speaking') }}" class="mt-5 text-center w-full bg-[#55BCC9] hover:bg-[#03a9bf] text-white py-2.5 rounded-xl font-semibold transition-colors text-sm">
                        Start Section
                    </a>
                </div>

            </div>

            <!-- RIGHT COLUMN: SIDEBAR WIDGETS (Target Goal & Full Mock Test) -->
            <div class="lg:col-span-4 flex flex-col gap-6">
                
                <!-- Target Goal Widget -->
                <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm">
                    <h4 class="text-xs font-extrabold text-slate-400 tracking-wider mb-5 uppercase">Target Goal</h4>
                    
                    <div class="flex items-center justify-between bg-slate-50 px-4 py-3 rounded-xl border border-slate-100 mb-4">
                        <span class="text-sm font-medium text-slate-500">Target Score</span>
                        <span class="text-base font-bold text-slate-800">550+</span>
                    </div>
                    
                    <div class="flex items-center justify-between bg-slate-50 px-4 py-3 rounded-xl border border-slate-100">
                        <span class="text-sm font-medium text-slate-500">Simulation Test</span>
                        <span class="text-xs font-semibold px-2.5 py-1 bg-amber-100 text-amber-700 rounded-lg">Not Taken</span>
                    </div>
                </div>

                <!-- Full Mock Test Widget -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl p-6 shadow-sm">
                    <h4 class="text-xs font-extrabold text-slate-400 tracking-wider mb-2 uppercase">Full Simulation</h4>
                    <h3 class="text-lg font-bold mb-2">TOEFL iBT Full Mock Test</h3>
                    <p class="text-xs text-slate-300 mb-5 leading-relaxed">Test your complete skills from the first section to the last with an official exam timer.</p>
                    <a href="#" class="block text-center w-full bg-[#55BCC9] hover:bg-[#03a9bf] text-white py-2.5 rounded-xl font-semibold transition-colors text-sm">
                        Take Full Mock Test
                    </a>
                </div>

            </div>

        </div>
    </main>
@endsection