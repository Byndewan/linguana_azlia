@extends('admin.layouts.admin')

@section('content')
<main>
  <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="space-y-5 sm:space-y-6">
      
      <!-- ====== Page Header & Breadcrumb ====== -->
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">
            {{ $module->title }} 
        </h2>
        <nav>
            <ol class="flex items-center gap-2 text-sm">
                <li><a class="font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500 transition-colors" href="{{ route('admin.manage-module.show') }}">Modules</a></li>
                <li class="font-medium text-gray-500 dark:text-gray-400">/</li>
                <li class="font-medium text-blue-600 dark:text-blue-500">Manage</li>
            </ol>
        </nav>
      </div>

      <!-- ====== Main Card ====== -->
      <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        
        <!-- Tab Navigation -->
        <div class="flex items-center gap-8 px-5 pt-4 sm:px-6 sm:pt-5 overflow-x-auto border-b border-gray-100 dark:border-gray-800">
          
          <!-- Tab 1: Sub Modules -->
          <button id="tab-btn-submodules" onclick="switchTab('submodules')" class="tab-btn pb-4 border-b-2 border-blue-600 text-blue-600 font-medium flex items-center gap-2 shrink-0 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" /></svg>
            Sub Modules
          </button>
        </div>

        <!-- ==================== AREA KONTEN TAB ==================== -->
        
        <!-- 1. KONTEN SUB MODULES  -->
        <div id="content-submodules" class="tab-content block p-5 sm:p-6">
          <!-- Action Bar -->
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Curriculum Structure</h3>
            <a href="{{ route('admin.sub-module.add', $module->id) }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
              Add Sub Module
            </a>
          </div>

          <!-- Accordion List Start -->
          <div class="flex flex-col gap-4">
            @foreach($all_data as $item)
            <div class="accordion-item overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] shadow-sm transition-all duration-300">
              <div onclick="toggleAccordion(this)" class="px-5 py-4 sm:px-6 sm:py-5 flex items-center justify-between cursor-pointer hover:bg-gray-50 dark:hover:bg-white/[0.02] transition-colors">
                <div class="flex items-center gap-4">
                  <div class="number-badge w-8 h-8 rounded-full border border-gray-300 text-gray-500 flex items-center justify-center font-medium text-sm transition-colors duration-300 shadow-sm">{{ $loop->iteration }}</div>
                  <h4 class="font-medium text-gray-800 text-base dark:text-white/90">{{ $item->title }}</h4>
                </div>
                <div class="flex items-center gap-3">
                  <a href="{{ route('admin.sub-module.edit', $item->id) }}">
                    <button onclick="event.stopPropagation()" class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                  </a>
                  <form action="{{ route('admin.sub-module.delete', $item->id) }}" method="POST">
                  @csrf
                      <button onclick="event.stopPropagation()" class="text-red-500 hover:text-red-700 transition-colors" title="Delete"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                  </form>
                  <svg class="arrow-icon w-5 h-5 text-gray-400 ml-2 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                </div>
              </div>
              <!-- Accordion Body -->
              <div class="accordion-body hidden border-t border-blue-100 dark:border-blue-900/40 p-5 sm:p-6 pt-2 sm:pt-4">
                <div class="flex flex-col gap-3">
                  
                  <!-- List Item: Flashcard -->
                  <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-white/[0.03] hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
                    <div class="flex items-center gap-4">
                      <div class="p-2.5 bg-teal-100 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                      </div>
                      <div>
                        <h5 class="font-medium text-gray-800 text-sm dark:text-white/90">Vocabulary</h5>
                      </div>
                    </div>
                    <!-- Tombol Manage kuis -->
                    <a href="{{ route('admin.vocabulary.show', $item->id) }}" class="inline-flex items-center px-3 py-1.5 rounded-md bg-teal-50 text-xs font-medium text-teal-700 border border-teal-100 dark:bg-teal-900/20 dark:text-teal-400 dark:border-teal-900/50 hover:bg-teal-100 dark:hover:bg-teal-900/40 transition-colors">
                      Manage
                    </a>
                  </div>

                  <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-white/[0.03] hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
                    <div class="flex items-center gap-4">
                      <div class="p-2.5 bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                        </svg>
                      </div>
                      <div>
                        <h5 class="font-medium text-gray-800 text-sm dark:text-white/90">Final Quiz</h5>
                      </div>
                    </div>
                    <!-- Tombol Manage kuis -->
                    <a href="#" class="inline-flex items-center px-3 py-1.5 rounded-md bg-amber-50 text-xs font-medium text-amber-700 border border-amber-100 dark:bg-amber-900/20 dark:text-amber-400 dark:border-amber-900/50 hover:bg-amber-100 dark:hover:bg-amber-900/40 transition-colors">
                      Manage
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<script>
  function toggleAccordion(headerElement) {
    const accordionItem = headerElement.closest('.accordion-item');
    const accordionBody = accordionItem.querySelector('.accordion-body');
    const arrowIcon = accordionItem.querySelector('.arrow-icon');
    const numberBadge = accordionItem.querySelector('.number-badge');

    accordionBody.classList.toggle('hidden');

    arrowIcon.classList.toggle('rotate-180');
    arrowIcon.classList.toggle('text-gray-400');
    arrowIcon.classList.toggle('text-blue-600');
    arrowIcon.classList.toggle('dark:text-blue-400');

    headerElement.classList.toggle('bg-blue-50/50');
    headerElement.classList.toggle('dark:bg-blue-900/10');

    accordionItem.classList.toggle('border-gray-200');
    accordionItem.classList.toggle('border-blue-200');

    numberBadge.classList.toggle('border-gray-300');
    numberBadge.classList.toggle('text-gray-500');
    numberBadge.classList.toggle('border-transparent');
    numberBadge.classList.toggle('bg-blue-600');
    numberBadge.classList.toggle('text-white');
  }
</script>

@endsection