@extends('admin.layouts.admin')

@section('content')
    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6 w-full">
  <!-- Breadcrumb Start -->
  <div x-data="{ pageName: `Hero Content`}">
    <include src="./partials/breadcrumb.html" />
  </div>
  <!-- Breadcrumb End -->

  <!-- ====== Form Elements Section Start ====== -->
  <form action="{{ route('admin.service.submit') }}" method="POST" enctype="multipart/form-data" class="w-full">
  @csrf
    <div class="w-full">
      
      <div class="lg:col-span-8 space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
          
          <!-- Header Card -->
          <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 sm:px-6 sm:py-5 dark:border-gray-800">
  
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                Add Service
            </h3>
            
            <a href="{{ route('admin.service.show') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-blue-700">
                View Service
            </a>
            
        </div>
                    
          <!-- Form Inputs -->
          <div class="space-y-6 p-5 sm:p-6">
            
            <!-- Title -->
            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Service
              </label>
              <input 
                type="text" 
                name="service_name"
                placeholder=""
                value="" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
            </div>

            <!-- Description -->
            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Description
              </label>
              <textarea 
                name="description"
                placeholder="Description" 
                rows="6" 
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              ></textarea>
            </div>

            <!-- Button Text -->
            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Icon
              </label>
              <input 
                type="text" 
                name="icon"
                placeholder="" 
                value=""
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden focus:ring-3 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" 
              />
            </div>
            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Icon Color
              </label>
              <div class="flex items-center gap-3">
                <!-- Input Color Picker -->
                <input 
                    type="color" 
                    name="color" 
                    value="#3b82f6" 
                    class="h-10 w-20 cursor-pointer rounded-lg border border-gray-200 bg-white p-1 transition-colors hover:border-blue-500 dark:border-gray-800 dark:bg-black"
                >
                <span class="text-sm text-gray-500">Choose icon color</span>
            </div>
            </div>
            <div>
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Background Color
              </label>
              <div class="flex items-center gap-3">
                <input 
                    type="color" 
                    name="background_color" 
                    value="#3b82f6" 
                    class="h-10 w-20 cursor-pointer rounded-lg border border-gray-200 bg-white p-1 transition-colors hover:border-blue-500 dark:border-gray-800 dark:bg-black"
                >
                <span class="text-sm text-gray-500">Choose background color</span>
            </div>
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

    </div>
  </form>
  <!-- ====== Form Elements Section End ====== -->
</div>

@endsection