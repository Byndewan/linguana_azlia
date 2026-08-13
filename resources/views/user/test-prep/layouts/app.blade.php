<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Linguana</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fbfbfb] h-screen flex font-sans overflow-hidden text-slate-800 relative">

    <!-- ================= SIDEBAR ================= -->
    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 transition-all duration-300 fixed inset-y-0 left-0 z-50 md:relative -translate-x-full md:translate-x-0">
        
        <!-- Tombol Minimize (Desktop) -->
        <button id="toggleBtn" class="absolute -right-3.5 top-9 w-7 h-7 bg-white border border-slate-200 rounded-full hidden md:flex items-center justify-center hover:bg-slate-50 shadow-sm cursor-pointer z-30 transition-transform duration-300">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <div>
            <!-- Logo Area -->
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-100 overflow-hidden">
                <img src="{{ asset('assets/linguana.png') }}" alt="Illustration" class="w-30">
                <!-- Tombol Close khusus Mobile di dalam sidebar -->
                <button id="mobileCloseBtn" class="md:hidden text-slate-400 hover:text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Nav Links -->
            <nav class="p-4 flex flex-col gap-2 mt-4">
                <a href="#" class="flex items-center px-2 py-2.5 rounded-lg text-slate-800 hover:bg-slate-50 font-medium overflow-hidden">
                    <div class="rounded shrink-0 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </div> 
                    <span class="sidebar-text ml-3 whitespace-nowrap transition-opacity duration-200">Home</span>
                </a>
                <a href="#" class="flex items-center px-2 py-2.5 rounded-lg text-slate-800 hover:bg-slate-50 font-medium overflow-hidden">
                    <div class="rounded shrink-0 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>
                    </div> 
                    <span class="sidebar-text ml-3 whitespace-nowrap transition-opacity duration-200">Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-2 py-2.5 rounded-lg bg-[#55BCC9] text-white font-medium shadow-sm overflow-hidden">
                    <div class="rounded shrink-0 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div> 
                    <span class="sidebar-text ml-3 whitespace-nowrap transition-opacity duration-200">My Courses</span>
                </a>
                <a href="#" class="flex items-center px-2 py-2.5 rounded-lg text-slate-800 hover:bg-slate-50 font-medium overflow-hidden">
                    <div class="rounded shrink-0 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div> 
                    <span class="sidebar-text ml-3 whitespace-nowrap transition-opacity duration-200">Profile</span>
                </a>
                <a href="#" class="flex items-center px-2 py-2.5 rounded-lg text-slate-800 hover:bg-slate-50 font-medium overflow-hidden">
                    <div class="rounded shrink-0 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                    </div> 
                    <span class="sidebar-text ml-3 whitespace-nowrap transition-opacity duration-200">Logout</span>
                </a>
            </nav>
        </div>

        <!-- User Profile Bottom -->
        <div class="p-4 border-t border-slate-100 overflow-hidden">
            <div class="flex items-center px-2 py-2">
                <div class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center font-bold text-slate-500 shrink-0 mx-0.5">
                    <img class="rounded-full w-full h-full object-cover" src="{{ asset('assets/profile-dashboard.jpeg') }}" alt="">
                </div>
                <div class="ml-3 sidebar-text whitespace-nowrap transition-opacity duration-200">
                    <div class="font-bold text-sm">Azlia Nisrina</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Overlay gelap saat sidebar muncul di HP -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/30 z-40 hidden md:hidden"></div>

    <!-- ================= MAIN CONTENT AREA ================= -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Tombol Hamburger untuk memunculkan sidebar di layar HP -->
        <div class="md:hidden flex items-center px-6 py-4 bg-white border-b border-slate-200 shrink-0">
            <button id="mobileOpenBtn" class="text-slate-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <span class="ml-4 font-bold text-slate-800">Menu</span>
        </div>

        <div class="flex-1 overflow-y-auto">
            @yield('content')
        </div>
    </div>

</body>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');
    const mobileOpenBtn = document.getElementById('mobileOpenBtn');
    const mobileCloseBtn = document.getElementById('mobileCloseBtn');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const texts = document.querySelectorAll('.sidebar-text');

    // Tombol Minimize untuk Desktop
    if(toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-20');
            toggleBtn.classList.toggle('rotate-180');

            texts.forEach(text => {
                text.classList.toggle('opacity-0');
                text.classList.toggle('w-0');
                setTimeout(() => {
                    text.classList.toggle('hidden');
                }, text.classList.contains('hidden') ? 0 : 200);
            });
        });
    }

    // Fungsi Buka Sidebar di Mobile
    function openMobileSidebar() {
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
    }

    // Fungsi Tutup Sidebar di Mobile
    function closeMobileSidebar() {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
    }

    if(mobileOpenBtn) mobileOpenBtn.addEventListener('click', openMobileSidebar);
    if(mobileCloseBtn) mobileCloseBtn.addEventListener('click', closeMobileSidebar);
    if(sidebarOverlay) sidebarOverlay.addEventListener('click', closeMobileSidebar);
</script>
</html>