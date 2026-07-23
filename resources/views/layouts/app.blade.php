<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('images/logo56.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $user = auth()->user();

    $isSiswa = Auth::guard('siswa')->check();

    if ($isSiswa) {
        $showSidebar = (bool) $user->boleh_tes;
    } else {
        $showSidebar = true;
    }
@endphp

<body class="font-sans antialiased bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-notifications />
    <x-dialog />

    {{-- Sidebar --}}
    @if ($showSidebar)
        <x-sidebar.layout />
    @endif

    {{-- Overlay --}}
    <div class="fixed inset-0 z-30 bg-black/40 lg:hidden" x-show="sidebarOpen" x-transition.opacity
        @click="sidebarOpen = false">
    </div>

    {{-- Navbar --}}
    <header
        class="sticky top-0 z-20 flex h-16 items-center bg-gradient-to-r from-blue-300 to-blue-700 px-4 shadow {{ $showSidebar ? 'lg:ml-64' : '' }}">

        @if ($showSidebar)
            <button class="mr-4 lg:hidden" @click="sidebarOpen = true">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        @endif

        <div class="ml-auto">
            <img src="{{ asset('images/logo56.png') }}" alt="Logo" class="h-10 w-auto">
        </div>
    </header>

    {{-- Content --}}
    <main class="p-6 {{ $showSidebar ? 'lg:ml-64' : '' }}">
        {{ $slot }}
    </main>

</body>

</html>
