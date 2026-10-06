@extends('user.onboarding.layouts.onboarding')

@section('content')
        <h1 class="text-3xl md:text-3xl font-extrabold text-slate-900 mb-12 text-center tracking-tight">
            Which exam are you preparing for?
        </h1>

        <div class="flex flex-col gap-6 w-full max-w-3xl">
            
            @forelse($tests as $item)
            <form action="{{ route('post.choose.test') }}" method="POST" class="flex flex-col gap-6 w-full max-w-3xl">
                @csrf

                <input type="hidden" name="learning_path_id" value="{{ $item->id }}">

                <button type="submit" class="cursor-pointer group flex flex-col sm:flex-row items-center sm:items-center gap-6 p-6 md:p-8 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                
                    <div class="shrink-0 w-40 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="Test Logo" class="w-full h-auto object-contain">
                    </div>

                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-slate-800 mb-2">{{ $item->title }}</h3>
                        <p class="text-sm md:text-base text-slate-600 font-medium italic leading-relaxed">
                            {{ $item->short_description }}
                        </p>
                    </div>
                </button>
            </form>
            @empty
                <div class="col-span-1 md:col-span-2 text-center py-16 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center">
                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">No tests available yet</h3>
                    <p class="text-slate-500 mb-6">We are currently preparing Test Preparation modules for this language</p>
                    <a href="{{ route('choose-path') }}" class="bg-slate-800 text-white px-6 py-3 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Choose Another Path
                    </a>
                </div>
            @endforelse
                
        </div>
@endsection