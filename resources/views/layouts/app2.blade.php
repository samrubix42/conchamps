<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light no-scrollbar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('meta_title')@yield('meta_title')@elseif(isset($meta_title)){{ $meta_title }}@elseif(isset($title)){{ $title }}@else Concrete Champs @endif | Architectural Precision</title>
    <meta name="description" content="@hasSection('meta_description')@yield('meta_description')@elseif(isset($meta_description)){{ $meta_description }}@else Concrete Champs delivers structural engineering and construction services with practical execution, quality, and client-focused delivery. @endif">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Alpine.js -->

</head>
<body class="site-shell no-scrollbar antialiased font-body min-h-screen flex flex-col text-on-surface">
    <livewire:public.include.header2 />

    <main class="flex-grow pt-16 md:pt-[110px]">
        {{ $slot }}
    </main>

    <livewire:public.include.footer2 />

    @livewireScripts
</body>
</html>

