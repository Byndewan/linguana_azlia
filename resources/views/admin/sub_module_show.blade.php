@extends('admin.layouts.admin')

@section('content')
<main>
  <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="space-y-5 sm:space-y-6">
      <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        
        <div class="flex items-center justify-between px-5 py-4 sm:px-6 sm:py-5">
          <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            Sub Module List
          </h3>
          <a href="{{ route('admin.sub-module.add') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Sub Module
          </a>
          
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
                        Module
                      </p>
                    </th>
                    <th class="px-5 py-3 sm:px-6 text-left">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        Sub Module
                      </p>
                    </th>
                    <th class="px-5 py-3 sm:px-6 text-left">
                      <p class="font-medium text-gray-500 text-theme-md dark:text-gray-400">
                        Time
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
                  {{-- @foreach($all_data as $item)
                    <tr>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $loop->iteration }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $item->title }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $item->rLearningPath->title }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $item->rLearningPath->rLanguage->language }}</p>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            @if($item->rLearningPath->type === 'general')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-green-100 text-xs font-medium text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                    General Learning
                                </span>
                            @elseif($item->rLearningPath->type === 'test_prep')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-purple-100 text-xs font-medium text-purple-800 dark:bg-purple-900/30 dark:text-purple-400">
                                    Test Prep
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                        <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.manage-module.edit', $item->id) }}">
                                    <button class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </a>
                                <form action="{{ route('admin.manage-module.delete', $item->id) }}" method="POST" class="m-0 inline-block">
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
                  @endforeach --}}
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
@endsection