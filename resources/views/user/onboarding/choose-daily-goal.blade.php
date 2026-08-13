@extends('user.onboarding.layouts.onboarding')

@section('content')
        <h1 class="text-3xl md:text-3xl font-extrabold text-slate-900 mb-12 text-center tracking-tight">
            Set your daily goal
        </h1>

        <div class="flex flex-col gap-4 w-full max-w-2xl">
            
            <!-- Card 1: Casual -->
            <button class="group flex flex-col p-6 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                <!-- Header Card (Kiri & Kanan) -->
                <div class="flex items-center justify-between w-full mb-2">
                    <h3 class="text-xl md:text-xl font-bold text-slate-800">5 minutes / day</h3>
                    <span class="text-base font-semibold text-slate-600">Casual</span>
                </div>
                <!-- Deskripsi -->
                <p class="text-sm md:text-base text-slate-500 font-medium italic">
                    Perfect for busy days. Keep your learning streak alive!
                </p>
            </button>

            <!-- Card 2: Regular -->
            <button class="group flex flex-col p-6 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                <div class="flex items-center justify-between w-full mb-2">
                    <h3 class="text-xl md:text-xl font-bold text-slate-800">15 minutes / day</h3>
                    <span class="text-base font-semibold text-slate-600">Regular</span>
                </div>
                <p class="text-sm md:text-base text-slate-500 font-medium italic">
                    A great balance to make steady progress every single day.
                </p>
            </button>

            <!-- Card 3: Serious -->
            <button class="group flex flex-col p-6 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                <div class="flex items-center justify-between w-full mb-2">
                    <h3 class="text-xl md:text-xl font-bold text-slate-800">30 minutes / day</h3>
                    <span class="text-base font-semibold text-slate-600">Serious</span>
                </div>
                <p class="text-sm md:text-base text-slate-500 font-medium italic">
                    For those who want to reach fluency as fast as possible.
                </p>
            </button>

        </div>
@endsection