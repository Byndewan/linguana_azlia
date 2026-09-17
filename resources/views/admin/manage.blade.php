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

          <!-- Tab 2: Final Quiz -->
          <button id="tab-btn-finalquiz" onclick="switchTab('finalquiz')" class="tab-btn pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 font-medium flex items-center gap-2 shrink-0 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" /></svg>
            Final Quiz
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
                    <a href="{{ route('admin.vocabulary.show', $item->id) }}" class="inline-flex items-center px-3 py-1.5 rounded-md bg-teal-50 text-xs font-medium text-teal-700 border border-teal-100 dark:bg-teal-900/20 dark:text-teal-400 dark:border-teal-900/50 hover:bg-teal-100 dark:hover:bg-teal-900/40 transition-colors">
                      Manage
                    </a>
                  </div>

                  <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-white/[0.03] hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
                    <div class="flex items-center gap-4">
                      <div class="p-2.5 bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
                        </svg>
                      </div>
                      <div>
                        <h5 class="font-medium text-gray-800 text-sm dark:text-white/90">Practice Quiz</h5>
                      </div>
                    </div>
                    <a href="{{ route('admin.practice-quiz.show', $item->id) }}" class="inline-flex items-center px-3 py-1.5 rounded-md bg-indigo-50 text-xs font-medium text-indigo-700 border border-indigo-100 dark:bg-indigo-900/20 dark:text-indigo-400 dark:border-indigo-900/50 hover:bg-indigo-100 dark:hover:bg-indigo-900/40 transition-colors">
                      Manage
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- FINAL QUIZ -->
        <div id="content-finalquiz" class="tab-content hidden p-5 sm:p-6">
          <div class="flex items-center justify-between mb-6">
            <div>
              <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Final Module Exam</h3>
              <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Manage the comprehensive final assessment for this module.</p>
            </div>
            <div class="relative inline-block text-left">
                <button onclick="toggleDropdown('quizDropdown')" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Question
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <!-- Menu Dropdown -->
                <div id="quizDropdown" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-xl border border-gray-100 bg-white shadow-lg dark:border-gray-800 dark:bg-gray-900 transition-all">
                    <div class="py-2 px-1 flex flex-col gap-1">
                        <a href="{{ route('admin.final.listen-and-select.add', $module->id) }}" class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                        </svg> Listen & Select
                        </a>

                        <a href="{{ route('admin.final.listen-and-type.add', $module->id) }}" class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-colors">
                        <svg class="w-5 h-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg> Listen & Type
                        </a>

                        <a href="{{ route('admin.final.fill-blank-mc.add', $module->id) }}" class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg> Fill in the Blank Multiple Choice
                        </a>
                        
                        <a href="{{ route('admin.final.fill-blank-input.add', $module->id) }}" class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg> Fill in the Blank Input
                        </a>
                    </div>
                </div>
            </div>
          </div>

          <!-- Table Final Quiz -->
          @if($final_quiz->isEmpty())
            <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-white/[0.01] p-6 text-center">
              <div class="max-w-sm mx-auto space-y-3">
                <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 flex items-center justify-center mx-auto">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/></svg>
                </div>
                <h4 class="font-medium text-gray-800 text-sm dark:text-white/90">Final Exam Configuration</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">Add questions and rules for the final evaluation that students must pass to complete this module.</p>
              </div>
            </div>
          </div>
          @else
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="max-w-full overflow-x-auto">
              <table class="min-w-full">
                
                <!-- Table Header Start -->
                <thead>
                  <tr class="border-b border-gray-100 dark:border-gray-800">
                    <th class="px-5 py-3 sm:px-6 text-left">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        ID
                      </p>
                    </th>
                    <th class="px-5 py-3 sm:px-6 text-left">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        Quiz Type
                      </p>
                    </th>
                    <th class="px-5 py-3 sm:px-6 text-left">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        Question
                      </p>
                    </th>
                    <th class="px-5 py-3 sm:px-6 text-left">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        Answer
                      </p>
                    </th>
                    <th class="px-5 py-3 sm:px-6 text-right">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        Action
                      </p>
                    </th>
                  </tr>
                </thead>
                <!-- Table Header End -->

                <!-- Table Body Start -->
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                  @foreach($final_quiz as $item)
                    <tr>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $loop->iteration }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                            @if($item->type === 'listen_select')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-green-100 text-xs font-medium text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                    Listen & Select
                                </span>
                            @elseif($item->type === 'listen_type')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-orange-100 text-xs font-medium text-orange-800 dark:bg-orange-900/30 dark:text-orange-400">
                                    Listen & Type
                                </span>
                            @elseif($item->type === 'fill_blank_mc')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-purple-100 text-xs font-medium text-purple-800 dark:bg-purple-900/30 dark:text-purple-400">
                                    Fill in the blank (Multiple Choice)
                                </span>
                            @elseif($item->type === 'fill_blank_input')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-blue-100 text-xs font-medium text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                    Fill in the blank (Input)
                                </span>
                            @endif
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $item->question_text }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                @if($item->type == 'listen_select' || $item->type == 'fill_blank_mc')
                                    @php 
                                        $opsi = json_decode($item->options, true); 
                                    @endphp
                                    {{ $opsi[$item->correct_answer] ?? $item->correct_answer }}
                                @else
                                    {{ $item->correct_answer }}
                                @endif
                            </p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                        <div class="flex items-center justify-end gap-3">
                        @php
                            $editRoute = '#'; 

                            if ($item->type == 'listen_select') {
                                $editRoute = route('admin.final.listen-and-select.edit', $item->id);
                            } elseif ($item->type == 'listen_type') {
                                $editRoute = route('admin.final.listen-and-type.edit', $item->id); 
                            } elseif ($item->type == 'fill_blank_mc') {
                                $editRoute = route('admin.final.fill-blank-mc.edit', $item->id); 
                            } elseif ($item->type == 'fill_blank_input') {
                                $editRoute = route('admin.final.fill-blank-input.edit', $item->id); 
                            } 
                        @endphp
                                <a href="{{ $editRoute }}">
                                    <button class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </a>
                                @php
                                  $deleteRoute = '#'; 

                                  if ($item->type == 'listen_select') {
                                      $deleteRoute = route('admin.final.listen-and-select.delete', $item->id);
                                  } elseif ($item->type == 'listen_type') {
                                      $deleteRoute = route('admin.final.listen-and-type.delete', $item->id); 
                                  } elseif ($item->type == 'fill_blank_mc') {
                                      $deleteRoute = route('admin.final.fill-blank-mc.delete', $item->id); 
                                  } elseif ($item->type == 'fill_blank_input') {
                                      $deleteRoute = route('admin.final.fill-blank-input.delete', $item->id); 
                                  }
                              @endphp

                                <form action="{{ $deleteRoute }}" method="POST" class="m-0 inline-block">
                                @csrf
                                    <button class="btn-delete text-red-500 transition-colors hover:text-red-700" title="Delete">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                        </div>
                        </td>
                  </tr>
                  @endforeach
                </tbody>
                <!-- Table Body End -->
                
              </table>
            </div>
          </div>
          @endif
      </div>
    </div>
  </div>
</main>

<script>
  function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
    }

    window.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            const dropdown = document.getElementById('quizDropdown');
            if (dropdown && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        }
    });
    
  function switchTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => {
      el.classList.remove('border-blue-600', 'text-blue-600', 'dark:text-blue-400');
      el.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
    });

    document.getElementById('content-' + tabName).classList.remove('hidden');
    const activeBtn = document.getElementById('tab-btn-' + tabName);
    activeBtn.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');
    activeBtn.classList.add('border-blue-600', 'text-blue-600', 'dark:text-blue-400');
  }

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