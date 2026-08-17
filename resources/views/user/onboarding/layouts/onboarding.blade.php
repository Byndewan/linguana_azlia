<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Language - Linguana</title>
    @vite('resources/css/app.css') 

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen flex flex-col font-sans relative">

    <div class="absolute top-0 left-0 p-6 md:p-10 z-20">
        <form action="{{ route('onboarding.cancel') }}" method="POST">
            @csrf
            <button type="submit" class="cursor-pointer flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-800 transition-colors">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Back
            </button>
        </form>
    </div>

    <div class="absolute top-0 right-0 p-6 md:p-10 opacity-80 pointer-events-none">
        <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M96 24C96 24 93.5 36.5 81 39C93.5 41.5 96 54 96 54C96 54 98.5 41.5 111 39C98.5 36.5 96 24 96 24Z" fill="#FDE6B1"/>
            <path d="M60 48C60 48 56.5 65.5 39 69C56.5 72.5 60 90 60 90C60 90 63.5 72.5 81 69C63.5 65.5 60 48 60 48Z" fill="#FDE6B1"/>
            <path d="M96 84C96 84 94.5 91.5 87 93C94.5 94.5 96 102 96 102C96 102 97.5 94.5 105 93C97.5 91.5 96 84 96 84Z" fill="#FDE6B1"/>
        </svg>
    </div>

    <!-- Wrapper Tengah (Agar isi konten tetap di tengah layar) -->
    <div class="flex-grow flex flex-col items-center justify-center px-6 py-12 z-10 w-full max-w-5xl mx-auto">
        @yield('content')
    </div>

</body>
</html>