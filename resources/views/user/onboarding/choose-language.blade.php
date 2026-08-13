@extends('user.onboarding.layouts.onboarding')

@section('content')
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-20 text-center tracking-tight">
            What language do you want to learn today?
        </h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 w-full">
            @foreach ($languages as $item)
                <form action="{{ route('post.choose.language') }}" method="POST" class="w-full h-full">
                    @csrf
                    
                    <input type="hidden" name="language_id" value="{{ $item->id }}">
                    
                    <button type="submit" class="cursor-pointer w-full h-full group flex flex-col items-center justify-center p-6 bg-white border border-slate-200 rounded-2xl hover:border-[#55BCC9] hover:shadow-md transition-all duration-200">
                        <img src="{{ asset('uploads/'.$item->flag) }}" alt="{{ $item->language }} Flag" class="w-16 h-16 rounded-full object-cover mb-4 shadow-sm group-hover:scale-105 transition-transform">
                        <span class="font-bold text-slate-800">{{ $item->language }}</span>
                    </button>
                </form>
            @endforeach
        </div>
@endsection