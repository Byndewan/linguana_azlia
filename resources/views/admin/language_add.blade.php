@extends('admin.layouts.admin')

@section('content')
    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6 w-full">
  <!-- Breadcrumb Start -->
  <div x-data="{ pageName: `Hero Content`}">
    <include src="./partials/breadcrumb.html" />
  </div>
  <!-- Breadcrumb End -->

  <!-- ====== Form Elements Section Start ====== -->
  <form action="{{ route('admin.language.submit') }}" method="POST" enctype="multipart/form-data" class="w-full">
  @csrf
      <div class="lg:col-span-8 space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
          
          <!-- Header Card -->
          <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 sm:px-6 sm:py-5 dark:border-gray-800">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
              Language Details
            </h3>

            <a href="{{ route('admin.language.show') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
                View Langauges
            </a>
          </div>
          
          <!-- Form Inputs -->
          <div class="space-y-6 p-5 sm:p-6">
            <!-- Title -->
            <div class="mb-5 max-w-xs flex aspect-video overflow-hidden rounded-lg border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                <img 
                    id="langaugePreview" 
                    src="" 
                    alt="Language Flag" 
                    class="h-full w-full object-cover" 
                />
            </div>
            
            <!-- Input File -->
            <div class="text-left">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Upload Flag
              </label>
              <input 
                type="file" 
                id="langaugeInput"
                name="flag"
                accept="image/png, image/jpeg, image/jpg"
                onchange="previewLanguage()"
                class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:cursor-pointer file:border-collapse file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pl-3.5 file:pr-3 file:text-sm file:text-gray-700 hover:file:bg-gray-100 focus:outline-hidden placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:placeholder:text-gray-400 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400" 
              />
              <p class="mt-2 text-xs text-gray-500">Format: JPG, PNG. Max 2MB.</p>
            </div>

            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Language
              </label>
              <input 
                type="text" 
                name="language"
                placeholder=""
                value="" 
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
  function previewLanguage() {
    const preview = document.getElementById('langaugePreview');
    const file = document.getElementById('langaugeInput').files[0];
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