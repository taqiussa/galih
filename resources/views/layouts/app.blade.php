<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logo56.png') }}" type="image/png" sizes="16x16" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100" x-data="{ sidebarOpen: false }">
    <x-notifications />
    <x-dialog />
    <!-- Mobile overlay -->
    <div class="fixed inset-0 bg-black/40 z-30 lg:hidden" x-show="sidebarOpen" x-transition.opacity
        @click="sidebarOpen = false">
    </div>

    <!-- Sidebar -->
    <x-sidebar.layout />

    <!-- Top Navbar -->
    <header class="sticky top-0 z-20 flex h-16 items-center bg-white px-4 shadow lg:ml-64">
        <button class="mr-4 lg:hidden" @click="sidebarOpen = true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div class="ml-auto">
            <img src="{{ asset('images/logo56.png') }}" alt="Logo" class="h-10 w-auto">
        </div>
    </header>

    <!-- Page Content -->
    <main class="lg:ml-64 p-6">
        {{ $slot }}
    </main>
</body>

</html>
