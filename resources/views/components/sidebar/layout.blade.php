<aside
    class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-40 transform lg:translate-x-0
            transition-transform duration-300 overflow-y-auto px-2"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <div class="flex flex-col items-center p-6 border-b text-slate-700 mb-3">
        <svg class="size-28" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <h1 class="block py-3 text-lg font-bold">{{ auth()->user()->name }}</h1>
    </div>
    @php
        $isSiswa = Auth::guard('siswa')->check();
    @endphp

    <x-sidebar.link route="{{ $isSiswa ? 'siswa.dashboard' : 'dashboard' }}"
        label="{{ $isSiswa ? 'Dashboard' : 'Dashboard' }}" wire:navigate />

    @if (auth()->user()->boleh_tes)
        <x-sidebar.link x-show="{{ $isSiswa ? 'true' : 'false' }}" route="exam" label="Tes Akademik" wire:navigate />
    @endif

    <nav class="p-4 space-y-2">

        @role('Admin')
            <x-sidebar.admin />
        @endrole

        @role('Admin')
            <x-sidebar.pendaftaran />
        @endrole

        @role('Admin')
            <x-sidebar.agama />
        @endrole

        @role('Admin')
            <x-sidebar.wawancara />
        @endrole

        @role('Admin')
            <x-sidebar.seragam />
        @endrole

        <a href="{{ $isSiswa ? route('siswa.logout') : route('logout') }}"
            class="block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium">Log out</a>
    </nav>
</aside>
