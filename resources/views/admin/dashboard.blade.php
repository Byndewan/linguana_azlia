@extends('admin.layouts.admin')

@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-20">
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 lg:grid-cols-3">
                      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="9" cy="7" r="4"></circle>
                                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                          </div>
                          <div class="mt-5 flex items-end justify-between">
                              <div>
                                  <span class="text-sm text-gray-500 dark:text-gray-400">Total Learners</span>
                                  <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ count($users) }}</h4>
                              </div>
                          </div>
                      </div>

                      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                  <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                              </svg>
                          </div>
                          <div class="mt-5 flex items-end justify-between">
                              <div>
                                  <span class="text-sm text-gray-500 dark:text-gray-400">Active Modules</span>
                                  <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ count($modules) }}</h4>
                              </div>
                          </div>
                      </div>

                      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 dark:bg-purple-500/10 text-purple-600 dark:text-purple-400">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                  <line x1="8" y1="2" x2="8" y2="18"></line>
                                  <line x1="16" y1="6" x2="16" y2="22"></line>
                              </svg>
                          </div>
                          <div class="mt-5 flex items-end justify-between">
                              <div>
                                  <span class="text-sm text-gray-500 dark:text-gray-400">Learning Paths</span>
                                  <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ count($learning_path) }}</h4>
                              </div>
                          </div>
                      </div>

                      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                  <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                              </svg>
                          </div>
                          <div class="mt-5 flex items-end justify-between">
                              <div>
                                  <span class="text-sm text-gray-500 dark:text-gray-400">Total Vocabularies</span>
                                  <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ count($vocabularies) }}</h4>
                              </div>
                          </div>
                      </div>

                      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-500/10 text-cyan-600 dark:text-cyan-400">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                  <polyline points="22 4 12 14.01 9 11.01"></polyline>
                              </svg>
                          </div>
                          <div class="mt-5 flex items-end justify-between">
                              <div>
                                  <span class="text-sm text-gray-500 dark:text-gray-400">Quiz Passed</span>
                                  <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ count($quizzes) }}</h4>
                              </div>
                          </div>
                      </div>

                      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                              </svg>
                          </div>
                          <div class="mt-5 flex items-end justify-between">
                              <div>
                                  <span class="text-sm text-gray-500 dark:text-gray-400">Total XP Earned</span>
                                  <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">{{ $totalXpEarned }}</h4>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="col-span-12 xl:col-span-20">
                <!-- ====== Table One Start -->
                  <div
                    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6"
                  >
                    <div
                      class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between"
                    >
                      <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                          Recent Quiz Activity
                        </h3>
                      </div>

                      <div class="flex items-center gap-3">
                        <button
                          class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
                        >
                          <svg
                            class="stroke-current fill-white dark:fill-gray-800"
                            width="20"
                            height="20"
                            viewBox="0 0 20 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M2.29004 5.90393H17.7067"
                              stroke=""
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            />
                            <path
                              d="M17.7075 14.0961H2.29085"
                              stroke=""
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            />
                            <path
                              d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z"
                              fill=""
                              stroke=""
                              stroke-width="1.5"
                            />
                            <path
                              d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z"
                              fill=""
                              stroke=""
                              stroke-width="1.5"
                            />
                          </svg>

                          Filter
                        </button>

                        <button
                          class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
                        >
                          See all
                        </button>
                      </div>
                    </div>

                    <div class="w-full overflow-x-auto">
                      <table class="min-w-full">
                        <!-- table header start -->
                        <thead>
                          <tr class="border-gray-100 border-y dark:border-gray-800">
                            <th class="py-3">
                              <div class="flex items-center">
                                <p
                                  class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
                                >
                                  Users & Sub-module
                                </p>
                              </div>
                            </th>
                            <th class="py-3">
                              <div class="flex items-center">
                                <p
                                  class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
                                >
                                  Type
                                </p>
                              </div>
                            </th class="py-3">
                            <th class="py-3">
                              <div class="flex items-center">
                                <p
                                  class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
                                >
                                  XP Earned
                                </p>
                              </div>
                            </th>
                            <th class="py-3">
                              <div class="flex items-center col-span-2">
                                <p
                                  class="font-medium text-gray-500 text-theme-xs dark:text-gray-400"
                                >
                                  Time
                                </p>
                              </div>
                            </th>
                          </tr>
                        </thead>
                        <!-- table header end -->

                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($recentActivities as $key => $item)
                          <tr>
                            <td class="py-3">
                              <div class="flex items-center">
                                <div class="flex items-center gap-3">
                                  <div class="h-[50px] w-[50px] overflow-hidden rounded-full">
                                    <img src="{{ asset('uploads/' . $item->user->photo) }}" alt="{{ $item->user->name }}" class="h-full w-full object-cover" />
                                  </div>
                                  <div>
                                    <p
                                      class="font-medium text-gray-800 text-theme-sm dark:text-white/90"
                                    >
                                      {{ $item->user->name }}
                                    </p>
                                    <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                                      {{ $item->subModule->title }}
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="py-3">
                              <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                  @if($item->user->progress->learning_type == 'general')
                                      General Learning
                                  @elseif($item->user->progress->learning_type == 'test_prep')
                                      Test Preparation
                                  @else
                                      {{ ucfirst($item->user->progress->learning_type ?? 'General Learning') }}
                                  @endif
                                </p>
                              </div>
                            </td>
                            <td class="py-3">
                              <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                  +{{ $item->xp_earned }} XP
                                </p>
                              </div>
                            </td>
                            <td class="py-3">
                              <div class="flex items-center">
                                <p
                                  class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500"
                                >
                                  {{ $item->created_at->diffForHumans() }}
                                </p>
                              </div>
                            </td>
                          </tr>
                        @empty
                          <tr>
                              <td colspan="4" class="py-6 text-center text-gray-400 text-sm">
                                  No quiz activity recorded yet.
                              </td>
                          </tr>
                        @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>

                <!-- ====== Table One End -->
              </div>
            </div>
          </div>
@endsection