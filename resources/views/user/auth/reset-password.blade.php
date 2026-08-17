@extends('user.auth.layouts.auth_user')

@section('title', 'Reset Password')

@section('content')
    <div class="w-full max-w-md mx-auto">
            
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Reset Password</h2>
            <p class="text-slate-500 mb-8 text-sm md:text-base">Please kindly set your new password</p>
            
            @if(session('success'))
                    <p class="mt-1.5 text-sm text-green-500">{{ session('success') }}</p>
            @endif
            <form action="{{ route('user.reset-password-submit') }}" method="POST" class="flex flex-col gap-4">
            @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div>
                    <label for="password" class="block text-base font-bold text-slate-900 mb-1.5">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your new password" class="@error('password') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-base font-bold text-slate-900 mb-1.5">Confirm Password</label>
                    <input type="password" id="password" name="password_confirmation" placeholder="Confirm your password" class="@error('confirm_password') border-red-500 focus:border-red-500 focus:ring-red-500/20 @else border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 @enderror w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                    @error('password_confirmation')
                        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full mt-2 bg-[#55BCC9] hover:bg-[#45a4b1] cursor-pointer text-white font-bold py-3.5 rounded-xl transition-colors duration-200 shadow-sm text-base">
                    Reset Password
                </button>
            </form>

        </div>
@endsection