<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0" @click.outside="sidebarToggle = false" x-data="{ selected: (page === 'ecommerce' ? 'Dashboard' : '') }"
>
  <!-- SIDEBAR HEADER -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="flex items-center gap-2 pt-8 sidebar-header pb-7"
  >
    <a href="{{ route('admin.dashboard') }}">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <h1 class="text-2xl font-medium">Admin Dashboard</h1>
      </span>
    </a>
  </div>
  <!-- SIDEBAR HEADER -->

  <div
    class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar"
  >
    <!-- Sidebar Menu -->
    <nav x-data="{selected: $persist('Dashboard')}">
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span
            class="menu-group-title"
            :class="sidebarToggle ? 'lg:hidden' : ''"
          >
            MENU
          </span>

          <svg
            :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            class="mx-auto fill-current menu-group-icon"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
              fill="currentColor"
            />
          </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
          <!-- Menu Item Dashboard -->
          <li>
            <a
              href="{{ route('admin.dashboard') }}"
              class="menu-item group {{ request()->routeIs('admin.dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}"
            >
              <svg
                class="{{ request()->routeIs('admin.dashboard') ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z" fill="currentColor" />
              </svg>
              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Dashboard
              </span>
            </a>
          </li>
          <!-- Menu Item Dashboard -->

          <!-- Menu Item Master Data -->
          <li>
            <a
              href="#"
              @click.prevent="selected = (selected === 'MasterData' ? '' : 'MasterData')"
              class="menu-item group {{ request()->routeIs('admin.language*', 'admin.learning-path*') ? 'menu-item-active' : 'menu-item-inactive' }}"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
              </svg>

              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                Master Data
              </span>

              <svg
                class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current transition-transform duration-300 {{ request()->routeIs('admin.language*','admin.learning-path*') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive' }}"
                :class="{ 'lg:hidden': sidebarToggle, 'rotate-180': selected === 'MasterData' }"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div
              class="overflow-hidden transform translate"
              :class="(selected === 'MasterData') ? 'block' :'hidden'"
              x-init="{{ request()->routeIs('admin.language*', 'admin.learning-path*',) ? 'selected = \'MasterData\'' : '' }}"
            >
              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a
                    href="{{ route('admin.language.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.language*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Language Setup
                  </a>
                </li>
                <li>
                  <a
                    href="{{ route('admin.learning-path.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.learning-path*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Manage Learning Path
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item Master Data -->

          <!-- Menu Item System & Settings -->
          <li>
            <a
              href="#"
              @click.prevent="selected = (selected === 'SystemSettings' ? '' : 'SystemSettings')"
              class="menu-item group {{ request()->routeIs('admin.hero*', 'admin.client*', 'admin.service*', 'admin.process*', 'admin.testimonial*', 'admin.website.setting*') ? 'menu-item-active' : 'menu-item-inactive' }}"
            >
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">

                <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />

              </svg>
              <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                System & Settings
              </span>

              <svg
                class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current transition-transform duration-300 {{ request()->routeIs('admin.hero*', 'admin.client*', 'admin.service*', 'admin.process*', 'admin.testimonial*', 'admin.website.setting*') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive' }}"
                :class="{ 'lg:hidden': sidebarToggle, 'rotate-180': selected === 'SystemSettings' }"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>

            <!-- Dropdown Menu Start -->
            <div
              class="overflow-hidden transform translate"
              :class="(selected === 'SystemSettings') ? 'block' :'hidden'"
              x-init="{{ request()->routeIs('admin.hero*', 'admin.client*', 'admin.service*', 'admin.process*', 'admin.testimonial*', 'admin.website.setting*') ? 'selected = \'SystemSettings\'' : '' }}"
            >
              <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                <li>
                  <a
                    href="{{ route('admin.hero.items') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.hero*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Hero Section
                  </a>
                </li>
                <li>
                  <a
                    href="{{ route('admin.client.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.client*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Client Section
                  </a>
                </li>
                <li>
                  <a
                    href="{{ route('admin.service.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.service*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Service Section
                  </a>
                </li>
                <li>
                  <a
                    href="{{ route('admin.process.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.process*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Process Section
                  </a>
                </li>
                <li>
                  <a
                    href="{{ route('admin.testimonial.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.testimonial*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Testimonial Section
                  </a>
                </li>
                <li>
                  <a
                    href="{{ route('admin.testimonial.show') }}"
                    class="menu-dropdown-item group {{ request()->routeIs('admin.website.setting*') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}"
                  >
                    Website Setting
                  </a>
                </li>
              </ul>
            </div>
            <!-- Dropdown Menu End -->
          </li>
          <!-- Menu Item System & Settings -->
          
        </ul>
      </div>


    <!-- Promo Box -->
    {{-- <div
      :class="sidebarToggle ? 'lg:hidden' : ''"
      class="mx-auto mb-10 w-full max-w-60 rounded-2xl bg-gray-50 px-4 py-5 text-center dark:bg-white/[0.03]"
    >
      <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">
        #1 Tailwind CSS Dashboard
      </h3>
      <p class="mb-4 text-gray-500 text-theme-sm dark:text-gray-400">
        Leading Tailwind CSS Admin Template with 400+ UI Component and Pages.
      </p>
      <a
        href="https://tailadmin.com/pricing"
        target="_blank"
        rel="nofollow"
        class="flex items-center justify-center p-3 font-medium text-white rounded-lg bg-brand-500 text-theme-sm hover:bg-brand-600"
      >
        Purchase Plan
      </a>
    </div> --}}
    <!-- Promo Box -->
  </div>
</aside>
