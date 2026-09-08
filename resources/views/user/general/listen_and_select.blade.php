@php
    $opsi_mentah = json_decode($data->options, true) ?? [];
    $pilihan = $opsi_mentah['choices'] ?? $opsi_mentah; 
    
    $teks_audio = $data->question_text;
    $lang = $data->language_code ?? 'es-ES'; 
@endphp

<div class="w-full bg-white rounded-3xl p-6 sm:p-10 border border-slate-100">
    
    <div class="flex flex-col items-center justify-center mb-6">
        <button type="button" onclick="playAudio('{{ addslashes($teks_audio) }}', '{{ $lang }}')" class="cursor-pointer w-20 h-20 bg-[#55BCC9] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#46a8b5] hover:scale-105 transition-all mb-3 focus:outline-none focus:ring-4 focus:ring-[#55bcc9]/30">
            <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"></path>
            </svg>
        </button>
        <h2 class="text-xl font-extrabold text-slate-800 text-center">Listen and select the correct meaning</h2>
        <p class="text-sm text-slate-500 mt-1">Click the play button to hear the audio</p>
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