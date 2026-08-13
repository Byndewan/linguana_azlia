<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linguana - Learn Any Language</title>
    @vite('resources/css/app.css')
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            animation: scroll 20s linear infinite;
        }
        .animate-scroll:hover {
            animation-play-state: paused;
        }
        .swiper-pagination-bullet-active {
            background-color: #3b82f6 !important; 
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: #3b82f6 !important; 
            background-color: white !important; 
            width: 44px !important;
            height: 44px !important;
            border-radius: 50%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /
        }
        
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 18px !important;
            font-weight: 900;
        }

        @media (max-width: 768px) {
            .swiper-button-next,
            .swiper-button-prev {
            display: none !important;
            }
        }
    </style>
</head>
<body class="text-slate-800 antialiased overflow-x-hidden">

    <!-- ==================== NAVBAR ==================== -->
    <nav class="bg-[#CCFFEF] py-6 px-6 md:px-12 lg:px-18 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('assets/linguana.png') }}" alt="Illustration" class="w-40">
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8 text-md font-medium text-slate-600">
            <a href="#" class="hover:text-slate-900 transition-colors">Features</a>
        <a href="#" class="hover:text-slate-900 transition-colors">Languages</a>
            <a href="#" class="hover:text-slate-900 transition-colors">Pricing</a>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex items-center gap-4">
            <a href="#" class="text-md font-medium text-slate-600 hover:text-slate-900">Login</a>
            <a href="#" class="bg-[#55BCC9] text-white px-5 py-2 rounded-xl text-md font-medium hover:bg-[#45a4b1] transition-colors shadow-sm">Sign Up Free</a>
        </div>

        <!-- Mobile Menu Icon -->
        <button class="md:hidden text-slate-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="bg-[#CCFFEF] pt-12 pb-24 px-6 md:px-12 lg:px-18 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="order-2 lg:order-1">
            <div class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 text-base font-semibold px-3 py-1 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
                </svg> Trusted by 2M+ learners worldwide
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6 text-slate-900">
                {{ $page_data->hero_title }} <br>
            </h1>
            <p class="text-xl text-slate-600 mb-8 max-w-lg">
                {!! $page_data->hero_description !!}
            </p>
            <a href="{{ route('choose-language') }}" class="inline-block bg-[#55BCC9] text-white px-8 py-3 rounded-xl font-semibold text-lg hover:bg-[#45a4b1] transition-colors shadow-md">
                {{ $page_data->hero_button_text }}
            </a>
        </div>
        
        <div class="order-1 lg:order-2 flex justify-center">
            <img src="{{ asset('uploads/'.$page_data->hero_photo) }}" alt="Illustration" class="w-full h-full object-cover ">
        </div>
    </section>

    <!-- ==================== LOGOS SECTION ==================== -->
    <section class="py-12 px-6 bg-white flex flex-col items-center border-b border-slate-100 overflow-hidden">
        <p class="text-sm text-slate-400 font-medium mb-6 text-center uppercase tracking-wider">Trusted by learners from leading companies</p>
        
        <div class="relative flex w-full max-w-7xl overflow-hidden">
            <div class="flex w-max animate-scroll gap-8 md:gap-16 items-center">
                @foreach($clients as $item)
                    <span class="w-32 md:w-40 flex-shrink-0"><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="object-contain"></a></span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==================== FEATURES SECTION ==================== -->
    <section class="py-20 px-6 md:px-12 lg:px-18 bg-[#CCFFEF]">
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Why Linguana</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Everything you need to succeed</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $item)
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                    <div 
                        class="w-16 h-16 rounded-full flex items-center justify-center mb-6 font-bold"
                        style="color: {{ $item->color }}; background-color: {{ $item->background_color }}1A;"
                    >
                        {!! $item->icon !!}
                    </div>
                    <h4 class="text-xl font-bold mb-3">{{ $item->service_name }}</h4>
                    <p class="text-slate-500 text-md leading-relaxed">{{ $item->description }}</p>
                </div>
            @endforeach

        </div>
    </section>

    <!-- ==================== PROCESS SECTION ==================== -->
    <section class="py-20 px-6 md:px-12 lg:px-18 bg-white">
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">The Process</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Your learning journey</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            @foreach ($processes as $item)
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 rounded-xl bg-white border border-slate-100 flex items-center justify-center mb-6 shadow-sm">
                        <div style="color: {{ $item->color }};" class="flex flex-col items-center gap-1 [&>svg]:w-10 [&>svg]:h-10">
                            {!! $item->icon !!}
                            <p class="text-slate-900 text-base font-semibold">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">{{ $item->process }}</h4>
                    <p class="text-slate-500 text-md">{{ $item->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ==================== LANGUAGES SECTION ==================== -->
    <section class="py-20 px-6 md:px-12 lg:px-18 bg-[#CCFFEF]">
        <div class="text-center mb-12">
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Available Languages</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900">97 languages and counting</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto mb-10">
            <!-- Language Cards -->
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇪🇸</span> <span class="font-semibold text-slate-700">Spanish</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇫🇷</span> <span class="font-semibold text-slate-700">French</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇩🇪</span> <span class="font-semibold text-slate-700">German</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇯🇵</span> <span class="font-semibold text-slate-700">Japanese</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇰🇷</span> <span class="font-semibold text-slate-700">Korean</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇮🇹</span> <span class="font-semibold text-slate-700">Italian</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇧🇷</span> <span class="font-semibold text-slate-700">Portuguese</span></div>
                <span class="text-slate-300">›</span>
            </button>
            <button class="bg-white flex items-center justify-between p-4 rounded-xl shadow-sm hover:shadow border border-transparent hover:border-[#55BCC9] transition-all">
                <div class="flex items-center gap-3"><span class="text-xl">🇨🇳</span> <span class="font-semibold text-slate-700">Mandarin</span></div>
                <span class="text-slate-300">›</span>
            </button>
        </div>

        <div class="text-center">
            <a href="#" class="inline-flex items-center gap-2 text-slate-600 font-semibold hover:text-slate-950 transition-colors">
                View All 97 Languages <span>›</span>
            </a>
        </div>
    </section>

    <!-- ==================== TESTIMONIALS SECTION ==================== -->
    <section class="py-20 px-6 md:px-12 lg:px-18 bg-white overflow-hidden">
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Testimonials</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Learners love Linguana</h3>
        </div>

        <div class="swiper testimonialSwiper !pb-16 px-2">
            <div class="swiper-wrapper">
                <!-- Review 1 -->
                @foreach ($testimonials as $item)
                <div class="swiper-slide h-auto">
                    <div class="bg-white border border-slate-100 p-8 rounded-2xl shadow-sm h-full flex flex-col">
                    @if($item->rating  == '5')
                        <div class="inline-flex text-yellow-400 text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                        </div>
                    @elseif($item->rating  == '4')
                        <div class="inline-flex text-yellow-400 text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                        </div>
                    @elseif($item->rating  == '3')
                        <div class="inline-flex text-yellow-400 text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                        </div>
                    @elseif($item->rating  == '2')
                        <div class="inline-flex text-yellow-400 text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                        </div>
                    @elseif($item->rating  == '1')
                        <div class="inline-flex text-yellow-400 text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                        </div>
                    @else
                        <div class="inline-flex text-yellow-400 text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                        </div>
                    @endif
                        <p class="text-slate-600 mb-6 flex-grow line-clamp-4">{{ $item->comment }}</p>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center">
                                <img class="w-13 h-13 rounded-full" src="{{ asset('uploads/'.$item->photo) }}" alt="">
                            </div>
                            <div>
                                <h5 class="font-bold text-base text-slate-900">{{ $item->name }}</h5>
                                <p class="text-sm text-slate-400">{{ $item->designation }}</p>
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
    <footer class="bg-white border-t border-slate-100 pt-16 pb-8 px-6 md:px-12 lg:px-18">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <!-- Brand Column -->
            <div class="md:col-span-1">
                <div class="mb-4">
                    <img src="{{ asset('assets/linguana.png') }}" alt="Illustration" class="w-40">
                </div>
                <p class="text-base text-slate-500">Master any language with AI-powered lessons and personalized learning paths.</p>
            </div>
            
            <!-- Links Columns -->
            <div>
                <p class="font-bold text-base text-slate-900 mb-4">Product</p>
                <ul class="space-y-2 text-base text-slate-500">
                    <li><a href="#" class="hover:text-[#55BCC9]">Features</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Languages</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Pricing</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">For Teams</a></li>
                </ul>
            </div>
            <div>
                <p class="font-bold text-base text-slate-900 mb-4">Company</p>
                <ul class="space-y-2 text-base text-slate-500">
                    <li><a href="#" class="hover:text-[#55BCC9]">About</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Blog</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Careers</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Press</a></li>
                </ul>
            </div>
            <div>
                <p class="font-bold text-base text-slate-900 mb-4">Support</p>
                <ul class="space-y-2 text-base text-slate-500">
                    <li><a href="#" class="hover:text-[#55BCC9]">Help Center</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Contact</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Privacy</a></li>
                    <li><a href="#" class="hover:text-[#55BCC9]">Terms</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-base text-slate-400">© 2026 Linguana, Inc. All rights reserved.</p>
            <div class="flex gap-4 text-base text-slate-400">
                <a href="#" class="hover:text-slate-600">Twitter</a>
                <a href="#" class="hover:text-slate-600">Instagram</a>
                <a href="#" class="hover:text-slate-600">LinkedIn</a>
                <a href="#" class="hover:text-slate-600">YouTube</a>
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