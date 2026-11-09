@extends('user.general.layouts.app')

@section('content')
    <main class="flex-grow overflow-y-auto p-6 md:p-10">
        
        <div class="max-w-3xl mx-auto flex flex-col gap-6 w-full">
            
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                
                <!-- Header -->
                <div class="mb-6 pb-4 border-b border-slate-100">
                    <h1 class="text-2xl font-extrabold text-slate-900">Change Password</h1>
                    <p class="text-sm text-slate-500 mt-1">Ensure your account is using a long, random password to stay secure.</p>
                </div>

                <!-- Form Change Password -->
                <form action="{{ route('user.update.password') }}" method="POST" class="flex flex-col gap-6">
                    @csrf

                    <!-- Current Password -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Current Password</label>
                        <input type="password" name="current_password" required placeholder="••••••••"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#55BCC9] font-medium text-slate-800">
                    </div>

                    <!-- New Password -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">New Password</label>
                        <input type="password" name="password" required placeholder="••••••••"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#55BCC9] font-medium text-slate-800">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#55BCC9] font-medium text-slate-800">
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('user.profile') }}" class="px-6 py-3 rounded-xl bg-slate-100 text-slate-600 font-bold hover:bg-slate-200 transition-colors text-sm">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#55BCC9] text-white font-bold hover:bg-[#27aabb] transition-colors shadow-md cursor-pointer text-sm">
                            Update Password
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if(Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}'
            });
        @endif

        @if(Session::has('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get('error') }}'
            });
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: '{{ $error }}'
                });
            @endforeach
        @endif
    </script>
    
@endsection