<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listen and Type - Linguana</title>
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

                <!-- Play Button Header -->
                <button class="w-20 h-20 mx-auto bg-[#48b8b8] rounded-full flex items-center justify-center shadow-lg shadow-[#48b8b8]/30 mb-6 hover:bg-[#3ca0a0] transition-colors focus:outline-none focus:ring-4 focus:ring-[#48b8b8]/20 group">
                    <!-- Icon Play -->
                    <svg class="w-8 h-8 text-white ml-1 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </button>

                <!-- Title & Instruction -->
                <h2 class="text-2xl font-extrabold text-slate-800 text-center mb-2">Listen and type</h2>
                <p class="text-sm font-medium text-slate-500 text-center mb-10">Click the play button and type what you hear</p>

                <!-- Quiz Content Area (Text Area untuk Mengetik) -->
                <div class="w-full">
                    <textarea 
                        class="w-full px-6 py-5 rounded-2xl border-2 border-slate-200 text-lg md:text-xl font-bold text-slate-700 text-center focus:border-[#48b8b8] focus:ring-4 focus:ring-[#48b8b8]/20 outline-none transition-all placeholder:text-slate-300 placeholder:font-normal resize-none shadow-inner shadow-slate-50/50"
                        rows="3"
                        placeholder="Type the exact sentence here..."
                        autocomplete="off"
                        spellcheck="false"
                    ></textarea>
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