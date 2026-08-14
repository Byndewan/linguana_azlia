@extends('user.onboarding.layouts.onboarding')

@section('content')
        <h1 class="text-3xl md:text-3xl font-extrabold text-slate-900 mb-12 text-center tracking-tight">
            Set your daily goal
        </h1>

        <div class="flex flex-col gap-4 w-full max-w-2xl">
            <form action="{{ route('post.choose.daily.goal') }}" method="POST" class="flex flex-col gap-4 w-full max-w-2xl">
            @csrf
                @forelse($goals as $item)
                    <button type="submit" name="daily_goal" value="{{ $item->target_time }}" class="cursor-pointer group flex flex-col p-6 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                    <div class="flex items-center justify-between w-full mb-2">
                        <h3 class="text-xl md:text-xl font-bold text-slate-800">{{ $item->target_time }} minutes / day</h3>
                        <span class="text-base font-semibold text-slate-600">{{ $item->title }}</span>
                    </div>
                    <p class="text-sm md:text-base text-slate-500 font-medium italic">
                        {{ $item->short_description }}
                    </p>
                </button>
                @empty
                    <div class="text-center p-8 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                        <p class="text-slate-500">No daily goals available for this learning path yet.</p>
                    </div>
                @endforelse
            
            </form>
        </div>
@endsection