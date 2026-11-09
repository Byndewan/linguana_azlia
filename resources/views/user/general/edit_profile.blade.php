@extends('user.general.layouts.app')

@section('content')
    <main class="flex-grow overflow-y-auto p-6 md:p-10">
        
        <div class="max-w-3xl mx-auto flex flex-col gap-6 w-full">
            
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                
                <!-- Header -->
                <div class="mb-6 pb-4 border-b border-slate-100">
                    <h1 class="text-2xl font-extrabold text-slate-900">Edit Profile</h1>
                    <p class="text-sm text-slate-500 mt-1">Update your personal information and profile picture.</p>
                </div>

                <!-- Form Edit Profile -->
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                    @csrf

                    <!-- Avatar Upload Section -->
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            <img src="{{ !empty(Auth::user()->photo) ? asset('uploads/' . Auth::user()->photo) : asset('assets/profile-dashboard.jpeg') }}" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border-2 border-[#55BCC9]">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Profile Picture</label>
                            <input type="file" name="photo" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-[#abe3e9]/50 file:text-slate-700 hover:file:bg-[#abe3e9] cursor-pointer transition-colors">
                        </div>
                    </div>

                    <!-- Name Input -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#55BCC9] font-medium text-slate-800">
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#55BCC9] font-medium text-slate-800">
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('user.profile') }}" class="px-6 py-3 rounded-xl bg-slate-100 text-slate-600 font-bold hover:bg-slate-200 transition-colors text-sm">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#55BCC9] text-white font-bold hover:bg-[#27aabb] transition-colors shadow-md cursor-pointer text-sm">
                            Save Changes
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

        @if(Session::has('warning'))
            Toast.fire({
                icon: 'warning',
                title: '{{ Session::get('warning') }}'
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