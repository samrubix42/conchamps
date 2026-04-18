<header class="w-full bg-white border-b border-slate-200 shadow-sm">
    <div class="container-custom flex items-center gap-4 h-16">
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
                <div class="text-sm font-semibold text-slate-900">Dashboard</div>
                <div class="text-xs text-slate-500">Welcome back — here's what's happening</div>
            </div>

            <form class="hidden md:flex items-center bg-slate-50 border border-slate-100 rounded-full px-3 py-2 w-full max-w-lg">
                <i class="ri-search-line text-slate-400"></i>
                <input placeholder="Search projects, users, invoices..." class="ml-3 bg-transparent outline-none text-sm w-full" />
            </form>
        </div>

        <div class="flex items-center gap-3">
            <button x-data class="relative inline-flex items-center justify-center h-10 px-3 rounded-lg bg-white border border-slate-100 hover:shadow-sm" title="New">
                <i class="ri-add-line text-lg text-indigo-600"></i>
                <span class="hidden sm:inline-block ml-2 text-sm text-indigo-600 font-medium">New</span>
            </button>

            <button x-data="{ count: 3 }" class="relative inline-flex items-center justify-center h-10 w-10 rounded-lg hover:bg-slate-100 text-slate-700" aria-label="Notifications">
                <i class="ri-notification-3-line text-lg"></i>
                <span x-text="count" x-show="count" class="absolute -top-1 -right-1 inline-flex items-center justify-center text-[10px] font-semibold text-white bg-red-500 h-5 w-5 rounded-full"></span>
            </button>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="h-10 px-3 rounded-full bg-indigo-600 text-white flex items-center gap-3" aria-expanded="false">
                    <img src="{{ asset('assets/img/avatar.png') }}" alt="avatar" class="h-8 w-8 rounded-full object-cover border-2 border-white shadow-sm" />
                    <div class="hidden sm:flex flex-col items-start leading-tight">
                        <span class="text-sm font-medium">Admin User</span>
                        <span class="text-xs text-indigo-100">Super Admin</span>
                    </div>
                    <i class="ri-arrow-down-s-line hidden sm:inline-block"></i>
                </button>

                <div x-show="open" @click.outside="open = false" x-cloak x-transition class="absolute right-0 mt-2 w-56 bg-white border border-slate-200 rounded-lg shadow-lg py-2 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Account settings</a>
                    <div class="border-t border-slate-100 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-slate-50">Sign out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>