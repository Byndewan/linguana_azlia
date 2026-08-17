@extends('user.auth.layouts.auth_user')

@section('title', 'Sign Up')

@section('content')
<div class="w-full max-w-md mx-auto">
            
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Create your account</h2>
            <p class="text-slate-500 mb-8 text-sm md:text-base">Start your free 14-day trial — no card required.</p>

            <form action="{{ route('user.sign-up.submit') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div>
                    <label for="name" class="block text-base font-bold text-slate-900 mb-1.5">Full Name</label>
                    <input name="name" type="text" id="name" placeholder="Alex Morgan" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                </div>

                <div>
                    <label for="email" class="block text-base font-bold text-slate-900 mb-1.5">Email Address</label>
                    <input name="email" type="email" id="email" value="{{ old('email') }}" placeholder="azlia@gmail.com" class="@error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                      @error('email')
                          <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                      @enderror
                      @if(session('error'))
                          <p class="mt-1.5 text-sm text-red-500">{{ session('error') }}</p>
                      @endif
                </div>

                <div>
                    <label for="password" class="block text-base font-bold text-slate-900 mb-1.5">Password</label>
                    <input name="password" type="password" id="password" placeholder="Min. 8 characters" class="@error('password') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-base font-bold text-slate-900 mb-1.5">Confirm Password</label>
                    <input name="password_confirmation" type="password" id="password_confirmation" placeholder="Repeat password" class="@error('password_confirmation') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                    {{-- @error('password')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror --}}
                </div>

                <button type="submit" class="w-full mt-2 bg-[#55BCC9] hover:bg-[#45a4b1] cursor-pointer text-white font-bold py-3.5 rounded-xl transition-colors duration-200 shadow-sm text-base">
                    Create Account
                </button>
            </form>

            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-slate-200"></div>
                <span class="mx-4 text-sm text-slate-400">or continue with</span>
                <div class="flex-grow border-t border-slate-200"></div>
            </div>

            <button class="w-full flex cursor-pointer items-center justify-center gap-3 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold py-3 rounded-xl transition-colors duration-200 text-base">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Continue with Google
            </button>

            <p class="text-center text-sm text-slate-500 mt-6 md:mt-8">
                Already have an account? 
                <a href="{{ url('/login') }}" class="text-slate-900 font-bold underline hover:text-[#55BCC9] transition-colors">Log in</a>
            </p>

        </div>
@endsection