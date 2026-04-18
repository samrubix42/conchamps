<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light no-scrollbar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} | Concrete Champs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased font-body bg-slate-50 text-slate-900" x-data="{ sidebarOpen: false, sidebarCollapsed: (localStorage.getItem('adminSidebarCollapsed') === 'true') }" @toggle-sidebar.window="sidebarOpen = !sidebarOpen" @toggle-collapse.window="sidebarCollapsed = !sidebarCollapsed; localStorage.setItem('adminSidebarCollapsed', sidebarCollapsed)">

    <div class="min-h-screen flex">
        <!-- Sidebar (desktop) -->
        <div class="hidden lg:block bg-white border-r border-slate-200">
            @livewire('admin.include.sidebar')
        </div>

        <!-- Offcanvas sidebar (mobile) -->
        <div x-show="sidebarOpen" @click.outside="sidebarOpen = false" x-cloak class="fixed inset-0 z-40 lg:hidden">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute inset-y-0 left-0 w-72 bg-white border-r border-slate-200 shadow-lg">
                @livewire('admin.include.sidebar')
            </div>
        </div>

        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Header -->
            <div class="sticky top-0 z-30 bg-white">
                @include('components.admin.include.header.header')
            </div>

            <!-- Main content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

            <footer class="border-t border-slate-200 bg-white p-4 text-sm text-slate-500">
                <div class="container-custom">© {{ date('Y') }} Concrete Champs. All rights reserved.</div>
            </footer>
        </div>
    </div>

    @livewireScripts
</body>
</html>
