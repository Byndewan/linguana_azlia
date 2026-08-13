<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Test - Linguana</title>
    @vite('resources/css/app.css')
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Custom Scrollbar untuk mempercantik area scroll */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#F4F5F7] h-screen w-screen flex flex-col font-sans overflow-hidden text-slate-800">

    <!-- ================= 1. HEADER (Top Bar) ================= -->
    <header class="bg-white px-6 py-4 flex items-center justify-between border-b border-slate-200 shrink-0 z-20">
        <!-- Logo & Judul -->
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-[#1E1F2E] rounded-full flex items-center justify-center text-white shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"></path></svg>
            </div>
            <div>
                <h1 class="font-bold text-slate-900 text-lg leading-tight">IELTS Academic — Full Mock Test #4</h1>
                <p class="text-sm font-medium text-slate-400">March 14, 2024</p>
            </div>
        </div>

        <!-- Timer & Submit Button -->
        <div class="flex items-center gap-4">
            <div class="bg-slate-100 rounded-xl px-4 py-2.5 flex items-center gap-2 text-sm">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-extrabold text-slate-900">58:23</span>
                <span class="font-medium text-slate-400">remaining</span>
            </div>
            <button class="bg-[#1E1F2E] text-white font-bold px-6 py-2.5 rounded-xl flex items-center gap-2 hover:bg-[#2a2c40] transition-colors shadow-sm">
                Submit Test 
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </button>
        </div>
    </header>

    <!-- ================= 2. SECONDARY NAVIGATION (Tabs) ================= -->
    <nav class="bg-white px-8 flex items-center gap-8 border-b border-slate-200 shrink-0 z-10 overflow-x-auto hide-scrollbar">
        <!-- Active Tab -->
        <a href="#" class="flex items-center gap-2 py-4 border-b-2 border-slate-900 text-slate-900 relative">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
            <span class="font-extrabold text-sm">Reading</span>
            <span class="bg-slate-100 text-slate-500 text-[10px] font-bold px-2 py-1 rounded-full ml-1">60 min</span>
        </a>
        
        <!-- Inactive Tabs -->
        <a href="#" class="flex items-center gap-2 py-4 border-b-2 border-transparent text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path></svg>
            <span class="font-bold text-sm">Writing</span>
            <span class="bg-slate-100 text-slate-400 text-[10px] font-bold px-2 py-1 rounded-full ml-1">60 min</span>
        </a>

        <a href="#" class="flex items-center gap-2 py-4 border-b-2 border-transparent text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path></svg>
            <span class="font-bold text-sm">Listening</span>
            <span class="bg-slate-100 text-slate-400 text-[10px] font-bold px-2 py-1 rounded-full ml-1">30 min</span>
        </a>

        <a href="#" class="flex items-center gap-2 py-4 border-b-2 border-transparent text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
            <span class="font-bold text-sm">Speaking</span>
            <span class="bg-slate-100 text-slate-400 text-[10px] font-bold px-2 py-1 rounded-full ml-1">15 min</span>
        </a>
    </nav>

    <!-- ================= 3. MAIN SPLIT CONTENT ================= -->
    <div class="flex-1 flex flex-col md:flex-row overflow-hidden">
        
        <!-- BAGIAN KIRI: SOAL & BACAAN (Scrollable) -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 flex flex-col gap-6 md:gap-8">
            
            <!-- Instructions Card -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm flex items-start gap-5">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 mb-2">Reading Section Instructions</h2>
                    <p class="text-slate-400 font-medium leading-relaxed">Read the passages carefully. You have 60 minutes to answer 40 questions across 3 passages. Do not spend too long on any single question.</p>
                </div>
            </div>

            <!-- Layout 2 Kolom untuk Bacaan (Kiri) dan Soal (Kanan) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Kolom Bacaan (Kiri - Col 5) -->
                <div class="lg:col-span-5 bg-white rounded-[2rem] p-6 md:p-8 shadow-sm h-[calc(100vh-280px)] overflow-y-auto">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-5">Passage 1 of 3</h3>
                    
                    <!-- Placeholder Gambar/Bacaan -->
                    <div class="w-full aspect-[4/3] bg-[#F4F5F7] rounded-3xl flex flex-col items-center justify-center text-slate-400 mb-6">
                        <div class="w-12 h-12 bg-slate-200 rounded-xl flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="text-sm font-bold">Reading Passage</span>
                    </div>

                    <!-- Teks Bacaan -->
                    <div class="prose prose-slate prose-p:text-slate-500 prose-p:font-medium prose-p:leading-relaxed text-sm md:text-base">
                        <p>The article discusses the socioeconomic dimensions of renewable energy transition, arguing that while technological solutions exist, systemic economic barriers and policy frameworks remain the primary impediment to widespread adoption across developing nations...</p>
                        <!-- (Tambahkan p lagi jika butuh teks lebih panjang untuk simulasi scroll) -->
                        <p>For instance, initial capital expenditure continues to deter private sector investment in solar infrastructure, forcing a reliance on legacy fossil fuel subsidies that artificially suppress the cost of non-renewable alternatives.</p>
                        <p>Furthermore, the study highlights a critical gap in local workforce training...</p>
                    </div>
                </div>

                <!-- Kolom Soal (Kanan - Col 7) -->
                <div class="lg:col-span-7 flex flex-col gap-4">
                    <h3 class="font-extrabold text-slate-900 text-lg mb-2">Questions 1–5: True / False / Not Given</h3>
                    
                    <!-- Question 1 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <p class="font-medium text-slate-700 mb-5 text-base">1. The author believes technology is the primary barrier.</p>
                        <div class="grid grid-cols-3 gap-4">
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">True</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">False</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">Not Given</button>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <p class="font-medium text-slate-700 mb-5 text-base">2. Policy frameworks vary significantly between nations.</p>
                        <div class="grid grid-cols-3 gap-4">
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">True</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">False</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">Not Given</button>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <p class="font-medium text-slate-700 mb-5 text-base">3. Economic factors are discussed in paragraph two.</p>
                        <div class="grid grid-cols-3 gap-4">
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">True</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">False</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">Not Given</button>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <p class="font-medium text-slate-700 mb-5 text-base">4. The study was conducted over five years.</p>
                        <div class="grid grid-cols-3 gap-4">
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">True</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">False</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">Not Given</button>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                        <p class="font-medium text-slate-700 mb-5 text-base">5. Developing nations face unique challenges.</p>
                        <div class="grid grid-cols-3 gap-4">
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">True</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">False</button>
                            <button class="py-2.5 border border-slate-200 rounded-xl font-bold text-slate-700 text-sm hover:bg-slate-50 hover:border-slate-300 transition-colors">Not Given</button>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- BAGIAN KANAN: SIDEBAR PANEL (Nomor Soal) -->
        <aside class="w-full md:w-[320px] bg-white border-l border-slate-200 p-6 flex flex-col shrink-0 overflow-y-auto">
            
            <h3 class="font-bold text-slate-900 text-lg mb-4">Questions</h3>
            
            <!-- Grid Nomor Soal -->
            <div class="grid grid-cols-4 gap-3 mb-8">
                <!-- Active -->
                <button class="aspect-square bg-[#1E1F2E] text-white font-bold rounded-xl flex items-center justify-center text-sm shadow-md">1</button>
                <!-- Unanswered (Default) -->
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">2</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">3</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">4</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">5</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">6</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">7</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">8</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">9</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">10</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">11</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">12</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">13</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">14</button>
                <!-- Contoh Answered (Lebih gelap sedikit abu-abunya, atau biarkan sama saja tergantung logikamu nanti) -->
                <button class="aspect-square bg-slate-200 text-slate-600 font-bold rounded-xl flex items-center justify-center text-sm">15</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">16</button>
                
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">17</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">18</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">19</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">20</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">21</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">22</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">23</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">24</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">25</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">26</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">27</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">28</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">29</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">30</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">31</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">32</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">33</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">34</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">35</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">36</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">37</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">38</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">39</button>
                <button class="aspect-square bg-[#F4F5F7] text-slate-500 font-bold rounded-xl flex items-center justify-center text-sm hover:bg-slate-200 transition-colors">40</button>
            </div>

            <!-- Legends -->
            <div class="flex flex-col gap-3 mb-8 pb-8 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 rounded-full bg-[#1E1F2E]"></div>
                    <span class="text-sm font-medium text-slate-500">Current</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 rounded-full bg-slate-200"></div>
                    <span class="text-sm font-medium text-slate-500">Answered</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 rounded-full bg-[#F4F5F7]"></div>
                    <span class="text-sm font-medium text-slate-500">Unanswered</span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col gap-4 mt-auto">
                <button class="flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-slate-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"></path></svg>
                    Review Later
                </button>
                <button class="w-full bg-[#1E1F2E] text-white font-bold py-3.5 rounded-xl hover:bg-[#2a2c40] transition-colors shadow-sm">
                    Submit Test
                </button>
            </div>

        </aside>

    </div>

</body>
</html>