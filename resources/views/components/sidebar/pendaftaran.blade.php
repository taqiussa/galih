<div x-data="{
    openPendaftaran: {{ request()->routeIs('pendaftaran*') ? 'true' : 'false' }}
}" class="mb-2">
    <!-- Header collapsible -->
    <div class="border-b-2 mb-2 py-2 cursor-pointer flex items-center justify-between"
        @click="openPendaftaran = !openPendaftaran">
        <span>Pendaftaran</span>

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform transition"
            :class="openPendaftaran ? 'rotate-90' : ''" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M6 6L14 10L6 14V6Z" />
        </svg>
    </div>

    <!-- Content collapsible -->
    <div x-show="openPendaftaran" x-collapse>
        <x-sidebar.link route="pendaftaran.input-pendaftaran" label="Input Pendaftaran" wire:navigate />
        <x-sidebar.link route="pendaftaran.data-pendaftar" label="data Pendaftar" wire:navigate />
    </div>
</div>
