<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Lesson - Linguana</title>
    @vite('resources/css/app.css')
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F4F5F7] h-screen w-screen flex flex-col font-sans overflow-hidden text-slate-800">

    <!-- ================= HEADER (Top Bar) ================= -->
    <header class="bg-white h-20 px-4 md:px-6 flex items-center justify-between border-b border-slate-200 shrink-0 z-20 shadow-sm">
        
        <!-- Tombol Close -->
        <button class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-50 rounded-full transition-colors shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Progress Bar & Subtitle -->
        <div class="flex-1 flex flex-col mx-4 md:mx-8 max-w-4xl">
            <div class="flex gap-2 w-full mb-2">
                <!-- 7 Segmen Progress (1 Selesai/Aktif, sisanya abu-abu) -->
                <div class="h-1.5 flex-1 bg-slate-600 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-100 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-100 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-100 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-100 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-100 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-100 rounded-full"></div>
            </div>
            <span class="text-[11px] md:text-xs font-bold text-slate-400 tracking-wide">Video Lesson · 1 of 7</span>
        </div>

        <!-- Tombol Bookmark & Timer -->
        <div class="flex items-center gap-3 shrink-0">
            <button class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500 hover:bg-slate-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"></path>
                </svg>
            </button>
            <div class="bg-slate-100 rounded-xl px-4 py-2.5 flex items-center gap-2 font-bold text-slate-700 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                2:30
            </div>
        </div>
    </header>

    <!-- ================= MAIN CONTENT SPLIT ================= -->
    <div class="flex-1 flex flex-col md:flex-row overflow-hidden relative">
        
        <!-- BAGIAN KIRI: VIDEO AREA -->
        <main class="flex-1 flex flex-col px-6 py-8 md:px-12 md:py-10 overflow-y-auto">
            <div class="w-full max-w-4xl mx-auto flex flex-col h-full">
                
                <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 text-center mb-8">Video Lesson</h1>

                <!-- Video Player Placeholder -->
                <div class="w-full aspect-video bg-[#E9EAEF] rounded-[2rem] flex flex-col items-center justify-center p-6 shadow-sm relative overflow-hidden">
                    <button class="w-16 h-16 bg-slate-200/80 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-white hover:text-indigo-500 transition-colors shadow-sm mb-4">
                        <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"></path>
                        </svg>
                    </button>
                    <p class="text-sm font-medium text-slate-400">Embedded Video Placeholder — True / False / Not Given</p>
                </div>

                <!-- Video ControlsBar -->
                <div class="bg-[#E9EAEF]/60 rounded-3xl p-3 flex items-center gap-4 w-full mt-4">
                    <button class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center shrink-0 text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path></svg>
                    </button>
                    
                    <div class="flex-1 h-2 bg-slate-200 rounded-full overflow-hidden relative">
                        <!-- Progress Garis Waktu -->
                        <div class="absolute inset-y-0 left-0 bg-slate-900 w-[25%] rounded-full"></div>
                    </div>
                    
                    <button class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center shrink-0 text-slate-700 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path></svg>
                    </button>
                    
                    <span class="text-xs font-bold text-slate-400 shrink-0 w-20 text-right pr-2">4:12 / 12:30</span>
                </div>

                <div class="flex-1"></div> <!-- Spacer -->

                <!-- Primary Action Button -->
                <button class="w-full bg-[#1E1F2E] text-white font-bold py-4 rounded-2xl flex items-center justify-center gap-2 hover:bg-[#2a2c40] transition-colors shadow-md mt-10">
                    Mark Complete & Continue 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path></svg>
                </button>
                
            </div>
        </main>

        <!-- BAGIAN KANAN: NOTES SIDEBAR -->
        <aside class="w-full md:w-80 lg:w-[400px] bg-white border-l border-slate-200 p-6 md:p-8 flex flex-col shrink-0 overflow-y-auto">
            
            <div class="flex items-center gap-2 font-extrabold text-slate-900 mb-6">
                <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                </svg>
                My Notes
            </div>

            <!-- Textarea -->
            <textarea class="flex-1 w-full bg-[#F4F5F7] text-slate-700 text-sm font-medium rounded-2xl p-5 resize-none outline-none focus:ring-2 focus:ring-slate-300 transition-all placeholder:text-slate-400 mb-6" placeholder="Take notes here..."></textarea>

            <!-- Save Button -->
            <button class="w-full bg-[#E9EAEF] text-slate-800 font-bold py-4 rounded-xl hover:bg-slate-300/60 transition-colors">
                Save Notes
            </button>
            
        </aside>

    </div>

</body>
</html>