@extends('admin.layouts.admin')

@section('content')
<main>
  <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="space-y-5 sm:space-y-6">
      
      <!-- ====== Page Header & Breadcrumb ====== -->
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">
            {{ $module->title ?? 'Everyday Conversations' }} 
        </h2>
        <nav>
            <ol class="flex items-center gap-2 text-sm">
                <li><a class="font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500 transition-colors" href="#">Modules</a></li>
                <li class="font-medium text-gray-500 dark:text-gray-400">/</li>
                <li class="font-medium text-blue-600 dark:text-blue-500">Manage</li>
            </ol>
        </nav>
      </div>

      <!-- ====== Main Card ====== -->
      <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        
        <!-- Tab Navigation (Replaces the header) -->
        <div class="flex items-center gap-8 px-5 pt-4 sm:px-6 sm:pt-5 overflow-x-auto">
          <!-- Tab 1: Active -->
          <button class="pb-4 border-b-2 border-blue-600 text-blue-600 font-medium flex items-center gap-2 shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" /></svg>
            Sub Modules
          </button>
          
          <!-- Tab 2: Inactive -->
          <button class="pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 font-medium flex items-center gap-2 shrink-0 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
            Vocabulary
          </button>
          
          <!-- Tab 3: Inactive -->
          <button class="pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 font-medium flex items-center gap-2 shrink-0 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" /></svg>
            Final Quiz
          </button>
        </div>

        <div class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
          
          <!-- Action Bar -->
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
              Curriculum Structure
            </h3>
            <a href="{{ route('admin.sub-module.add') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
              </svg>
              Add Sub Module
            </a>
          </div>

          <!-- ====== Accordion List Start ====== -->
          <div class="flex flex-col gap-4">
            
            {{-- @foreach($module->subModules as $subModule) --}}
            
            <!-- ACCORDION 1: Active/Open State -->
            <div class="overflow-hidden rounded-xl border border-blue-200 bg-white dark:border-blue-900/40 dark:bg-white/[0.02] shadow-sm transition-all">
              
              <!-- Accordion Header -->
              <div class="px-5 py-4 sm:px-6 sm:py-5 flex items-center justify-between bg-blue-50/50 dark:bg-blue-900/10">
                <div class="flex items-center gap-4">
                  <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-medium text-sm shadow-sm">
                    1 {{-- {{ $loop->iteration }} --}}
                  </div>
                  <h4 class="font-medium text-gray-800 text-base dark:text-white/90">Greetings & Introductions</h4>
                </div>
                <div class="flex items-center gap-3">
                  <button class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors" title="Edit">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                  </button>
                  <button class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors" title="Delete">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                  </button>
                  <!-- Icon Panah Up -->
                  <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                </div>
              </div>
              
              <!-- Accordion Body (Daftar Kuis) -->
              <div class="border-t border-blue-100 dark:border-blue-900/40 p-5 sm:p-6 pt-2 sm:pt-4">
                <div class="flex flex-col gap-3">
                  
                  <!-- List Item: Flashcard -->
                  <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-white/[0.03] hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
                    <div class="flex items-center gap-4">
                      <div class="p-2.5 bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" /></svg>
                      </div>
                      <div>
                        <h5 class="font-medium text-gray-800 text-sm dark:text-white/90">Basic Greetings</h5>
                        <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mt-0.5">Flashcard • 12 Items</p>
                      </div>
                    </div>
                    <!-- Tombol Manage kuis -->
                    <a href="#" class="inline-flex items-center px-3 py-1.5 rounded-md bg-amber-50 text-xs font-medium text-amber-700 border border-amber-100 dark:bg-amber-900/20 dark:text-amber-400 dark:border-amber-900/50 hover:bg-amber-100 dark:hover:bg-amber-900/40 transition-colors">
                      Manage
                    </a>
                  </div>
                  
                  <!-- Add Quiz Button -->
                  <button class="mt-2 w-full py-3 border-2 border-dashed border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 font-medium rounded-xl hover:border-blue-600 hover:text-blue-600 dark:hover:border-blue-500 dark:hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors text-sm flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    Add Quiz / Material
                  </button>
                </div>
              </div>
            </div>

            <!-- ACCORDION 2: Inactive/Closed State -->
            <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-white/[0.03] shadow-sm hover:border-gray-300 dark:hover:border-gray-700 transition-colors">
              <div class="px-5 py-4 sm:px-6 sm:py-5 flex items-center justify-between cursor-pointer">
                <div class="flex items-center gap-4">
                  <div class="w-8 h-8 rounded-full border border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 flex items-center justify-center font-medium text-sm">2</div>
                  <h4 class="font-medium text-gray-800 text-base dark:text-white/90">Formal vs Informal Speech</h4>
                </div>
                <div class="flex items-center gap-3">
                  <button class="text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors" title="Edit">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                  </button>
                  <button class="text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 transition-colors" title="Delete">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                  </button>
                  <!-- Icon Panah Down -->
                  <svg class="w-5 h-5 text-gray-400 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                </div>
              </div>
            </div>

            {{-- @endforeach --}}

          </div>
          <!-- ====== Accordion List End ====== -->
          
        </div>
      </div>
    </div>
  </div>
</main>
@endsection