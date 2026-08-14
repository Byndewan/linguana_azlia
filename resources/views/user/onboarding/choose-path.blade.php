@extends('user.onboarding.layouts.onboarding')

@section('content')
    <h1 class="text-3xl md:text-3xl font-extrabold text-slate-900 mb-15 text-center tracking-tight">
            Choose your learning path
        </h1>

        <div class="flex flex-col gap-6 w-full max-w-3xl">
            <form action="{{ route('post.choose.path') }}" method="POST" class="flex flex-col gap-6 w-full max-w-3xl">
                @csrf
                <button type="submit" name="type" value="general" class="cursor-pointer group flex flex-col sm:flex-row items-center sm:items-start gap-6 p-6 md:p-8 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                    
                    <!-- Ikon Globe -->
                    <div class="shrink-0 transition-transform duration-300 group-hover:scale-110">
                        <svg class="w-16 h-16 md:w-20 md:h-20 text-[#0088CC]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                        </svg>
                    </div>

                    <!-- Teks Konten -->
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-slate-800 mb-2">General Learning</h3>
                        <p class="text-sm md:text-base text-slate-600 font-medium italic leading-relaxed">
                            Learn to speak confidently in everyday situations, build your vocabulary, and explore the culture at your own pace.
                        </p>
                    </div>
                </button>

                <!-- Card 2: Test Preparation -->
                <button type="submit" name="type" value="test_prep" class="cursor-pointer group flex flex-col sm:flex-row items-center sm:items-start gap-6 p-6 md:p-8 bg-white border-2 border-slate-100 rounded-2xl hover:border-[#55BCC9] hover:shadow-lg transition-all duration-300 text-left w-full focus:outline-none focus:border-[#55BCC9] focus:ring-4 focus:ring-[#55BCC9]/10">
                    
                    <!-- Ikon Certificate -->
                    <div class="shrink-0 transition-transform duration-300 group-hover:scale-110">
                        <svg class="w-16 h-16 md:w-20 md:h-20 text-[#FF9800]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-slate-800 mb-2">Test Preparation</h3>
                        <p class="text-sm md:text-base text-slate-600 font-medium italic leading-relaxed">
                            Get ready for your certification exams (IELTS, TOPIK, etc.) with structured lessons, intense drills, and full mock tests.
                        </p>
                    </div>
                </button>
            </form>
            

        </div>
@endsection