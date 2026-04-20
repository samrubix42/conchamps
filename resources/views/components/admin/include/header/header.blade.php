<header class="w-full bg-blue-50 shadow-sm">
    <div class="container-custom flex items-center gap-4 h-16 text-blue-700">
        <div class="flex items-center gap-2">
            <!-- Mobile menu -->
            <button @click="$dispatch('toggle-sidebar')" class="inline-flex items-center justify-center h-10 w-10 rounded-lg text-slate-700 hover:bg-slate-100 lg:hidden" aria-label="Open sidebar">
                <i class="ri-menu-4-line text-lg"></i>
            </button>

            <!-- Desktop collapse -->
            <button @click="$dispatch('toggle-collapse')" class="hidden lg:inline-flex items-center justify-center h-10 w-10 rounded-lg text-slate-700 hover:bg-slate-100" aria-label="Collapse sidebar">
                <i class="ri-indent-decrease-line text-lg"></i>
            </button>
        </div>

        <div class="flex-1 flex items-center gap-6">
            <div class="flex flex-col">
                <div class="text-sm font-semibold">Dashboard</div>
            </div>

            <form class="hidden md:flex items-center bg-white border border-blue-100 rounded-full px-3 py-2 w-full max-w-lg">
                <i class="ri-search-line text-blue-500"></i>
                <input placeholder="Search projects, users, invoices..." class="ml-3 bg-transparent outline-none text-sm w-full text-blue-700 placeholder-blue-300" />
            </form>
        </div>

        <div class="flex items-center gap-3">
            


            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="h-10 px-3 rounded-full bg-white flex items-center gap-3 text-blue-700" aria-expanded="false">
                    <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-sm font-semibold">AU</div>
                    <div class="hidden sm:flex flex-col items-start leading-tight">
                        <span class="text-sm font-medium">Admin User</span>
                        <span class="text-xs opacity-80">Super Admin</span>
                    </div>
                    <i class="ri-arrow-down-s-line hidden sm:inline-block"></i>
                </button>

                <div x-show="open" @click.outside="open = false" x-cloak x-transition class="absolute right-0 mt-2 w-56 bg-white border border-blue-100 rounded-lg shadow-lg py-2 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-50">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-50">Account settings</a>
                    <div class="border-t border-blue-100 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-blue-50">Sign out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>