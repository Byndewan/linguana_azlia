@extends('user.auth.layouts.auth_user')

@section('title', 'Forgot Password')

@section('content')
<div class="w-full max-w-md mx-auto">
            
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Forgot Password?</h2>
            <p class="text-slate-500 mb-8 text-sm md:text-base">No worries, we'll send you reset instructions</p>

            <form action="{{ route('user.forgot-password-submit') }}" method="POST" class="flex flex-col gap-4">
            @csrf
                <div>
                    <label for="email" class="block text-base font-bold text-slate-900 mb-1.5">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" class="@error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full mt-2 bg-[#55BCC9] hover:bg-[#45a4b1] cursor-pointer text-white font-bold py-3.5 rounded-xl transition-colors duration-200 shadow-sm text-base">
                    Send Email
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-6 md:mt-8">
                <a href="{{ route('user.login') }}" class="text-slate-900 font-bold underline hover:text-[#55BCC9] transition-colors">Back to log in</a>
            </p>

        </div>
@endsection