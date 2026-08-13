@extends('admin.layouts.admin')

@section('content')
<main>
  <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
      
      <div class="mb-6 lg:mb-8">
        <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
          Edit Personal Information
        </h4>
        <p class="text-sm text-gray-500 dark:text-gray-400">
          Update your details to keep your profile up-to-date.
        </p>
      </div>

      <form class="flex flex-col" method="POST" action="{{ route('admin.profile.submit') }}" enctype="multipart/form-data">
        @csrf
        <div>
          <!-- ================= BAGIAN FOTO PROFIL START ================= -->
        <div class="mb-8 border-b border-gray-200 pb-8 dark:border-gray-800">
          <div class="flex items-center gap-6">
            <!-- Lingkaran Preview Foto -->
            <div class="h-24 w-24 overflow-hidden rounded-full border border-gray-200 shadow-sm dark:border-gray-700">
              <img 
                id="previewImage" 
                name="photo"
                src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" 
                alt="Profile" 
                class="h-full w-full object-cover" 
              />
            </div>
            
            <!-- Tombol Upload -->
            <div>
              <label 
                for="profilePhoto" 
                class="flex cursor-pointer items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] transition-colors"
              >
                Change photo
                <input 
                  type="file" 
                  name="photo" 
                  id="profilePhoto" 
                  class="sr-only" 
                  accept="image/png, image/jpeg, image/jpg" 
                  onchange="previewFile()" 
                />
              </label>
              <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                Format: JPG, JPEG, or PNG. Max. 2MB.
              </p>
            </div>
          </div>
        </div>
        <!-- ================= BAGIAN FOTO PROFIL END ================= -->

          <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
            <div class="col-span-2 lg:col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Name</label>
              <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
              <input type="email" name="email" value="{{ Auth::guard('admin')->user()->email }}" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">New Password</label>
              <input type="password" name="password" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-2 lg:col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Confirm Password</label>
              <input type="password" name="confirm_password" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:focus:border-brand-800" />
            </div>

        </div>

        <div class="flex items-center mt-8 lg:justify-end">
          <button type="submit" class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
            Save Changes
          </button>
        </div>

      </form>
    </div>
    
  </div>
</main>

<script>
  function previewFile() {
    const preview = document.getElementById('previewImage');
    const file = document.getElementById('profilePhoto').files[0];
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