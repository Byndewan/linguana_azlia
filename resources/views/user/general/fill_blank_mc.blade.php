@php
    $opsi_mentah = json_decode($data->options, true) ?? [];
    $pilihan = $opsi_mentah['choices'] ?? $opsi_mentah; 
    
    $teks_soal = $data->question_text ?? '';
    $bagian_teks = explode('[blank]', $teks_soal);
@endphp

<div class="w-full bg-white rounded-3xl p-6 sm:p-10 border border-slate-100">
    
    <!-- Header Icon & Instruksi -->
    <div class="flex flex-col items-center justify-center mb-6">
        <div class="w-20 h-20 bg-[#48b8b8] rounded-full flex items-center justify-center shadow-lg shadow-[#48b8b8]/30 mb-3">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
            </svg>
        </div>
        <h2 class="text-xl font-extrabold text-slate-800 text-center">Fill in the blank</h2>
        <p class="text-sm text-slate-500 mt-1">Choose the correct word to complete the sentence</p>
    </div>

    <div class="flex flex-wrap items-center justify-center text-lg md:text-xl font-bold text-slate-700 leading-relaxed mb-8 text-center">
        @foreach($bagian_teks as $index => $bagian)
            <span>{{ $bagian }}</span>
    
            @if($index < count($bagian_teks) - 1)
                <span class="inline-block w-16 md:w-24 border-b-4 border-slate-300 rounded-sm mx-3 translate-y-1"></span>
            @endif
        @endforeach
    </div>

    <div class="flex flex-col gap-2">
        @if(is_array($pilihan) || is_object($pilihan))
            @foreach($pilihan as $key => $opsi)
                <label class="cursor-pointer relative w-full group">
                    
                    <input type="radio" name="answer_{{ $data->id }}" value="{{ $key }}" class="peer sr-only">
                    
                    <div class="w-full text-left py-4 px-4 rounded-xl border-2 border-slate-100 font-bold text-slate-700 
                                hover:border-[#55BCC9] hover:bg-[#f2fcfe] 
                                peer-checked:border-[#55BCC9] peer-checked:bg-[#f2fcfe] transition-colors flex gap-4 items-center">
                        
                        <span class="text-slate-400 group-hover:text-[#55BCC9] peer-checked:text-[#55BCC9]">
                            {{ $key }}.
                        </span> 
                        {{ $opsi }}
                        
                    </div>
                </label>
            @endforeach
        @else
            <p class="text-red-500 text-center text-sm">Opsi pilihan belum diatur dengan benar.</p>
        @endif
    </div>

</div>