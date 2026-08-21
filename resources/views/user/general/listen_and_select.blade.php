<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listen and Select - Linguana</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#e4fbfe] h-screen flex flex-col font-sans text-slate-800 overflow-hidden">

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow flex justify-center p-6 md:p-8 gap-8 overflow-y-auto">
        
        <!-- KIRI: Area Kuis Utama -->
        <div class="w-full max-w-3xl flex flex-col gap-6">
            
            <!-- Kartu Pertanyaan -->
            <div class="bg-white rounded-3xl p-8 md:p-8 pb-12 shadow-sm border border-slate-100">
                
                <div class="flex flex-col items-center justify-center mb-10 mt-4">
                    <button class="w-24 h-24 bg-[#55BCC9] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#46a8b5] hover:scale-105 transition-all mb-4 focus:ring-4 focus:ring-[#55bcc9]/30">
                        <svg class="w-10 h-10 ml-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"></path>
                        </svg>
                    </button>
                    <h2 class="text-xl font-extrabold text-slate-800">Listen and select the correct meaning</h2>
                    <p class="text-sm text-slate-500 mt-1">Click the play button to hear the audio</p>
                </div>

                <!-- Pilihan Ganda -->
                <div class="flex flex-col gap-3">
                    <button class="w-full text-left p-4 rounded-2xl border-2 border-slate-100 font-bold text-slate-700 hover:border-[#55BCC9] hover:bg-[#f2fcfe] transition-colors flex gap-4 items-center group focus:border-[#55BCC9] focus:bg-[#f2fcfe]">
                        <span class="text-slate-400 group-hover:text-[#55BCC9]">A.</span> Hello
                    </button>
                    <button class="w-full text-left p-4 rounded-2xl border-2 border-slate-100 font-bold text-slate-700 hover:border-[#55BCC9] hover:bg-[#f2fcfe] transition-colors flex gap-4 items-center group focus:border-[#55BCC9] focus:bg-[#f2fcfe]">
                        <span class="text-slate-400 group-hover:text-[#55BCC9]">B.</span> Goodbye
                    </button>
                    <button class="w-full text-left p-4 rounded-2xl border-2 border-slate-100 font-bold text-slate-700 hover:border-[#55BCC9] hover:bg-[#f2fcfe] transition-colors flex gap-4 items-center group focus:border-[#55BCC9] focus:bg-[#f2fcfe]">
                        <span class="text-slate-400 group-hover:text-[#55BCC9]">C.</span> Thank you
                    </button>
                    <button class="w-full text-left p-4 rounded-2xl border-2 border-slate-100 font-bold text-slate-700 hover:border-[#55BCC9] hover:bg-[#f2fcfe] transition-colors flex gap-4 items-center group focus:border-[#55BCC9] focus:bg-[#f2fcfe]">
                        <span class="text-slate-400 group-hover:text-[#55BCC9]">D.</span> Please
                    </button>
                </div>
            </div>

            <!-- Tombol Navigasi Kuis -->
            <div class="flex items-center justify-between pb-10">
                <button class="px-6 py-3 rounded-xl border-2 border-[#aae4ec] text-[#3b9ba7] font-bold flex items-center gap-2 hover:bg-[#d6f8fc] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Previous
                </button>
                
                <button class="px-8 py-3 rounded-xl bg-[#55BCC9] text-white font-bold flex items-center gap-2 hover:bg-[#46a8b5] transition-colors shadow-md">
                    Next
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            
        </div>

    </main>

</body>
</html>