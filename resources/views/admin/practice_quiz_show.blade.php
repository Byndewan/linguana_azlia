@extends('admin.layouts.admin')

@section('content')
<main>
  <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="space-y-5 sm:space-y-6">

    <!-- ====== Page Header & Breadcrumb ====== -->
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white/90">
            Practice Quiz : {{ $subModule->title }}
        </h2>
        <nav>
            <ol class="flex items-center gap-2 text-sm">
                <li><a class="font-medium text-gray-500 hover:text-blue-600 transition-colors" href="{{ route('admin.manage-module.show') }}">Modules</a></li>
                <li class="font-medium text-gray-500">/</li>
                <li><a class="font-medium text-gray-500 hover:text-blue-600 transition-colors" href="{{ route('admin.manage-module.manage', $subModule->rModule->id) }}">{{ $subModule->rModule->title }}</a></li>
                <li class="font-medium text-gray-500">/</li>
                <li class="font-medium text-blue-600">Practice Quiz</li>
            </ol>
        </nav>
      </div>

      <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        
        <div class="flex items-center justify-between px-5 py-4 sm:px-6 sm:py-5">
          <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            Quiz
          </h3>
          <!-- Wrapper Dropdown -->
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
                        <!-- Opsi 1: Listen & Select -->
                        <!-- Nanti href-nya diarahkan ke route form listen, misal: route('admin.practice.add-listen', $subModule->id) -->
                        <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                        </svg> Listen & Select
                        </a>
                        
                        <!-- Opsi 2: Fill in the Blank -->
                        <!-- Nanti href-nya diarahkan ke route form fill blank, misal: route('admin.practice.add-fill', $subModule->id) -->
                        <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg> Fill in the Blank
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
          
          <!-- ====== Table Start ====== -->
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
                  @foreach($all_data as $item)
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
                            @elseif($item->type === 'fill_blank')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-purple-100 text-xs font-medium text-purple-800 dark:bg-purple-900/30 dark:text-purple-400">
                                    Fill in the blank
                                </span>
                            @endif
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $item->question }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $item->correct_answer }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                        <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.vocabulary.edit', $item->id) }}">
                                    <button class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </a>
                                <form action="{{ route('admin.vocabulary.delete', $item->id) }}" method="POST" class="m-0 inline-block">
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
          <!-- ====== Table End ====== -->
          
        </div>
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
</script>
@endsection