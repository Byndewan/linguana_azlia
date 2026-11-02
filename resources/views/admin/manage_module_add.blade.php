@extends('admin.layouts.admin')

@section('content')
<div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6 w-full" 
     x-data="{ 
         selectedLanguage: '', 
         selectedLearningPath: '',
         allLearningPaths: @js($learningPaths),
         
         get filteredLearningPaths() {
             return this.allLearningPaths.filter(lp => lp.language_id == this.selectedLanguage);
         },

         get currentLearningPathType() {
             let found = this.allLearningPaths.find(lp => lp.id == this.selectedLearningPath);
             return found ? found.type : '';
         }
     }"
>
  <!-- Breadcrumb -->
  <div class="mb-6">
    <h3 class="text-xl font-bold text-gray-800 dark:text-white">Add New Module</h3>
  </div>

  <form action="{{ route('admin.manage-module.submit') }}" method="POST" enctype="multipart/form-data" class="w-full">
    @csrf
    <div class="lg:col-span-8 space-y-6">
      <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        
        <!-- Header Card -->
        <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 sm:px-6 sm:py-5 dark:border-gray-800">
          <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            Module Details
          </h3>
          <a href="{{ route('admin.manage-module.show') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
            View Modules
          </a>
        </div>
        
        <!-- Form Inputs -->
        <div class="space-y-6 p-5 sm:p-6">

          <!-- 1. Select Language -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Select Language</label>
            <select 
              x-model="selectedLanguage"
              @change="selectedLearningPath = ''"
              class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
              required
            >
              <option value="">-- Choose Language --</option>
              @foreach($languages as $lang)
                <option value="{{ $lang->id }}">{{ $lang->language }}</option>
              @endforeach
            </select>
          </div>

          <!-- 2. Select Learning Path -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Select Learning Path</label>
            <select 
              name="learning_path_id"
              x-model="selectedLearningPath"
              :disabled="!selectedLanguage"
              class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 disabled:opacity-50 disabled:cursor-not-allowed"
              required
            >
              <option value="">-- Choose Learning Path --</option>
              <template x-for="lp in filteredLearningPaths" :key="lp.id">
                <option :value="lp.id" x-text="lp.type === 'general' ? 'General Learning' : 'Test Preparation'"></option>
              </template>
            </select>
            <p class="text-xs text-gray-500 mt-1" x-show="!selectedLanguage">Please select a language first.</p>
          </div>

         <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Title</label>
          
          <input 
            type="text" 
            name="title"
            value="{{ old('title') }}" 
            :disabled="!selectedLearningPath"
            required
            placeholder="Enter module title..."
            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 disabled:opacity-50 disabled:cursor-not-allowed" 
          />
      </div>

          <!-- 4. Icon -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Icon</label>
            <input type="text" name="icon" value="{{ old('icon') }}" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90" required />
          </div>

          <!-- 5. Icon Color -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Icon Color</label>
            <input type="color" name="color" value="#3b82f6" class="h-10 w-20 cursor-pointer rounded-lg border border-gray-200 bg-white p-1">
          </div>

          <!-- 6. Background Color -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Background Color</label>
            <input type="color" name="background_color" value="#3b82f6" class="h-10 w-20 cursor-pointer rounded-lg border border-gray-200 bg-white p-1">
          </div>

          <!-- 7. Time -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Time (Minutes)</label>
            <input type="number" name="time" value="{{ old('time') }}" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90" required />
          </div>

          <!-- 8. Point -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Point</label>
            <input type="number" name="point" value="{{ old('point') }}" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90" required />
          </div>

          <!-- Tombol Save -->
          <div class="flex justify-end pt-4">
            <button type="submit" class="flex justify-center rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-700 transition-colors">
              Save Changes
            </button>
          </div>

        </div>
      </div>
    </div>
  </form>
</div>
@endsection