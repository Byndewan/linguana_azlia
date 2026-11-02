<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linguana - Learn Any Language</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500..800&family=Plus+Jakarta+Sans:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        :root {
            --ink: #0E2A30;
            --lagoon: #55BCC9;
            --lagoon-dark: #2F8E9B;
            --mint: #CCFFEF;
            --coral: #FF7A59;
            --paper: #F6FBFA;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--paper); color: var(--ink); }
        h1, h2, h3, h4, .display { font-family: 'Bricolage Grotesque', 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.02em; }

        :focus-visible { outline: 3px solid var(--coral); outline-offset: 3px; }

        @keyframes scroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .animate-scroll { animation: scroll 28s linear infinite; }
        .animate-scroll:hover { animation-play-state: paused; }

        @keyframes rise { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }
        .hero-in { animation: rise .7s ease-out both; }
        .hero-in-2 { animation: rise .7s .12s ease-out both; }
        @media (prefers-reduced-motion: reduce) {
            .animate-scroll, .hero-in, .hero-in-2 { animation: none; }
        }

        .blob { border-radius: 58% 42% 55% 45% / 48% 55% 45% 52%; }
        .grain { background-image: radial-gradient(rgba(14,42,48,.08) 1px, transparent 1px); background-size: 18px 18px; }

        /* Swiper on dark background */
        .swiper-pagination-bullet { background: rgba(255,255,255,.5) !important; opacity: 1 !important; }
        .swiper-pagination-bullet-active { background: var(--coral) !important; width: 24px !important; border-radius: 999px !important; }
        .swiper-button-next, .swiper-button-prev {
            color: var(--ink) !important; background-color: var(--mint) !important;
            width: 44px !important; height: 44px !important; border-radius: 50%;
        }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 16px !important; font-weight: 900; }
        @media (max-width: 768px) { .swiper-button-next, .swiper-button-prev { display: none !important; } }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

    <!-- ==================== NAVBAR ==================== -->
    <nav class="sticky top-0 z-50 bg-[#F6FBFA]/90 backdrop-blur border-b border-[#0E2A30]/10 py-4 px-6 md:px-12 lg:px-18 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('assets/linguana.png') }}" alt="Illustration" class="w-36">
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-1 text-sm font-semibold text-[#0E2A30]">
            <a href="#" class="px-4 py-2 rounded-full hover:bg-[#CCFFEF] transition-colors">Features</a>
            <a href="#" class="px-4 py-2 rounded-full hover:bg-[#CCFFEF] transition-colors">Languages</a>
            <a href="#" class="px-4 py-2 rounded-full hover:bg-[#CCFFEF] transition-colors">Pricing</a>
        </div>

        <!-- Auth Buttons -->
        @auth
            @php
                $progress = \App\Models\UserProgress::with('learningPath')->where('user_id', Auth::id())->first();
    
                $isTestPrep = $progress->learning_type == 'test_prep';
                
                $dashboardRoute = $isTestPrep 
                    ? route('user.test-prep.dashboard') 
                    : route('user.general.dashboard');
            @endphp

            <div class="hidden md:flex items-center gap-4">
                <a href="{{ $dashboardRoute }}" class="bg-[#0E2A30] text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-[#2F8E9B] transition-colors">Dashboard</a>
            </div>
        @endauth

        @guest
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('user.login') }}" class="bg-[#0E2A30] text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-[#2F8E9B] transition-colors">Login</a>
            </div>
        @endguest

        <!-- Mobile Menu Icon -->
        <button class="md:hidden text-[#0E2A30]" aria-label="Open menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="relative bg-[#CCFFEF] pt-16 pb-28 px-6 md:px-12 lg:px-18 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center overflow-hidden">
        <div class="absolute inset-0 grain pointer-events-none"></div>

        <div class="relative order-2 lg:order-1 hero-in">
            <div class="inline-flex items-center gap-2 bg-[#0E2A30] text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-[#FF7A59]">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
                </svg> Trusted by 2M+ learners worldwide
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.02] mb-7 text-[#0E2A30]">
                {{ $page_data->hero_title }} <br>
            </h1>
            <p class="text-lg md:text-xl text-[#0E2A30]/75 mb-10 max-w-lg leading-relaxed">
                {!! $page_data->hero_description !!}
            </p>
            <a href="{{ route('choose-language') }}" class="inline-block bg-[#FF7A59] text-[#0E2A30] px-9 py-4 rounded-full font-bold text-lg hover:bg-[#0E2A30] hover:text-white transition-colors shadow-[0_6px_0_0_#0E2A30] hover:shadow-[0_2px_0_0_#0E2A30] hover:translate-y-1">
                {{ $page_data->hero_button_text }}
            </a>
        </div>

        <div class="relative order-1 lg:order-2 flex justify-center hero-in-2">
            <div class="absolute -inset-4 bg-[#55BCC9] blob rotate-6"></div>
            <div class="relative bg-white blob p-3 w-full max-w-xl overflow-hidden">
                <img src="{{ asset('uploads/'.$page_data->hero_photo) }}" alt="Illustration" class="w-full h-full object-cover blob">
            </div>
        </div>
    </section>

    <!-- ==================== LOGOS SECTION ==================== -->
    <section class="py-12 px-6 bg-white flex flex-col items-center border-y border-[#0E2A30]/10 overflow-hidden">
        <p class="text-sm text-[#0E2A30]/60 font-semibold mb-8 text-center">Trusted by learners from leading companies</p>
        
        <div class="relative flex w-full max-w-7xl overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_12%,black_88%,transparent)]">
            <div class="flex w-max animate-scroll gap-8 md:gap-16 items-center">
                @foreach($clients as $item)
                    <span class="w-32 md:w-40 flex-shrink-0 grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition"><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="object-contain"></span>
                @endforeach
                @foreach($clients as $item)
                    <span class="w-32 md:w-40 flex-shrink-0 grayscale opacity-70" aria-hidden="true"><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="object-contain"></span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==================== FEATURES SECTION ==================== -->
    <section class="py-24 px-6 md:px-12 lg:px-18 bg-[#F6FBFA]">
        <div class="max-w-3xl mb-14">
            <h2 class="text-sm font-bold text-[#2F8E9B] mb-3">Why Linguana</h2>
            <h3 class="text-4xl md:text-5xl font-bold text-[#0E2A30] leading-tight">Everything you need to succeed</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($services as $item)
                <div class="group bg-white p-8 rounded-[2rem] border-2 border-[#0E2A30] hover:bg-[#CCFFEF] transition-colors @if($loop->odd) lg:mt-0 @else lg:mt-8 @endif">
                    <div 
                        class="w-16 h-16 rounded-2xl flex items-center justify-center mb-8 font-bold group-hover:rotate-6 transition-transform"
                        style="color: {{ $item->color }}; background-color: {{ $item->background_color }}1A;"
                    >
                        {!! $item->icon !!}
                    </div>
                    <h4 class="text-xl font-bold mb-3">{{ $item->service_name }}</h4>
                    <p class="text-[#0E2A30]/70 text-base leading-relaxed">{{ $item->description }}</p>
                </div>
            @endforeach

        </div>
    </section>

    <!-- ==================== PROCESS SECTION ==================== -->
    <section class="py-24 px-6 md:px-12 lg:px-18 bg-[#0E2A30] text-white">
        <div class="max-w-3xl mb-16">
            <h2 class="text-sm font-bold text-[#55BCC9] mb-3">The Process</h2>
            <h3 class="text-4xl md:text-5xl font-bold">Your learning journey</h3>
        </div>

        <div class="relative grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-6">
            <div class="hidden md:block absolute top-12 left-[10%] right-[10%] border-t-2 border-dashed border-[#55BCC9]/50"></div>
            @foreach ($processes as $item)
                <div class="relative flex md:flex-col items-start gap-5 md:gap-0">
                    <div class="shrink-0 w-24 h-24 rounded-full bg-[#CCFFEF] flex items-center justify-center md:mb-7 ring-8 ring-[#0E2A30]">
                        <div style="color: {{ $item->color }};" class="flex flex-col items-center gap-1 [&>svg]:w-9 [&>svg]:h-9">
                            {!! $item->icon !!}
                            <p class="text-[#0E2A30] text-sm font-extrabold">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-2">{{ $item->process }}</h4>
                        <p class="text-white/70 text-base leading-relaxed">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ==================== LANGUAGES SECTION ==================== -->
    <section class="py-24 px-6 md:px-12 lg:px-18 bg-[#CCFFEF] relative overflow-hidden">
        <div class="absolute inset-0 grain pointer-events-none"></div>
        <div class="relative max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-sm font-bold text-[#2F8E9B] mb-3">Available Languages</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-[#0E2A30]">{{ count($languages) }} languages and counting</h3>
            </div>

            <div class="flex flex-wrap justify-center gap-3 mb-12">
            <!-- Language Cards -->
            @foreach($languages as $item)
                <button class="bg-white flex items-center gap-3 pl-3 pr-6 py-3 rounded-full border-2 border-[#0E2A30] hover:bg-[#FF7A59] hover:-rotate-2 transition">
                    <img src="{{ asset('uploads/'.$item->flag) }}" alt="" class="w-8 h-8 rounded-full object-cover border border-[#0E2A30]/20">
                    <span class="font-bold text-[#0E2A30]">{{ $item->language }}</span>
                </button>
            @endforeach
        </div>

            <div class="text-center">
                <a href="#" class="inline-flex items-center gap-2 text-[#0E2A30] font-bold underline underline-offset-4 decoration-2 decoration-[#FF7A59] hover:text-[#2F8E9B] transition-colors">
                    View All {{ count($languages) }} Languages <span>›</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== TESTIMONIALS SECTION ==================== -->
    <section class="py-24 px-6 md:px-12 lg:px-18 bg-[#55BCC9] overflow-hidden">
        <div class="max-w-3xl mb-14">
            <h2 class="text-sm font-bold text-[#0E2A30]/70 mb-3">Testimonials</h2>
            <h3 class="text-4xl md:text-5xl font-bold text-[#0E2A30]">Learners love Linguana</h3>
        </div>

        @php
            $starPath = 'M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z';
        @endphp

        <div class="swiper testimonialSwiper !pb-16 px-2">
            <div class="swiper-wrapper">
                <!-- Review 1 -->
                @foreach ($testimonials as $item)
                @php
                    $stars = in_array((string) $item->rating, ['1', '2', '3', '4', '5']) ? (int) $item->rating : 0;
                @endphp
                <div class="swiper-slide h-auto">
                    <div class="bg-white border-2 border-[#0E2A30] p-8 rounded-[2rem] shadow-[6px_6px_0_0_#0E2A30] h-full flex flex-col">
                        <div class="inline-flex text-[#FF7A59] mb-5" aria-label="Rating {{ $stars }} of 5">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $stars)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="{{ $starPath }}" clip-rule="evenodd" /></svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 opacity-40"><path stroke-linejoin="round" d="{{ $starPath }}" /></svg>
                                @endif
                            @endfor
                        </div>
                        <p class="text-[#0E2A30]/80 mb-8 flex-grow line-clamp-4 text-lg leading-relaxed">{{ $item->comment }}</p>
                        <div class="flex items-center gap-3 pt-5 border-t border-[#0E2A30]/10">
                            <div class="flex items-center justify-center">
                                <img class="w-13 h-13 rounded-full border-2 border-[#0E2A30]" src="{{ asset('uploads/'.$item->photo) }}" alt="">
                            </div>
                            <div>
                                <h5 class="font-bold text-base text-[#0E2A30]">{{ $item->name }}</h5>
                                <p class="text-sm text-[#0E2A30]/60">{{ $item->designation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- 3. Titik Navigasi (Pagination) -->
            <div class="swiper-pagination"></div>
            
            <!-- 4. Tombol Panah Navigasi Kiri & Kanan -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-[#0E2A30] text-white pt-20 pb-8 px-6 md:px-12 lg:px-18">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <!-- Brand Column -->
            <div class="md:col-span-1">
                <div class="mb-5 inline-block bg-[#CCFFEF] rounded-2xl px-4 py-3">
                    <img src="{{ asset('assets/linguana.png') }}" alt="Illustration" class="w-36">
                </div>
                <p class="text-base text-white/70 leading-relaxed">Master any language with AI-powered lessons and personalized learning paths.</p>
            </div>
            
            <!-- Links Columns -->
            <div>
                <p class="font-bold text-base text-[#55BCC9] mb-4">Product</p>
                <ul class="space-y-2.5 text-base text-white/70">
                    <li><a href="#" class="hover:text-white">Features</a></li>
                    <li><a href="#" class="hover:text-white">Languages</a></li>
                    <li><a href="#" class="hover:text-white">Pricing</a></li>
                    <li><a href="#" class="hover:text-white">For Teams</a></li>
                </ul>
            </div>
            <div>
                <p class="font-bold text-base text-[#55BCC9] mb-4">Company</p>
                <ul class="space-y-2.5 text-base text-white/70">
                    <li><a href="#" class="hover:text-white">About</a></li>
                    <li><a href="#" class="hover:text-white">Blog</a></li>
                    <li><a href="#" class="hover:text-white">Careers</a></li>
                    <li><a href="#" class="hover:text-white">Press</a></li>
                </ul>
            </div>
            <div>
                <p class="font-bold text-base text-[#55BCC9] mb-4">Support</p>
                <ul class="space-y-2.5 text-base text-white/70">
                    <li><a href="#" class="hover:text-white">Help Center</a></li>
                    <li><a href="#" class="hover:text-white">Contact</a></li>
                    <li><a href="#" class="hover:text-white">Privacy</a></li>
                    <li><a href="#" class="hover:text-white">Terms</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/15 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-base text-white/50">© 2026 Linguana, Inc. All rights reserved.</p>
            <div class="flex gap-5 text-base text-white/60">
                <a href="#" class="hover:text-[#FF7A59]">Twitter</a>
                <a href="#" class="hover:text-[#FF7A59]">Instagram</a>
                <a href="#" class="hover:text-[#FF7A59]">LinkedIn</a>
                <a href="#" class="hover:text-[#FF7A59]">YouTube</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper(".testimonialSwiper", {
                slidesPerView: 1, 
                spaceBetween: 32, 
                grabCursor: true, 
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true, 
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
        });
    </script>

</body>
</html>