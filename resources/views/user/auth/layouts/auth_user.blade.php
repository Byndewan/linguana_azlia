<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome') - Linguana</title>
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
        
        @yield('content')
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: '',
                text: '{{ Session::get('success') }}'
            });
        @endif

        @if(Session::has('warning'))
            Toast.fire({
                icon: 'warning',
                title: '',
                text: '{{ Session::get('warning') }}'
            });
        @endif

        @if(Session::has('error'))
            Toast.fire({
                icon: 'error',
                title: '',
                text: '{{ Session::get('error') }}'
            });
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: '',
                    text: '{{ $error }}'
                });
            @endforeach
        @endif
    </script>

</body>
</html>