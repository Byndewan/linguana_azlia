@php
    $opsi_mentah = json_decode($data->options, true) ?? [];
    $teks_asli = $opsi_mentah['original_text'] ?? ''; 

    $teks_soal = $data->question_text ?? '';
    $bagian_teks = explode('[blank]', $teks_soal);
@endphp

<div class="w-full bg-white rounded-3xl p-6 sm:p-10 border border-slate-100">

    <div class="flex flex-col items-center justify-center mb-6">
        <div class="w-20 h-20 bg-[#48b8b8] rounded-full flex items-center justify-center shadow-lg shadow-[#48b8b8]/30 mb-3">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
            </svg>
        </div>
        <h2 class="text-xl font-extrabold text-slate-800 text-center">Fill in the blank</h2>
        <p class="text-sm font-medium text-slate-500 text-center mb-8">Read the sentence and fill in the correct translation</p>
    </div>

    @if($teks_asli)
        <div class="text-center mb-10">
            <h3 class="text-2xl md:text-3xl font-bold text-slate-800">{{ $teks_asli }}</h3>
        </div>
    @endif

    <div class="flex flex-wrap items-center justify-center gap-2 md:gap-3 text-lg md:text-xl font-bold text-slate-700 leading-relaxed text-center">
        @foreach($bagian_teks as $index => $bagian)
            <span>{{ $bagian }}</span>
            
            @if($index < count($bagian_teks) - 1)
                <input 
                    type="text" 
                    name="answer_{{ $data->id }}"
                    class="w-32 md:w-44 px-4 py-2 rounded-xl border-2 border-slate-200 text-center text-[#48b8b8] font-bold focus:border-[#48b8b8] focus:ring-4 focus:ring-[#48b8b8]/20 outline-none transition-all placeholder:text-slate-300 placeholder:font-normal"
                    placeholder="type here"
                    autocomplete="off"
                >
            @endif
        @endforeach
    </div>

</div>