<div x-data="{
    openAkademik: {{ request()->routeIs('akademik.*') ? 'true' : 'false' }}
}" class="mb-2">
    <!-- Header collapsible -->
    <div class="border-b-2 mb-2 py-2 cursor-pointer flex items-center justify-between"
        @click="openAkademik = !openAkademik">
        <span>Akademik</span>

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform transition"
            :class="openAkademik ? 'rotate-90' : ''" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M6 6L14 10L6 14V6Z" />
        </svg>
    </div>

    <!-- Content collapsible -->
    <div x-show="openAkademik" x-collapse>
        <x-sidebar.link route="akademik.atur-tes" label="atur tes" wire:navigate />
        <x-sidebar.link route="akademik.hasil-tes" label="hasil tes akademik" wire:navigate />
    </div>
</div>
