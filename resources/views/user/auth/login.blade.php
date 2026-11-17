@extends('user.auth.layouts.auth_user')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md mx-auto">
            
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Welcome Back</h2>
            <p class="text-slate-500 mb-8 text-sm md:text-base">Continue your learning journey</p>

            @if(session('success'))
                <p class="mt-1.5 text-sm text-green-500">{{ session('success') }}</p>
            @endif
            <form action="{{ route('user.login.submit') }}" method="POST" class="flex flex-col gap-4">
            @csrf
                <div>
                    <label for="email" class="block text-base font-bold text-slate-900 mb-1.5">Email Address</label>
                    <input name="email" type="email" id="email" placeholder="azlia@gmail.com" class="@error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    @if(session('error'))
                        <p class="mt-1.5 text-sm text-red-500">{{ session('error') }}</p>
                    @endif
                </div>

                <div>
                    <label for="password" class="block text-base font-bold text-slate-900 mb-1.5">Password</label>
                    <div class="relative">
                        <input name="password" type="password" id="password" placeholder="Enter your password" class="@error('password') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">

                        <button type="button" id="togglePassword" aria-label="Show password" aria-pressed="false"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 hover:text-[#55BCC9] cursor-pointer transition-colors duration-200">
                            {{-- Icon mata (password tersembunyi) --}}
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg id="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between w-full mt-2 mb-2">
                    <div class="flex items-center gap-2">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            class="w-4 h-4 text-[#55BCC9] bg-slate-100 border-slate-300 rounded focus:ring-[#55BCC9] focus:ring-2 cursor-pointer"
                        >
                        <label for="remember" class="text-sm font-medium text-slate-500 cursor-pointer select-none">
                            Remember me
                        </label>
                    </div>

                    <a href="{{ route('user.forgot-password') }}" class="text-sm font-bold text-slate-900 hover:text-[#55BCC9] hover:underline transition-colors duration-200">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="w-full mt-2 bg-[#55BCC9] hover:bg-[#45a4b1] cursor-pointer text-white font-bold py-3.5 rounded-xl transition-colors duration-200 shadow-sm text-base">
                    Log In
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
                No Account?
                <a href="{{ route('choose-language') }}" class="text-slate-900 font-bold underline hover:text-[#55BCC9] transition-colors">Sign Up</a>
            </p>

        </div>

        <script>
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');

            toggleBtn.addEventListener('click', () => {
                const isHidden = passwordInput.type === 'password';

                passwordInput.type = isHidden ? 'text' : 'password';
                eyeIcon.classList.toggle('hidden', isHidden);
                eyeOffIcon.classList.toggle('hidden', !isHidden);

                toggleBtn.setAttribute('aria-pressed', isHidden);
                toggleBtn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            });
        </script>
@endsection