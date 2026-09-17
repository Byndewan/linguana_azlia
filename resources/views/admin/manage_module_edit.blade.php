@extends('admin.layouts.admin')

@section('content')
    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6 w-full">
  <!-- Breadcrumb Start -->
  <div x-data="{ pageName: `Hero Content`}">
    <include src="./partials/breadcrumb.html" />
  </div>
  <!-- Breadcrumb End -->

  <!-- ====== Form Elements Section Start ====== -->
  <form action="{{ route('admin.manage-module.update', $row_data->id) }}" method="POST" enctype="multipart/form-data" class="w-full">
  @csrf
      <div class="lg:col-span-8 space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
          
          <!-- Header Card -->
          <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 sm:px-6 sm:py-5 dark:border-gray-800">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
              Module Edit
            </h3>

            <a href="{{ route('admin.learning-path.show') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
                View Modules
            </a>
          </div>
          
          <!-- Form Inputs -->
          <div class="space-y-6 p-5 sm:p-6">

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Title
              </label>
              <input 
                type="text" 
                name="title"
                placeholder=""
                value="{{ $row_data->title }}" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Select Learning Path Title
              </label>
              <select 
                name="learning_path_id"
                placeholder=""
                value="" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
                @foreach($learning_path as $item)
                    <option value="{{ $item->id }}" @if($item->id == $row_data->learning_path_id) selected @endif>{{ $item->title }}</option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Icon
              </label>
              <input 
                type="text" 
                name="icon"
                placeholder=""
                value="{{ $row_data->icon }}" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Icon Color
              </label>
                <input 
                    type="color" 
                    name="color" 
                    value="{{ $row_data->color }}" 
                    class="h-10 w-20 cursor-pointer rounded-lg border border-gray-200 bg-white p-1 transition-colors hover:border-blue-500 dark:border-gray-800 dark:bg-black"
                >
                <span class="text-sm text-gray-500">Choose icon color</span>
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Background Color
              </label>
                <input 
                    type="color" 
                    name="background_color" 
                    value="{{ $row_data->background_color }}" 
                    class="h-10 w-20 cursor-pointer rounded-lg border border-gray-200 bg-white p-1 transition-colors hover:border-blue-500 dark:border-gray-800 dark:bg-black"
                >
                <span class="text-sm text-gray-500">Choose icon color</span>
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Time
              </label>
              <input 
                type="number" 
                name="time"
                placeholder=""
                value="{{ $row_data->time }}" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Point
              </label>
              <input 
                type="number" 
                name="point"
                placeholder=""
                value="{{ $row_data->point }}" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
            </div>

            <!-- Tombol Save -->
            <div class="flex justify-end pt-4">
              <button 
                type="submit" 
                class="flex justify-center rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-700 transition-colors"
              >
                Save Changes
              </button>
            </div>

          </div>
        </div>
      </div>
  </form>
  <!-- ====== Form Elements Section End ====== -->
</div>

<!-- ==================== SCRIPT LIVE PREVIEW ==================== -->
<script>
  function previewLearningPath() {
    const preview = document.getElementById('learningPathPreview');
    const file = document.getElementById('learningPathInput').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection