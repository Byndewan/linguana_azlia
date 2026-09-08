@php
    $teks_audio = $data->question_text;
    $lang = $data->language_code; 
@endphp

<div class="w-full bg-white rounded-3xl p-6 sm:p-10 border border-slate-100">

    <div class="flex flex-col items-center justify-center mb-8">
        <button type="button" onclick="playAudio('{{ addslashes($teks_audio) }}', '{{ $lang }}')" class="cursor-pointer w-20 h-20 bg-[#48b8b8] rounded-full flex items-center justify-center shadow-lg shadow-[#48b8b8]/30 hover:bg-[#3ca0a0] transition-colors focus:outline-none focus:ring-4 focus:ring-[#48b8b8]/20 group mb-3">
            <svg class="w-8 h-8 text-white ml-1 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" />
            </svg>
        </button>
        <h2 class="text-xl font-extrabold text-slate-800 text-center">Listen and type</h2>
        <p class="text-sm font-medium text-slate-500 text-center mt-1">Click the play button and type what you hear</p>
    </div>

    <div class="w-full">
        <textarea 
            name="answer_{{ $data->id }}"
            class="w-full px-6 py-5 rounded-2xl border-2 border-slate-200 text-lg md:text-xl font-bold text-slate-700 text-center focus:border-[#48b8b8] focus:ring-4 focus:ring-[#48b8b8]/20 outline-none transition-all placeholder:text-slate-300 placeholder:font-normal resize-none shadow-inner"
            rows="3"
            placeholder="Type the exact sentence here..."
            autocomplete="off"
            spellcheck="false"
        ></textarea>
    </div>

</div>