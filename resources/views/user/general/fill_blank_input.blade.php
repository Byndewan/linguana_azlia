<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill in the blank - Linguana</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#e4fbfe] h-screen flex flex-col font-sans text-slate-800 overflow-hidden">

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow flex justify-center p-6 md:p-8 gap-8 overflow-y-auto">
        
        <div class="w-full max-w-2xl flex flex-col items-center my-auto">
    
            <!-- Main Quiz Card -->
            <div class="w-full bg-white rounded-[2rem] shadow-sm p-8 md:p-12 mb-8">

                <!-- Icon Header -->
                <div class="w-20 h-20 mx-auto bg-[#48b8b8] rounded-full flex items-center justify-center shadow-lg shadow-[#48b8b8]/30 mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                </div>

                <!-- Title & Instruction -->
                <h2 class="text-2xl font-extrabold text-slate-800 text-center mb-2">Fill in the blank</h2>
                <p class="text-sm font-medium text-slate-500 text-center mb-8">Read the sentence and fill in the correct translation</p>

                <!-- Original Sentence (Kalimat Utama) -->
                <div class="text-center mb-10">
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-800">I like to eat</h3>
                </div>

                <!-- Quiz Content Area (Kalimat Terjemahan Rumpang) -->
                <div class="flex flex-wrap items-center justify-center gap-3 text-lg md:text-xl font-medium text-slate-700 leading-relaxed">
                    <span>Aku</span>
                    
                    <!-- Kotak Input Jawaban -->
                    <input 
                        type="text" 
                        class="w-36 md:w-44 px-4 py-2 rounded-xl border-2 border-slate-200 text-center text-[#48b8b8] font-bold focus:border-[#48b8b8] focus:ring-4 focus:ring-[#48b8b8]/20 outline-none transition-all placeholder:text-slate-300 placeholder:font-normal"
                        placeholder="type here"
                        autocomplete="off"
                    >
                    
                    <span>makan.</span>
                </div>

            </div>

            <!-- Bottom Navigation -->
            <div class="w-full flex items-center justify-between px-2">
                <!-- Previous Button -->
                <button class="flex items-center gap-2 px-6 py-3 rounded-2xl border-2 border-[#82c9c9] text-[#48b8b8] font-semibold hover:bg-[#e6f4f4] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Previous
                </button>
                
                <!-- Next Button -->
                <button class="flex items-center gap-2 px-8 py-3 rounded-2xl bg-[#48b8b8] text-white font-semibold hover:bg-[#3ca0a0] transition-colors shadow-lg shadow-[#48b8b8]/30">
                    Next
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

        </div>

    </main>

</body>
</html>