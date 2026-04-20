<header class="w-full bg-white/80 backdrop-blur">
    <div class="container-custom py-3">

        <div class="flex items-center justify-between">

            <!-- Left -->
            <div class="flex items-center gap-2">
                
                <!-- Mobile menu -->
                <button @click="$dispatch('toggle-sidebar')"
                    class="flex items-center justify-center h-9 w-9 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 lg:hidden">
                    <i class="ri-menu-4-line"></i>
                </button>

                <!-- Desktop collapse -->
                <button @click="$dispatch('toggle-collapse')"
                    class="hidden lg:flex items-center justify-center h-9 w-9 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">
                    <i class="ri-indent-decrease-line"></i>
                </button>

                <!-- Title -->
                <div class="leading-tight">
                    <h1 class="text-base font-semibold text-slate-900">Dashboard</h1>
                    <p class="hidden sm:block text-xs text-slate-500">
                        Admin workspace overview
                    </p>
                </div>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-2">

                <!-- Notifications -->
                <button class="relative flex items-center justify-center h-9 w-9 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">
                    <i class="ri-notification-3-line"></i>
                    <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-blue-500"></span>
                </button>

                <!-- Profile -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-2 rounded-full bg-slate-100 px-2 py-1.5 hover:bg-slate-200">

                        <div class="h-8 w-8 rounded-full bg-blue-500 text-xs font-semibold text-white flex items-center justify-center">
                            AU
                        </div>

                        <span class="hidden sm:block text-sm font-medium text-slate-800">
                            Admin
                        </span>

                        <i class="ri-arrow-down-s-line hidden sm:block text-slate-500"></i>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false" x-cloak
                        class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-md overflow-hidden">

                        <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-slate-50">Settings</a>

                        <div class="h-px bg-slate-100"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-slate-50">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>