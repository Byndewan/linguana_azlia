@extends('admin.layouts.admin')

@section('content')
<div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6 w-full space-y-6">

  <!-- Breadcrumb & Header Title -->
  <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white">
      User Profile & Activity
    </h2>
    <a href="{{ route('admin.manage-user.show') }}" class="inline-flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
      ← Back to User List
    </a>
  </div>

  <!-- Row 1: Profile Overview Card & Quick Stats -->
  <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    
    <!-- User Card (Dummy) -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:col-span-1">
      <div class="flex flex-col items-center text-center">
        <!-- Avatar Initial -->
        <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-2xl font-bold text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
          A
        </div>

        <h3 class="text-lg font-bold text-gray-800 dark:text-white/90">
          Azlia Nisrina
        </h3>
        <p class="text-sm text-gray-500 dark:text-gray-400">
          azlia@example.com
        </p>

        <div class="mt-3 flex items-center gap-2">
          <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400">
            Active Student
          </span>
          <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700 dark:bg-blue-900/20 dark:text-blue-400">
            Role: User
          </span>
        </div>
      </div>

      <div class="mt-6 border-t border-gray-100 pt-4 dark:border-gray-800 space-y-3 text-sm">
        <div class="flex justify-between text-gray-600 dark:text-gray-400">
          <span>Joined Date:</span>
          <span class="font-medium text-gray-800 dark:text-white">12 Oct 2025</span>
        </div>
        <div class="flex justify-between text-gray-600 dark:text-gray-400">
          <span>User ID:</span>
          <span class="font-medium text-gray-800 dark:text-white">#USR-1092</span>
        </div>
      </div>
    </div>

    <!-- Quick Stats Cards (2 Columns - Dummy) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:col-span-2">
      
      <!-- Stat 1: Active Language -->
      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] flex flex-col justify-between">
        <div>
          <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Currently Learning</span>
          <h4 class="mt-2 text-2xl font-extrabold text-gray-800 dark:text-white">
            English
          </h4>
        </div>
        <div class="mt-4 flex items-center gap-1.5 text-xs text-emerald-600">
          <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
          Active Path
        </div>
      </div>

      <!-- Stat 2: Total Modules Completed -->
      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] flex flex-col justify-between">
        <div>
          <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Modules Completed</span>
          <h4 class="mt-2 text-2xl font-extrabold text-gray-800 dark:text-white">
            4 / 6
          </h4>
        </div>
        <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">Total enrolled modules</p>
      </div>

      <!-- Stat 3: Total Points / XP -->
      <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] flex flex-col justify-between sm:col-span-2">
        <div>
          <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Points Earned</span>
          <div class="mt-2 flex items-baseline gap-2">
            <h4 class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">
              1,250
            </h4>
            <span class="text-sm font-semibold text-gray-500">XP</span>
          </div>
        </div>
        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Earned across all completed lessons and activities.</p>
      </div>

    </div>
  </div>

  <!-- Row 2: Learning Progress Table (Dummy) -->
  <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="border-b border-gray-100 px-5 py-4 sm:px-6 sm:py-5 dark:border-gray-800 flex items-center justify-between">
      <h3 class="text-base font-semibold text-gray-800 dark:text-white/90">
        Module Learning Progress History
      </h3>
      <span class="text-xs text-gray-500">Total: 4 Records</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-900/50 dark:text-gray-300 border-b border-gray-100 dark:border-gray-800">
          <tr>
            <th class="px-6 py-3.5">Module Title</th>
            <th class="px-6 py-3.5">Language</th>
            <th class="px-6 py-3.5">Status</th>
            <th class="px-6 py-3.5">XP Earned</th>
            <th class="px-6 py-3.5 text-right">Last Activity</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
          
          <!-- Row Dummy 1 -->
          <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-800 dark:text-white">
              Everyday Conversations
            </td>
            <td class="px-6 py-4">English</td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400">
                Completed
              </span>
            </td>
            <td class="px-6 py-4 font-semibold text-gray-800 dark:text-gray-200">+350 XP</td>
            <td class="px-6 py-4 text-right text-xs">2 hours ago</td>
          </tr>

          <!-- Row Dummy 2 -->
          <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-800 dark:text-white">
              Travel & Navigation
            </td>
            <td class="px-6 py-4">English</td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center rounded-full bg-amber-50 px-2.5 py-1 text-xs font-medium text-amber-700 dark:bg-amber-900/20 dark:text-amber-400">
                In Progress
              </span>
            </td>
            <td class="px-6 py-4 font-semibold text-gray-800 dark:text-gray-200">+150 XP</td>
            <td class="px-6 py-4 text-right text-xs">1 day ago</td>
          </tr>

          <!-- Row Dummy 3 -->
          <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-800 dark:text-white">
              Food & Dining Vocabulary
            </td>
            <td class="px-6 py-4">English</td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400">
                Completed
              </span>
            </td>
            <td class="px-6 py-4 font-semibold text-gray-800 dark:text-gray-200">+450 XP</td>
            <td class="px-6 py-4 text-right text-xs">3 days ago</td>
          </tr>

          <!-- Row Dummy 4 -->
          <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-800 dark:text-white">
              Basic Hangul Alphabet
            </td>
            <td class="px-6 py-4">Korean</td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400">
                Completed
              </span>
            </td>
            <td class="px-6 py-4 font-semibold text-gray-800 dark:text-gray-200">+300 XP</td>
            <td class="px-6 py-4 text-right text-xs">1 week ago</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection