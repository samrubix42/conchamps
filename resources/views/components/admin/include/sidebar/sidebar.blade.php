<aside class="h-full bg-slate-950 text-slate-100 transition-all duration-200"
    :class="sidebarCollapsed ? 'lg:w-20' : 'lg:w-64'">

    <div class="flex flex-col h-full">

        <!-- Logo -->
        <div class="flex items-center justify-between px-4 py-4 bg-slate-900">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <img src="{{ asset('Concrete-Champs-white.png') }}" class="h-8" />
            </a>

            <button @click="$dispatch('toggle-sidebar')"
                class="lg:hidden flex items-center justify-center h-9 w-9 rounded-lg bg-slate-800 hover:bg-slate-700">
                <i class="ri-close-line"></i>
            </button>
        </div>

        <!-- Menu -->
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1.5">

            @foreach ($menu as $item)
                @php
                    $hasChildren = !empty($item['children']);
                    $itemActive = $item['active'] ?? false;
                    $childActive = $item['childActive'] ?? false;
                    $initialOpen = $childActive ? 'true' : 'false';
                @endphp

                <div x-data="{ open: {{ $initialOpen }} }">

                    @if($hasChildren)
                        <!-- Parent -->
                        <button @click="open = !open"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-[15px] font-medium transition-all duration-200"
                            :class="(open || {{ $childActive ? 'true' : 'false' }})
                                ? 'bg-blue-500/20 text-blue-300'
                                : 'text-slate-200 hover:bg-slate-800'">

                            <i class="{{ $item['icon'] }} text-lg"></i>

                            <span x-show="!sidebarCollapsed" class="flex-1 text-left">
                                {{ $item['title'] }}
                            </span>

                            <i x-show="!sidebarCollapsed"
                                class="ri-arrow-down-s-line text-base transition-transform duration-300"
                                :class="open ? 'rotate-180' : ''"></i>
                        </button>

                        <!-- Children (Smooth Animation) -->
                        <div x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            x-cloak
                            class="mt-1 space-y-1 pl-10">

                            @foreach ($item['children'] as $child)
                                <a wire:navigate href="{{ $child['uri'] }}"
                                    class="block px-3 py-2.5 rounded-lg text-[14px] transition
                                    {{ $child['active']
                                        ? 'bg-blue-500/15 text-blue-300'
                                        : 'text-slate-300 hover:bg-slate-800' }}">

                                    <span x-show="!sidebarCollapsed">
                                        {{ $child['title'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                    @else
                        <!-- Single Item -->
                        <a wire:navigate href="{{ $item['uri'] }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg text-[15px] font-medium transition-all duration-200
                            {{ $itemActive
                                ? 'bg-blue-500/20 text-blue-300'
                                : 'text-slate-200 hover:bg-slate-800' }}">

                            <i class="{{ $item['icon'] }} text-lg"></i>

                            <span x-show="!sidebarCollapsed">
                                {{ $item['title'] }}
                            </span>
                        </a>
                    @endif

                </div>
            @endforeach

        </nav>

        <!-- Logout -->
        <div class="px-3 py-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-sm transition">

                    <i class="ri-logout-box-r-line text-lg"></i>
                    <span x-show="!sidebarCollapsed">Logout</span>
                </button>
            </form>
        </div>

    </div>
</aside>