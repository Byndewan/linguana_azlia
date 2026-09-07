@php
    // Bongkar opsi jawaban dari brankas JSON
    $opsi_mentah = json_decode($data->options, true) ?? [];
    $pilihan = $opsi_mentah['choices'] ?? $opsi_mentah; 
    
    // Array untuk memunculkan abjad A, B, C, D secara otomatis
    $abjad = ['A', 'B', 'C', 'D', 'E', 'F'];
    
    // Teks yang akan disuarakan (sesuaikan dengan nama kolom tempat kamu menyimpan kalimat audionya)
    $teks_audio = $data->question_text ?? 'Audio kosong';
    $lang = $data->language_code ?? 'es-ES'; // Default Spanyol jika tidak ada
@endphp

<!-- Komponen Card Kuis: Listen & Select -->
<div class="w-full max-w-2xl bg-white rounded-3xl p-8 md:p-8 pb-12 shadow-sm border border-slate-100 mx-auto mt-8">
    
    <!-- Area Putar Audio -->
    <div class="flex flex-col items-center justify-center mb-10 mt-4">
        <button type="button" onclick="playAudio('{{ addslashes($teks_audio) }}', '{{ $lang }}')" class="w-24 h-24 bg-[#55BCC9] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#46a8b5] hover:scale-105 transition-all mb-4 focus:outline-none focus:ring-4 focus:ring-[#55bcc9]/30">
            <svg class="w-10 h-10 ml-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"></path>
            </svg>
        </button>
        <h2 class="text-xl font-extrabold text-slate-800">Listen and select the correct meaning</h2>
        <p class="text-sm text-slate-500 mt-1">Click the play button to hear the audio</p>
    </div>

    <!-- Pilihan Ganda -->
    <div class="flex flex-col gap-3">
        @if(is_array($pilihan) || is_object($pilihan))
            @foreach($pilihan as $index => $opsi)
                <label class="cursor-pointer relative w-full group">
                    
                    <!-- Radio button asli disembunyikan pakai sr-only dan class 'peer' -->
                    <input type="radio" name="answer_{{ $data->id }}" value="{{ $opsi }}" class="peer sr-only">
                    
                    <!-- Desain kotak pilihan -->
                    <div class="w-full text-left p-4 rounded-2xl border-2 border-slate-100 font-bold text-slate-700 
                                hover:border-[#55BCC9] hover:bg-[#f2fcfe] 
                                peer-checked:border-[#55BCC9] peer-checked:bg-[#f2fcfe] transition-colors flex gap-4 items-center">
                        
                        <!-- Huruf Abjad Dinamis -->
                        <span class="text-slate-400 group-hover:text-[#55BCC9] peer-checked:text-[#55BCC9]">
                            {{ $abjad[$index] ?? '-' }}.
                        </span> 
                        
                        <!-- Teks Opsi Jawaban -->
                        {{ $opsi }}
                        
                    </div>
                </label>
            @endforeach
        @else
            <p class="text-red-500 text-center text-sm">Opsi pilihan belum diatur dengan benar.</p>
        @endif
    </div>
    
</div>