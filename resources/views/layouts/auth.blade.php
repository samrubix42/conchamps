<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light no-scrollbar">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $meta_title ?? $title ?? 'Login' }} | Concrete Champs</title>
	<meta name="description" content="{{ $meta_description ?? 'Concrete Champs login page for authenticated access to administration and management tools.' }}">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	@livewireStyles
</head>

<body class="antialiased font-body min-h-screen bg-slate-100 text-slate-900">
	{{ $slot }}

	@livewireScripts
</body>

</html>
