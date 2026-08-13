<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Linguana</title>
    @vite('resources/css/app.css') 
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white h-screen flex font-sans overflow-hidden">

    <!-- BAGIAN KIRI -->
    <div class="hidden md:flex md:w-1/2 bg-[#d7f7e9] relative flex-col justify-center items-center p-8">
        
        <div class="absolute top-8 left-8">
            <img src="{{ asset('assets/linguana.png') }}" alt="Illustration" class="w-35">
        </div>

        <img src="{{ asset('assets/Image.png') }}" alt="Student Learning" class="w-full max-w-lg object-contain mt-8">
        
    </div>

    <!-- BAGIAN KANAN -->
    <div class="w-full md:w-1/2 px-8 py-12 md:px-16 md:py-15 bg-white overflow-y-auto">
        
        <div class="w-full max-w-md mx-auto">
            
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Forgot Password?</h2>
            <p class="text-slate-500 mb-8 text-sm md:text-base">No worries, we'll send you reset instructions</p>

            <form action="#" method="POST" class="flex flex-col gap-4">

                <div>
                    <label for="email" class="block text-base font-bold text-slate-900 mb-1.5">Email Address</label>
                    <input type="email" id="email" placeholder="Enter your email" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#55BCC9] focus:ring-2 focus:ring-[#55BCC9]/20 transition-all text-base placeholder:text-slate-400">
                </div>

                <button type="submit" class="w-full mt-2 bg-[#55BCC9] hover:bg-[#45a4b1] cursor-pointer text-white font-bold py-3.5 rounded-xl transition-colors duration-200 shadow-sm text-base">
                    Send Email
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-6 md:mt-8">
                <a href="{{ route('user.login') }}" class="text-slate-900 font-bold underline hover:text-[#55BCC9] transition-colors">Back to log in</a>
            </p>

        </div>
    </div>

</body>
</html>