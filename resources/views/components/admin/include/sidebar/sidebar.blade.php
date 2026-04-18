<aside class="h-full bg-white border-r border-slate-200 transition-all duration-200" :class="sidebarCollapsed ? 'lg:w-20' : 'lg:w-64'">
    <div class="flex flex-col h-full">
        <div class="p-4 border-b border-slate-100 flex items-center gap-3">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                <img src="{{ asset('Concrete-Champs-dark.png') }}" alt="logo" class="h-8" />
            </a>
            <span class="font-semibold text-slate-800 hidden lg:inline-block" x-show="!sidebarCollapsed">Concrete Champs</span>
        </div>

        <nav class="flex-1 overflow-y-auto p-2 space-y-1">
            @foreach ($menu as $item)
                @php
                    $hasChildren = ! empty($item['children']);
                    $itemActive = $item['active'] ?? false;
                    $childActive = $item['childActive'] ?? false;
                    $initialOpen = $childActive ? 'true' : 'false';
                @endphp

                <div x-data="{ open: {{ $initialOpen }} }" class="group">
                    @if($hasChildren)
                        <button @click="open = !open" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50" :class="open || {{ $childActive ? 'true' : 'false' }} ? 'bg-indigo-50 text-indigo-700' : ''">
                            <i class="{{ $item['icon'] }} text-lg"></i>
                            <span x-show="!sidebarCollapsed" class="flex-1 text-sm text-slate-800 text-left">{{ $item['title'] }}</span>
                            <i x-show="!sidebarCollapsed" class="ri-arrow-down-s-line text-sm"></i>
                        </button>

                        <div x-show="open" x-cloak x-transition class="mt-1 space-y-1 pl-10 pr-2">
                            @foreach ($item['children'] as $child)
                                <a href="{{ $child['uri'] }}" class="block px-3 py-2 rounded-lg text-sm text-slate-700 hover:bg-slate-50" :class="window.location.pathname === '{{ $child['uri'] }}' ? 'bg-indigo-50 text-indigo-700' : ''">
                                    <span x-show="!sidebarCollapsed">{{ $child['title'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <a href="{{ $item['uri'] }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50" :class="window.location.pathname === '{{ $item['uri'] }}' ? 'bg-indigo-50 text-indigo-700' : ''">
                            <i class="{{ $item['icon'] }} text-lg"></i>
                            <span x-show="!sidebarCollapsed" class="text-sm text-slate-800">{{ $item['title'] }}</span>
                        </a>
                    @endif
                </div>
            @endforeach
        </nav>

        <div class="p-3 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
                    <i class="ri-logout-box-r-line"></i>
                    <span x-show="!sidebarCollapsed">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>